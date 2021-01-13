<?php

class Controller
{

    protected $db;

    public function __construct()
    {
        global $config;
        $this->db = new PDO("mysql:dbname=" . $config['dbname'] . ";host=" . $config['host'],
          $config['dbuser'], $config['dbpass']);
    }

    public function loadView($viewName, $viewData = [])
    {
        extract($viewData);
        require 'views/' . $viewName . '.php';
    }

    public function loadTemplate($viewName, $viewData = [])
    {
        require 'views/template.html';
    }

    public function loadViewTemplate($viewName, $viewData = [])
    {
        extract($viewData);
        require 'views/' . $viewName . '.php';
    }

//    public function loadLibrary($lib) {
//        if(file_exists('libraries/'.$lib.'.php')) {
//            include 'libraries/'.$lib.'.php';
//        }
//    }
}
?>