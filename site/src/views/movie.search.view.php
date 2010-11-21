<?php 
function render_rating_grphx($rating){
    $rating_grphx = "";
    $r = $rating;
    $r1 = substr($r, 0, 1);
    $r2 = substr($r, 2, 1);
    $i = 0;
    while($i < (int)$r1){
        $rating_grphx .= "<img src='src/public/style/grphx/stars/star.png'/>";
        $i++;
    }
    $rating_grphx .= "<img src='src/public/style/grphx/stars/,".(int)$r2.".png'/>";

    $r3 = 9 - (int)$r1;

    $i = 0;
    while($i < $r3){
        $rating_grphx .= "<img src='src/public/style/grphx/stars/,0.png'/>";
        $i++;
    }
    return $rating_grphx;
}
?>

<div id='sidebar'>
    <div id='info'>
        <h1> <?$title?> </h1>
        <table>
            <tr>
                    <td>Rating:</td>
                    <td class='data rating_graph'> <?echo render_rating_grphx($registry->movie->rating) ?> </td>
                    <td class='data'> <?echo $registry->movie->rating?> </td>
            </tr>
            <tr>
                    <td>Votes: </td>
                    <td class='data'> <? echo $registry->movie->votes?> </td>
                    <td class='data'></td>
            </tr>
            <tr>
                    <td>Genres: </td>
                    <td class='data'> <? echo $registry->movie->genres?> </td>
                    <td class='data'></td>
            </tr>
            <tr>
                    <td>Year: </td>
                    <td class='data'> <? echo $registry->movie->year?> </td>
                    <td class='data'></td>
            </tr>
            <tr>
                    <td>Country: </td>
                    <td class='data'> <? echo $registry->movie->country?> </td>
                    <td class='data'></td>
            </tr>
            <tr>
                    <td>Languages: </td>
                    <td class='data'> <? echo $registry->movie->languages?> </td>
                    <td class='data'></td>
            </tr>
        </table>
    </div>
    <div id='trailer'>
        <h1>Trailer</h1>
            <div id='trailer_object'>
                <object width='315' height='202'><param name='movie' value=' <? echo $registry->movie->youtube_trailer_src?> '></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed  src=' <? echo $registry->movie->youtube_trailer_src?> ' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='315' height='202'></embed></object>
            </div>
    </div>
</div>

<div id='torrentlist'>
    <h1>Torrents</h1>
    <table>
        <? foreach($registry->movie->torrent_list as $torrent){ ?>
            <tr>
                <td class='torrent_link'><a href=' <? echo $torrent['link'][0]?> '> <? echo substr($torrent['title'][0], 0, 62)?>..</a></td>
                <td class='size'> <? echo $torrent['size']?> </td>
                <td class='seeds'> <? echo $torrent['seeds']?> </td>
                <td class='peers'> <? echo $torrent['peers']?> </td>
            </tr>
        <? } ?>
    <table>
</div>
                    
                    
                    
                    
                    

