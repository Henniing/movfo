<?php
/*** error reporting on ***/
error_reporting(E_ALL);
ini_set('display_errors', '1');

/*** define the site path constant's ***/
$site_path = realpath(dirname(__FILE__));
define ('__SITE_PATH', realpath(dirname(__FILE__)));
define ('__SRC_PATH', __SITE_PATH . "/src/");

/*** require the init config ***/
require (__SRC_PATH . 'config/init.php');

require(__SRC_PATH . "models/movie.class.php");
require(__SRC_PATH . "controllers/movie.controller.php");
                    /**
                    $registry->movie = new movie();
                    $registry->movie_controller = new movie_controller($registry);

                    $registry->movie_controller->populate_imdb_data('avatar');
                    $registry->movie_controller->populate_youtube_trailer_src('avatar');

                    echo $registry->movie->__get('youtube_trailer_src');
                    **/



?>
