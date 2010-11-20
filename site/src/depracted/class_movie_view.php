<?php
class movie_view {

    private $movie;
    private $movie_view;

    public function __construct($movie) {
        $this->movie = $movie;
        $this->movie_view = $this->generate_movie_view($movie->title, $movie->rating, $movie->votes, $movie->genres, $movie->year, $movie->country, $movie->languages, $movie->youtube_embedd_link[0], $movie->torrentlist, $movie->err);
    }

    public function get_movie_view(){
        return $this->movie_view;
    }

    private function generate_movie_view($title, $rating, $votes, $genres, $year, $country, $languages, $youtube_embedd_link, $torrentlist, $err){
        $out = $this->generate_sidebar($title, $rating, $votes, $genres, $year, $country, $languages, $youtube_embedd_link, $err);
        $out .= $this->generate_torrentlist($torrentlist);
        return $out;
    }

    private function generate_sidebar($title, $rating, $votes, $genres, $year, $country, $languages, $youtube_embedd_link, $err){
        $out = "<div id='sidebar'>";
        $out .= $this->generate_info($title, $rating, $votes, $genres, $year, $country, $languages, $err);
        $out .= $this->generate_trailer($youtube_embedd_link);
        $out .= "</div>";
        return $out;
    }


    private function generate_info($title, $rating, $votes, $genres, $year, $country, $languages, $err){
        if($err['imdb'] == ''){        
            $rating_grphx = "";
            $r = (string)$rating;
            $r1 = substr($r, 0, 1);
            $r2 = substr($r, 2, 1);

            $i = 0;
            while($i < (int)$r1){
                $rating_grphx .= "<img src='src/style/grphx/stars/star.png'/>";
                $i++;
            }
            $rating_grphx .= "<img src='src/style/grphx/stars/,".(int)$r2.".png'/>";

            $r3 = 9 - (int)$r1;

            $i = 0;
            while($i < $r3){
                $rating_grphx .= "<img src='src/style/grphx/stars/,0.png'/>";
                $i++;
            }

            $out = "<div id='info'>";
            $out .= "<h1>".$title."</h1>";
            $out .= "<table>
                        <tr>
                                <td>Rating:</td>
                                <td class='data rating_graph'>".$rating_grphx."</td>
                                <td class='data'>".$rating."</td>
                        </tr>
                        <tr>
                                <td>Votes: </td>
                                <td class='data'>".$votes."</td>
                                <td class='data'></td>
                        </tr>
                        <tr>
                                <td>Genres: </td>
                                <td class='data'>".$genres."</td>
                                <td class='data'></td>
                        </tr>
                        <tr>
                                <td>Year: </td>
                                <td class='data'>".$year."</td>
                                <td class='data'></td>
                        </tr>
                        <tr>
                                <td>Country: </td>
                                <td class='data'>".$country."</td>
                                <td class='data'></td>
                        </tr>
                        <tr>
                                <td>Languages: </td>
                                <td class='data'>".$languages."</td>
                                <td class='data'></td>
                        </tr>
                    </table>";
            $out .= "</div>";
        }
        return $out;
    }

    private function generate_trailer($youtube_embedd_link){
        $out = "<div id='trailer'>
                    <h1>Trailer</h1>
                        <div id='trailer_object'>";
        $out .= "            <object width='315' height='202'><param name='movie' value='".$youtube_embedd_link."'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed  src='".$youtube_embedd_link."' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='315' height='202'></embed></object>";
        $out .= "	</div>
                </div>";
        return $out;
    }


    private function generate_torrentlist($torrentlist){
        $out = "<div id='torrentlist'>
                    <h1>Torrents</h1>
                    <table>";

        foreach($torrentlist as $torrent){
            $out .= " <tr>
                        <td class='torrent_link'><a href='".$torrent['link'][0]."'>".substr($torrent['title'][0], 0, 62)."..</a></td>
                        <td class='size'>".$torrent['size']."</td>
                        <td class='seeds'>".$torrent['seeds']."</td>
                        <td class='peers'>".$torrent['peers']."</td>
                      </tr>";
        }

        $out .= "   </table>
                </div>";
        return $out;
    }

}
?>
