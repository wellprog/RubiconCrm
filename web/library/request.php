<?php

class Request {
    private $module = "";
    private $controller = "";
    private $action = "";

    private $uri = [];

    public function __construct()
    {
        $this->createURI();
        $this->fillModule();

        $className = $this->module . "_" . $this->controller . "_controller";

        $controller = new $className();
        $controller->setRequest($this);
        $controller->exec();
    }

    private function createURI() {
        $tmp = $_SERVER["REQUEST_URI"];
        $q_index = strpos($tmp, "?");

        if ($q_index !== false)
            $tmp = substr($tmp, 0, $q_index);

        $tarr = explode("/", $tmp);

        foreach ($tarr as $key => $value) {
            if ($value === "")
                continue;
            array_push($this->uri, $value);
        }
    }

    private function fillModule() {
        $this->module = "home";
        $this->controller = "main";
        $this->action = "index";

        if (isset($this->uri[0]))
            $this->module = $this->uri[0];
        if (isset($this->uri[1]))
            $this->controller = $this->uri[1];
        if (isset($this->uri[2]))
            $this->action = $this->uri[2];
    }

    public function getModule() {
        return $this->module;
    }

    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }
}