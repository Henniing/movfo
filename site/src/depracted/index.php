<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require_once 'src/class_cache.php';
require_once 'src/class_movie_view.php';

if ($_GET['ss'] != "") {
    $cache = new cache($_GET['ss']);
    $movie = $cache->get_movie();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />
        <title>Movfo</title>
        <meta name='description' content='Movfo, movie rating, trailer and torrents in one location' />
        <meta name="keywords" content="Movfo, movies, movie rating,movie trailers, movie torrents, torrents, trailers, imdbrating, imdb, imdb info" />

        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.2r1/build/reset/reset-min.css"/>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <link href="src/style/style.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>

        <script type="text/javascript">
            $(function() {
                function log( message ) {
                    $( "<div/>" ).text( message ).prependTo( "#log" );
                    $( "#log" ).attr( "scrollTop", 0 );
                }

                $( ".search_field" ).autocomplete({
                    source: "src/api/search_cache.php",
                    minLength: 2,
                    select: function( event, ui ) {
                        log( ui.item ?
                            "Selected: " + ui.item.value + " aka " + ui.item.id :
                            "Nothing selected, input was " + this.value );
                    }
                });
                $('.ui-autocomplete').css('max-width',($(".search_field").css('width')));
                $('.ui-autocomplete').css('max-height','100px');
            });
        </script>

    </head>
    <body>
        <div id="root">
            <div id="header">
                <form id="search_form" method="GET" action="">
                    <table>
                        <tr>
                            <td><input type="text" name="ss" class="search_field"/></td>
                            <td><input type="submit" value="search" class="submit_button"/></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div id="content">
                <?
                if($_GET['ss'] != ''){
                    $movie_view = new movie_view ($movie);
                    echo $movie_view->get_movie_view();
                }
                ?>
            </div>
        </div>
    </body>
</html>
