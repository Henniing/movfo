<?php

class movie_controller{

    private $registry;

    public function __construct($registry){
        $this->registry = $registry;
    }

    public function populate_imdb_data($search_string) {
        $page_data = file_get_contents("http://www.deanclatworthy.com/imdb/?q=" . $search_string);
        $movie_info_array = json_decode($page_data, true);
        foreach ($movie_info_array as $key => $value) {
            $this->registry->movie->__set($key, $value);
        }

    }

    public function populate_torrentz_data($search_string) {
    $xml_data = file_get_contents("http://www.torrentz.com/feed?q=" . $search_string);
    $xml = simplexml_load_string($xml_data);

    $torrent_list = array();
    foreach ($xml->channel->item as $key => $item) {
        $torrent['title'] = $item->title;
        $torrent['link'] = $item->guid;
        $torrent['pubdate'] = $item->pubDate;
        $ufdesc = $item->description;

        $exp_desc = explode(' ', $ufdesc);
        
        $torrent['size'] = $exp_desc[1];
        $torrent['seeds'] = $exp_desc[4];
        $torrent['peers'] = $exp_desc[6];
        $torrent['hash'] = $exp_desc[8];

        $torrent_list[] = $torrent;
        unset ($strings);
        }
        $this->registry->movie->__set('torrent_list', $torrent_list);
    }

    public function populate_youtube_trailer_src($search_string) {
        $xml_data = file_get_contents("http://gdata.youtube.com/feeds/api/videos?q=" . $search_string . "&start-index=1&max-results=1&v=2");
        $xml = simplexml_load_string($xml_data);
        $this->registry->movie->__set('youtube_trailer_src', $xml->entry->content['src']);
    }
}


?>
