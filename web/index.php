<?php

spl_autoload_register(function($classname){
    if ($classname == "Request") {
        include_once __DIR__ . "/library/request.php";
        return;
    }

    $path = explode("_", $classname);
    
    $class_path = __DIR__ . "/modules/" . $path[0] . "/" . $path[2] . "/" . $path[1] . ".php";
    
    if (!file_exists($class_path)) {
        die ("FATAL ERROR - FILE NOT FOUND");
    }

    include_once ($class_path);
});


new Request();