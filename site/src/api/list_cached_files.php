<?php
$term = strip_tags(strtolower(trim($_REQUEST['term'])));

function list_cached_files($directory) {

    // create an array to hold directory list
    $files = array();

    // create a handler for the directory
    $handler = opendir($directory);

    // open directory and walk through the filenames
    while ($file = readdir($handler)) {

        // if file isn't this directory or its parent, add it to the results
        if ($file != "." && $file != "..") {
            $files[] = $file;
        }
    }

    // tidy up: close the handler
    closedir($handler);

    return $files;
}

$matches = array();

$file_array = list_cached_files("../../cache/");
foreach ($file_array as $file) {
    $filename = str_replace(".json", "", $file);
    $pos = strpos($filename, $term);
    if ($pos === false) {
        // do nothing
    } else {
        $matches[] = $filename;
    }
}

$matches_i = count($matches);
$i = 1;
echo "[";
foreach($matches as $match){
    echo "\"$match\"";
    if($i < $matches_i)
        echo ", ";
    $i++;
}
echo "]";
?>
