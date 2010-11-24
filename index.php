<?php
$settings_file = 'site/src/config/settings.xml';
$fh = fopen($settings_file, 'r') or die("Can't get correct settings");
$settings_xml = fread($fh, filesize($settings_file));
fclose($fh);
$xml = new SimpleXMLElement($settings_xml);

if(!empty($xml->db_settings->dbhost) && !empty($xml->db_settings->dbname)){
    $installed = true;
}
else{
    $installed = false;
}

switch($installed){
    case true:
        header('Location: site/');
    case false:
        include 'installation/installation_screen.php';        
}


?>
