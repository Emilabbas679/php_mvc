<?php


class Application{
    protected $controller = 'homeController';
    protected $method = 'index';
    protected $parameters = [];
    protected $view = 'site';

    public function __construct() {
        $url = $this->parseUrl();
        if (isset($url[0]) && $url[0] == 'admin'){
            $this->view = 'admin';
            $this->controller = 'adminController';
            unset($url[0]);
            $newurl = [];
            if(is_array($url)){
                foreach($url as $value){
                    $newurl[] = $value;
                }
            }
            $url = $newurl;
        }

        if(isset($url[0])){
            if(file_exists("project/controllers/$this->view/".$url[0].'Controller.php')){
                $this->controller = $url[0].'Controller';
                unset($url[0]);
            }
        }

        require_once 'project/controllers/'.$this->view.'/'.$this->controller.'.php';
        $this->controller = new $this->controller;


        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->parameters = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->parameters);
    }
    
    public function parseUrl(){
        if(isset($_GET['url'])){
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}