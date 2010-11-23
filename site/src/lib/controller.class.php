<?php


abstract class controller {

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
