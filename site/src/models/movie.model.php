<?php

class movie extends model {
    
    public function search(){
        if(!empty($_GET['ss'])){
            $search_string = urlencode($_GET['ss']);
            $this->populate_imdb_data($search_string);
            $this->populate_youtube_trailer_src($search_string);
            $this->populate_torrentz_data($search_string);
            return $this;
        }
    }
    
    private function populate_imdb_data($search_string) {
        $page_data = file_get_contents("http://www.deanclatworthy.com/imdb/?q=" . $search_string);
        $movie_info_array = json_decode($page_data, true);
        foreach ($movie_info_array as $key => $value) {
            $this->__set($key, $value);
        }

    }
    
    public function validate(){
        $check_one = $this->__get('title');
        $check_two = $this->__get('youtube_trailer_src');
        if(!empty($check_one) && !empty($check_two)){
            return true;    
        }
        else {
            return false;
        }
    }
    
    private function populate_youtube_trailer_src($search_string) {
        $xml_data = file_get_contents("http://gdata.youtube.com/feeds/api/videos?q=" . $search_string . "&start-index=1&max-results=1&v=2");
        $xml = simplexml_load_string($xml_data);
        $this->__set('youtube_trailer_src', $xml->entry->content['src']);
    }

    private function populate_torrentz_data($search_string) {
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
        $this->__set('torrent_list', $torrent_list);
    }
    
    public function render_rating_stars(){
        $rating_grphx = "";
        $r = $this->__get('rating');
        $r1 = substr($r, 0, 1);
        $r2 = substr($r, 2, 1);
        $i = 0;
        $starspath = 'src/public/style/grphx/stars';
        while($i < (int)$r1){
            $rating_grphx .= "<img src='$starspath/star.png'/>";
            $i++;
        }
        $rating_grphx .= "<img src='$starspath/,".(int)$r2.".png'/>";
        $r3 = 9 - (int)$r1;
        $i = 0;
        while($i < $r3){
            $rating_grphx .= "<img src='$starspath/,0.png'/>";
            $i++;
        }
        return $rating_grphx;
    }

}
    
?>
