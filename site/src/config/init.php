<?php
/** define the site path constant's **/
    define ('__SITE_PATH', $site_path);
    define ('__CACHE_PATH', __SITE_PATH . '/cache/');
    define ('__SRC_PATH', __SITE_PATH . '/src/');
    define ('__LIB_PATH', __SRC_PATH . '/lib/');
    define ('__MODEL', '.model.php');
    define ('__VIEW', '.view.php');

    
/** define Database settings **/
$settings_file = __SRC_PATH . 'config/settings.xml';
$fh = fopen($settings_file, 'r') or die("Can't get correct settings");
$settings_xml = fread($fh, filesize($settings_file));
fclose($fh);
$xml = new SimpleXMLElement($settings_xml);
    define ('__DB_HOST', $xml->db_settings->dbhost);
    define ('__DB_NAME', $xml->db_settings->dbname);
    define ('__DB_USER', $xml->db_settings->dbuser);
    define ('__DB_PASSW', $xml->db_settings->dbpassw);

/** define cache settings **/
    define ('__CACHE_KEEP_TIME', 7200);

/** require library files **/
    require (__LIB_PATH . 'lib.php');

/** register gloabls **/
    $registry = new registry();
    $registry->dao = new database_instance();


?>
