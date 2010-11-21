<?php


abstract class base_controller {

    private $registry;

    public function __construct($registry){
        $this->registry = $registry;
    }
    
    public function index(){
    }

}

?>
