<?php

class App
{
    private  $controller = "home";
    private  $method = "index";
    private  $params = [];

    public function __construct()
    {
        $url = $this->splitURL();

        if (file_exists("../app/controllers/" . strtolower($url[0]) . ".php")) {
            $this->controller = strtolower($url[0]);
            // we remove the url[0] variable from the array
            unset($url[0]);
        }

        require_once "../app/controllers/$this->controller.php";
        // we instantiate the class 
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                // the url[1] is the param after the controller p.g: www.test.com/product/milk/ so the milk is the method || url[1]
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // run the class and the method
        $this->params = array_values($url);
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function splitURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        // we split the url string to an array 
        return explode('/', filter_var(trim($url, '/'), FILTER_SANITIZE_URL));
    }
}