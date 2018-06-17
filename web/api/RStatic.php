<?php
require dirname(__FILE__) . "/../link/link.php";

$requester = new link();
$query = $requester->getLink("RStatic")->createQuery();

if (isset($_GET["take"])) {
    $query->limit($_GET["take"]);
}

if (isset($_GET["id"])) {
    $query->andWhere(["rstaticid" => $_GET["id"]]);
}


echo json_encode($query->all());