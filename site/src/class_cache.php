<?php

require_once 'class_movie.php';

class cache {

    public $search_string;
    public $movie;

    function __construct($search_string) {
        $this->search_string = $this->sanitize_search_string($search_string);
        $this->check_cache($this->search_string);
    }

    function sanitize_search_string($search_string) {
        return strtolower(strip_tags(trim($search_string)));
    }

    function check_cache($search_string) {
        $cache_file = "cache/" . $search_string . ".json";
        $file_exists = file_exists($cache_file);
        if ($file_exists == false) {
            $movie = new movie($this->search_string, false, null);
            $this->build_cache_file($movie);
            $this->movie = $movie;
        }
        if ($file_exists == true) {
            $cache_json = file_get_contents($cache_file);
            $movie_data_array = json_decode($cache_json, true);
            $movie = new movie($this->search_string, true, $movie_data_array);
            $this->movie = $movie;
        }
    }

    function build_cache_file($movie) {
        $movie_data_array = array();
        $movie_data_array['title'] = $movie->title;
        $movie_data_array['imdburl'] = $movie->imdburl;
        $movie_data_array['country'] = $movie->country;
        $movie_data_array['languages'] = $movie->languages;
        $movie_data_array['genres'] = $movie->genres;
        $movie_data_array['rating'] = $movie->rating;
        $movie_data_array['votes'] = $movie->votes;
        $movie_data_array['year'] = $movie->year;
        $movie_data_array['torrentlist'] = $movie->torrentlist;
        $movie_data_array['youtube_embedd_link'] = $movie->youtube_embedd_link;
        $movie_data_array['pub_date'] = $movie->pub_date;
        if ($movie->title == null) {
            //do nothing
        } else {
            $movie_data_json = json_encode($movie_data_array);
            $fh = fopen("cache/" . strtolower($movie->title) . ".json", 'w') or die("can't open file");
            fwrite($fh, $movie_data_json);
            fclose($fh);
        }
    }

    public function get_movie() {
        return $this->movie;
    }

}

?>
