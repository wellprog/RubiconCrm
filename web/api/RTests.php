<?php

require dirname(__FILE__) . "/../link/link.php";

header("Content-Type: application/json");

$requester = new link();
$query = $requester->getLink("RTests")->createQuery();

if (isset($_GET["id"])) {
    $query->andWhere(["eventid" => $_GET["id"]]);
}


$data = $query->all();
foreach ($dd as $key => $value) {
    $query = $requester->getLink("RTestsAnswers")->createQuery();
    $query->andWhere(["rtestsid" => $value["rtestsid"]]);
        
    $data[$key]["answers"] = "";//$query->all();
}

echo json_encode($data);
