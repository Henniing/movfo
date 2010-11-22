<?php
/*** error reporting on ***/
error_reporting(E_ALL);
ini_set('display_errors', '1');
$site_path = realpath(dirname(__FILE__));

/*** require the init config ***/
require ('src/config/init.php');



if(!empty($_GET['rt']))
    $route = $_GET['rt'];
else
    $route = 'index';

$registry->router = new router($registry, $route);

//CACHE START
//conditionals: if file exists + uptodate read from cachefile and exit, else start output capture
if(!empty($_GET['ss'])){
    $cachetime = 7200;
    $cachefile = __CACHE_PATH . $_GET['ss'];
    if(file_exists($cachefile)){
        $cachefile_created = filemtime($cachefile);
        if (time() - __CACHE_KEEP_TIME < $cachefile_created) {
            readfile($cachefile);
            exit();
        }
    }
    ob_start();
}
//OUTPUT
$registry = $registry->router->route($registry);
include __SRC_PATH . "templates/root.php";

//CACHE END
//do: no cache file, write captured output to file and flush. 
if(!empty($_GET['ss'])){
    $fp = fopen(strtolower($cachefile), 'w'); 
    fwrite($fp, ob_get_contents());
    fclose($fp); 
    ob_end_flush();
}




?>
