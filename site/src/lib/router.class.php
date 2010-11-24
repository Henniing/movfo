<?php

class router{
    
    private $registry;
    private $route;
    public $model;
    public $action;
    
    public function __construct($registry, $route){
        $this->registry = $registry;
        $this->route = $route;
        $this->generate_path();
    }
    
    public function generate_path(){
        if(!empty($this->route))$route_parts = explode("/", $this->route);
        if(!empty($route_parts[0]))$this->model = $route_parts[0];
        if(!empty($route_parts[1]))$this->action = $route_parts[1];
    }
    
    public function route(){
        $registry = $this->registry;
        if(!is_file(__SRC_PATH . "models/" . $this->model . __MODEL)){
            if($this->route == 'index')
                $registry->view = __SRC_PATH . 'views/' . 'index' . __VIEW;
            else    
                $registry->view = __SRC_PATH . 'views/' . '404' . __VIEW;
        }
        else{
            include (__SRC_PATH . 'models/' . $registry->router->model . __MODEL);
            $model_class = $this->model;
            $model_class = new $model_class($registry, $registry->dao);
            
            $action = $registry->router->action;
            if(is_callable(array($model_class, $action))){
                $view_data = $model_class->$action(); 
                $registry->view_data = $view_data;
                $registry->view = __SRC_PATH . 'views/' . $this->model . '.' . $action .  __VIEW;
            }
            else{
                $action = 'index';
                $view_data = $model_class->$action();
                $registry->view_data = $view_data;
                $registry->view = __SRC_PATH . 'views/' . $this->model . '.' . $action .  __VIEW;
            }
        }
        return $registry;
    }    
}

?>
