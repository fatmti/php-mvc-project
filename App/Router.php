<?php

class Router
{
    private $controller, $method, $param, $url, $object;

    public function __construct()
    {



        $this->setUrl();
        $this->setController();
        $this->setMethod();
        $this->setParam();

        if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . $this->controller . '.php')) {
            require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . $this->controller . '.php';
            $this->object = new $this->controller; // اومدیم از روی کنترلری که کاربر وارد کرده یک نمونه ساختیم
            if (method_exists($this->object, $this->method)) {
                call_user_func_array(array($this->object, $this->method), $this->param);
            }
        }
    }


    public function setUrl()
    {
        if (isset($_GET['url'])) {
            $this->url = rtrim($_GET['url'], ' / ');
        } else {
            $this->url = 'index/indexAction';
        }
        return $this->url;
    }

    public function setController()
    {
//        var_dump($this->url);
        $this->controller = explode('/', $this->url)[0];
//        var_dump($this->controller);
        return $this->controller;
    }

    public function setMethod()
    {
//        echo $this->url . '<br/>';
//        var_dump(explode('/', $this->url));
//        echo '<Br/>';
//        var_dump(explode('/', $this->url)[1]);
        if (isset(explode('/', $this->url)[1])) {
            $this->method = explode('/', $this->url)[1];
        } else {
            $this->method = 'indexAction';
        }
        return $this->method;
    }

    public function setParam()
    {

        $this->param = array_slice(explode('/', $this->url), 2);
        return $this->param;
    }
}

?>