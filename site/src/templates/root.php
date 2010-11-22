<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />
        <title>Movfo</title>
        <meta name='description' content='Movfo, movie rating, trailer and torrents in one location' />
        <meta name="keywords" content="Movfo, movies, movie rating,movie trailers, movie torrents, torrents, trailers, imdbrating, imdb, imdb info" />

        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.2r1/build/reset/reset-min.css"/>
        <link href="src/public/style/jquery-ui-1.8.5.custom.css" rel="stylesheet" type="text/css" />
        <link href="src/public/style/style.css" rel="stylesheet" type="text/css" />

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
                    <input type="hidden" name="rt" value="movie/search" />
                    <table>
                        <tr>
                            <td><input type="text" name="ss" class="search_field"/></td>
                            <td><input type="submit" value="search" class="submit_button"/></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div id="content">
                <? include($registry->view); ?>
            </div>
        </div>
    </body>
</html>
