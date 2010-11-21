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

$registry = $registry->router->route($registry);

include __SRC_PATH . "templates/root.php";

?>
