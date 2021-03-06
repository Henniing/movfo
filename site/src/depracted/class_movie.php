<?php

class movie {

    public $search_string;
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
    public $pub_date;

    public $err;

    function __construct($search_string, $from_cache, $movie_data_array) {
        if ($from_cache == true) {
            $this->search_string = $search_string;
            $this->id = $movie_data_array['id'];
            $this->title = $movie_data_array['title'];
            $this->imdburl = $movie_data_array['imdburl'];
            $this->country = $movie_data_array['country'];
            $this->languages = $movie_data_array['languages'];
            $this->genres = $movie_data_array['genres'];
            $this->rating = $movie_data_array['rating'];
            $this->votes = $movie_data_array['votes'];
            $this->year = $movie_data_array['year'];
            $this->torrentlist = $movie_data_array['torrentlist'];
            $this->youtube_embedd_link = $movie_data_array['youtube_embedd_link'];
            $this->pub_date = $movie_data_array['pub_date'];
        }
        if ($from_cache == false) {
            $this->search_string = $search_string;
            $search_string_urlenc = urlencode($this->search_string);
            $this->gather_imdb_data($search_string_urlenc);
            $this->gather_torrentz_data($search_string_urlenc);
            $this->find_youtube_link($search_string_urlenc);
            $this->pub_date = date("m/d/Y", time("H:m"));
        }
    }

    private function gather_imdb_data($search_string) {
        $page_data = file_get_contents("http://www.deanclatworthy.com/imdb/?q=" . $search_string);
        if($page_data != "n/a"){
            $movie_info_array = json_decode($page_data, true);
            foreach ($movie_info_array as $key => $value) {
                $this->$key = $value;
            }
        }
        else {
            $this->err['imdb'] = $page_data;        
        }
    }

    private function gather_torrentz_data($search_string) {
        $xml_data = file_get_contents("http://www.torrentz.com/feed?q=" . $search_string);
        $xml = simplexml_load_string($xml_data);

        foreach ($xml->channel->item as $key => $item) {
            $torrent['title'] = $item->title;
            $torrent['link'] = $item->guid;
            $torrent['pubdate'] = $item->pubDate;
            $ufdesc = $item->description;

            $string = str_replace("Mb", "mb", $ufdesc);
            $count = strlen($string);
            $i = 0;
            $ii = 0;
            while ($i < $count) {
                $char = $string{$i};
                if (ereg("[A-Z]", $char, $val)) {
                    $ii++;
                    $strings[$ii] .= $char;
                } else {
                    $strings[$ii] .= $char;
                }
                $i++;
            }

            $size = explode(":", $strings[1]);
            $torrent['size'] = $size[1];

            $seeds = explode(":", $strings[2]);
            $torrent['seeds'] = $seeds[1];

            $peers = explode(":", $strings[3]);
            $torrent['peers'] = $peers[1];

            $hash = explode(":", $strings[4]);
            $torrent['hash'] = $hash[1];

            $this->torrentlist[] = $torrent;
            unset ($strings);
        }
    }

    private function find_youtube_link($search_string) {
        $xml_data = file_get_contents("http://gdata.youtube.com/feeds/api/videos?q=" . $search_string . "&start-index=1&max-results=1&v=2");
        $xml = simplexml_load_string($xml_data);
        $this->youtube_embedd_link = $xml->entry->content['src'];
    }

}

?>
