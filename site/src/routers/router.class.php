<?php

class router{
    
    private $registry;
    private $route;
    public $model;
    public $controller;
    public $action;
    
    public function __construct($registry, $route){
        $this->registry = $registry;
        $this->route = $route;
        $this->__set_controller();
    }
    
    public function __set_controller(){
        if(!empty($this->route))$route_parts = explode("/", $this->route);
        if(!empty($route_parts[0]))$this->model = $route_parts[0];
        if(!empty($route_parts[0]))$this->controller = $route_parts[0];
        if(!empty($route_parts[1]))$this->action = $route_parts[1];
    }
    
    public function route($registry){
        if(!is_file(__SRC_PATH . "models/" . $this->model . __MODEL)){
            if($this->route == 'index')
                $registry->view = __SRC_PATH . 'views/' . 'index' . __VIEW;
            else    
                $registry->view = __SRC_PATH . 'views/' . '404' . __VIEW;
        }
        else{
            include (__SRC_PATH . 'models/' . $registry->router->model . __MODEL);
            include (__SRC_PATH . 'controllers/' . $registry->router->controller . __CONTROLLER);
            $model_class = $this->model;
            $registry->$model_class = new $model_class();
            $controller_class = $this->controller . '_controller';
            $registry->$controller_class = new $controller_class($registry);
            
            $action = $registry->router->action;
            if(is_callable(array($registry->$controller_class, $action))){
                $registry->$controller_class->$action();
                $registry->view = __SRC_PATH . 'views/' . $this->model . '.' . $action .  __VIEW;
            }
            else{
                $action = 'index';
                $registry->$controller_class->$action();
                $registry->view = __SRC_PATH . 'views/' . $this->model . '.' . $action .  __VIEW;
            }
        }
        return $registry;
    }    
    
}

?>
