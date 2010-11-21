<div id='sidebar'>
    <div id='info'>
        <h1> <?$title?> </h1>
        <table>
            <tr>
                    <td>Rating:</td>
                    <td class='data rating_graph'> <?//$rating_grphx?> </td>
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
                    
                    
                    
                    
                    

