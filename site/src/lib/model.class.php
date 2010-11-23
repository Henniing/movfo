<?php

abstract class model {

    public $fields;

    function __construct() {

    }

    public function __get($k){
        return $this->fields[$k];
    }

    public function __set($k, $v){
        $this->fields[$k] = $v;     
    }

}

?>
