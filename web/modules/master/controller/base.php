<?php

class master_base_controller {
    /**
     * @var Request $request
     */
    protected $request;

    public function __construct()
    {
    }

    public function setRequest(Request $request) {
        $this->request = $request;
    }
    
    public function exec() {
        $method = $this->request->getAction();

        if (!method_exists($this, $method)) {
            die("Метода не существует");
        }

        if (!is_callable([$this, $method])) {
            die("Метод не предназначен для вызова");
        }

        $this->$method();
    }
}