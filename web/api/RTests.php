<?php

require dirname(__FILE__) . "/../link/link.php";

header("Content-Type: application/json");

$requester = new link();
$query = $requester->getLink("RTests")->createQuery();

if (isset($_GET["id"])) {
    $query->andWhere(["eventid" => $_GET["id"]]);
}


$data = $query->all();
echo json_encode($data);
