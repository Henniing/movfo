<?php
/*** define the site path constant's ***/
define ('__SITE_PATH', $site_path);
define ('__SRC_PATH', __SITE_PATH . '/src/');
define ('__LIB_PATH', __SRC_PATH . '/lib/');
define ('__MODEL', '.class.php');
define ('__CONTROLLER', '.controller.php');
define ('__VIEW', '.view.php');

require (__LIB_PATH . 'lib.php');
require (__SRC_PATH . 'config/registry.class.php');
require (__SRC_PATH . 'routers/router.class.php');

$registry = new registry();


?>
