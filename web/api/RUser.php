<?php
require dirname(__FILE__) . "/../link/link.php";


if (!isset($_POST["method"])) {
    echo "ERROR";
    return;
}

$requester = new link();

if ($_POST["method"] == "auth") {
    $logn = $_POST["login"];
    $pass = $_POST["pass"];

    $query = $requester->getLink("RUser")->createQuery();
    $record = $query->andWhere(["login" => $logn])->one();

    if ($record === false) {
        echo "ERROR";
        return;
    }

    if ($record["password"] !== $pass) {
        echo "ERROR";
        return;
    }

    $userIdentefer = uniqid();
    file_put_contents($userIdentefer, $record["userid"]);

    echo $userIdentefer;
    return;
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




    for (i = 0; i < 1000; i++) {
        data = get("getworkbook?uid=" + i);
    }

*/



