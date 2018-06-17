<?php

//Меняем корень нашего приложения
//Для нормальной работы основных скриптов
chdir("./../../");
require 'include/main/WebUI.php';

class link {
    const userID = 1;

    /**
     * @return \App\QueryGenerator
     */
    public function getLink(string $moduleName) {
        $query = new \App\QueryGenerator($moduleName, self::userID);
        return $query;
    }
}