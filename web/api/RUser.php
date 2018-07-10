<?php
/**
 * API для создания либо логина пользователя
 * 
 * Логин пользователя
 * method = auth
 * login  = логин пользователя
 * pass   = пароль пользователя
 * 
 * В случае успеха возвращается ключ доступа
 * В противном случае стандартные ошибки
 * 
 * 
 * Регистрация пользователя
 * method = register
 * login  = логин пользователя
 * pass   = пароль пользователя
 * 
 * В случае успеха возвращается 0 ошибка
 */
require dirname(__FILE__) . "/../link/link.php";

// $_POST["method"] = "auth";
// $_POST["login"] = "test";
// $_POST["pass"] = "test";

if (!isset($_POST["method"])) {
    Responce::WriteError(Responce::ERR_NO_METHOD);
}

$requester = new link();

if ($_POST["method"] == "auth") {
    $logn = $_POST["login"];
    $pass = $_POST["pass"];

    $query = $requester->getLink("RUser")->createQuery();
    $record = $query->andWhere(["login" => $logn])->one();

    if ($record === false) {
        Responce::WriteError(Responce::ERR_NO_RECORD);
    }

    if ($record["password"] !== $pass) {
        Responce::WriteError(Responce::ERR_WRONG_PASS);
    }

    $userIdentefer = uniqid();
    file_put_contents($userIdentefer, $record["ruserid"]);

    Responce::WriteData($userIdentefer);
}


if ($_POST["method"] == "register") {
    $logn = $_POST["login"];
    $pass = $_POST["pass"];

    if ($logn == "" || $pass == "")
        Responce::WriteError(Responce::ERR_WRONG_FIELDS);

    $r = Vtiger_Record_Model::getCleanInstance("RUser");
    $r->set("login", $logn);
    $r->set("password", $pass);
    $r->save();

    Responce::current()->write();
}

/**

    [User    ]              
        ^
        |              вариант 1
    [WorkBook]      getworkbook?uid=2

                       вариант 2 (использование сессии)
                    getworkbook
                       вариант 3 (использование токена)
                    getworkbook?token=123Ab-12acad-1232134-4545-cbd3



    //КАК СГРАБИТЬ ВСЕ ДАННЫЕ
    for (i = 0; i < 1000; i++) {
        data = get("getworkbook?uid=" + i);
    }

*/



