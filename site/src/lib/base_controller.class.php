<?php


abstract class base_controller {

    protected $registry;

    public function __construct($registry){
        $this->registry = $registry;
    }
    
    public function index(){
    }
    
    public function validate(){
    }

}

?>
