<?php

class movie {

    public $id;
    public $title;
    public $imdburl;
    public $country;
    public $languages;
    public $genres;
    public $rating;
    public $votes;
    public $year;
    public $torrentlist;
    public $youtube_embedd_link;

    function __construct($search_string) {

    }

    private function gather_imdb_data($search_string) {
        $jason_string = '{"id":"2","title":"Star Trek: First Contact","imdburl":"http:\/\/www.imdb.com\/title\/tt0117731\/","country":"USA","languages":"English","genres":"Action,Adventure,Sci-Fi,Thriller","rating":"7.6","votes":"40871","screens":2812,"year":"1996"}';
        $movie_info_array = json_decode($jason_string, true);
        foreach ($movie_info_array as $key => $value) {
            $this->$key = $value;
        }
    }

    private function gather_torrentz_data($search_string) {
        $xml_data = $this->get_page_data($search_string);
        $xml = simplexml_load_string($xml_data);

        foreach ($xml->channel->item as $key => $item) {
            $torrent['link'] = $item->guid;
            $torrent['pubdate'] = $item->pubdate;
            $torrent['desc'] = $item->description;
            $this->torrentlist[] = $torrent;
        }
    }

    private function get_page_data($search_string) {
        $search_string = urlencode($search_string);
        $data = file_get_contents("http://www.torrentz.com/feed?q=" . $search_string);
        return $data;
    }

    private function find_youtube_link($search_string) {
        $search_string = urlencode($search_string);
        $xml_data = file_get_contents("http://gdata.youtube.com/feeds/api/videos?q=" . $search_string . "&start-index=1&max-results=1&v=2");
        $xml = simplexml_load_string($xml_data);
        $this->youtube_embedd_link = $xml->entry->content['src'];
    }

}

?>
