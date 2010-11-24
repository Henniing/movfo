<?php

abstract class model {

    public $fields;
    private $dao;
    protected $registry;

    public function __construct($registry, $dao){
        $this->registry = $registry;
        $this->dao = $dao;
    }

    public function __get($k){
        return $this->fields[$k];
    }

    public function __set($k, $v){
        $this->fields[$k] = $v;     
    }
    
    public function index(){
    }
}

?>
