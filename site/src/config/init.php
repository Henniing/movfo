<?php
/** define the site path constant's **/
    define ('__SITE_PATH', $site_path);
    define ('__CACHE_PATH', __SITE_PATH . '/cache/');
    define ('__SRC_PATH', __SITE_PATH . '/src/');
    define ('__LIB_PATH', __SRC_PATH . '/lib/');
    define ('__MODEL', '.model.php');
    define ('__VIEW', '.view.php');
    
/** define Database settings **/
    define ('__DB_HOST', 'mysql4.servetheworld.net');
    define ('__DB_NAME', 'sunsi32_movfo');
    define ('__DB_USER', 'sunsi32_system');
    define ('__DB_PASSW', 'system');

/** define cache settings **/
    define ('__CACHE_KEEP_TIME', 7200);

/** require library files **/
    require (__LIB_PATH . 'lib.php');

/** register gloabls **/
    $registry = new registry();
    $registry->dao = new database_instance();


?>
