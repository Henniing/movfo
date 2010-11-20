<div id='sidebar'>
    <div id='info'>";
        <h1> <?$title?> </h1>";
        <table>
            <tr>
                    <td>Rating:</td>
                    <td class='data rating_graph'> <?$rating_grphx?> </td>
                    <td class='data'> <?$rating?> </td>
            </tr>
            <tr>
                    <td>Votes: </td>
                    <td class='data'> <?$votes?> </td>
                    <td class='data'></td>
            </tr>
            <tr>
                    <td>Genres: </td>
                    <td class='data'> <?$genres?> </td>
                    <td class='data'></td>
            </tr>
            <tr>
                    <td>Year: </td>
                    <td class='data'> <?$year?> </td>
                    <td class='data'></td>
            </tr>
            <tr>
                    <td>Country: </td>
                    <td class='data'> <?$country?> </td>
                    <td class='data'></td>
            </tr>
            <tr>
                    <td>Languages: </td>
                    <td class='data'> <?$languages?> </td>
                    <td class='data'></td>
            </tr>
        </table>
    </div>
    <div id='trailer'>
        <h1>Trailer</h1>
            <div id='trailer_object'>";
                <object width='315' height='202'><param name='movie' value=' <?$youtube_trailer_src?> '></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed  src=' <?$youtube_trailer_src?> ' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='315' height='202'></embed></object>";
            </div>
    </div>";
</div>

<div id='torrentlist'>
    <h1>Torrents</h1>
    <table>
        <? foreach($torrentlist as $torrent){ ?>
            <tr>
                <td class='torrent_link'><a href=' <?$torrent['link'][0]?> '> <?substr($torrent['title'][0], 0, 62)?>..</a></td>
                <td class='size'> <?$torrent['size']?> </td>
                <td class='seeds'> <?$torrent['seeds']?> </td>
                <td class='peers'> <?$torrent['peers']?> </td>
            </tr>
        <? } ?>
    <table>
</div>
                    
                    
                    
                    
                    

