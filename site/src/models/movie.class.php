<?php

class movie {

    public $title;
    public $imdburl;
    public $country;
    public $languages;
    public $genres;
    public $rating;
    public $votes;
    public $year;
    public $torrent_list;
    public $youtube_trailer_src;
    public $pub_date;

    public $err;

    function __construct() {

    }
    
    public function __get($k){
        return $this->$k;
    }

    public function __set($k, $v){
        $this->$k = $v;     
    }
}
    
?>
