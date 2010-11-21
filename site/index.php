<?php
/*** error reporting on ***/
error_reporting(E_ALL);
ini_set('display_errors', '1');
$site_path = realpath(dirname(__FILE__));

/*** require the init config ***/
require ('src/config/init.php');


                    /**
                    require(__SRC_PATH . "models/movie.class.php");
                    require(__SRC_PATH . "controllers/movie.controller.php");
                                        
                    $registry->movie = new movie();
                    $registry->movie_controller = new movie_controller($registry);

                    $registry->movie_controller->populate_imdb_data('avatar');
                    $registry->movie_controller->populate_youtube_trailer_src('avatar');

                    echo $registry->movie->__get('youtube_trailer_src');
                    **/

$route = $_GET['rt'];

$registry->router = new router($registry, $route);

$registry = $registry->router->route($registry);

include __SRC_PATH . "templates/root.php";

?>
