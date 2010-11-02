<?php
function list_cache_files($directory) {

    // create an array to hold directory list
    $results = array();

    // create a handler for the directory
    $handler = opendir($directory);

    // open directory and walk through the filenames
    while ($file = readdir($handler)) {

        // if file isn't this directory or its parent, add it to the results
        if ($file != "." && $file != "..") {
            $results[] = $file;
        }
    }

    // tidy up: close the handler
    closedir($handler);

    foreach($results as $result){
        $filename = str_replace(".json", "", $result);
        echo "'$filename'". ", ";
    }
}
?>
$(function() {
var availableTags = [<? list_cache_files("../../cache/"); ?>];
    function split(val) {
        return val.split(/,\s*/);
    }
    function extractLast(term) {
        return split(term).pop();
    }

    $(".search_field").autocomplete({
        minLength: 0,
        source: function(request, response) {
            // delegate back to autocomplete, but extract the last term
            response($.ui.autocomplete.filter(availableTags, extractLast(request.term)));
        },
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        select: function(event, ui) {
            var terms = split( this.value );
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push( ui.item.value );
            // add placeholder to get the comma-and-space at the end
            terms.push("");
            this.value = terms.join("");
            return false;
        }
    });
});