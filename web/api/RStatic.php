<?php
require dirname(__FILE__) . "/../link/link.php";

function addRecord() {
    $model = Vtiger_Record_Model::getCleanInstance("RStatic");

    $model->set("name", $_POST["name"]);
    $model->set("text", $_POST["text"]);
    $model->set("shorttext", $_POST["shorttext"]);

    if ($model->save())
        return true;
    
    return false;
}

if (isset($_POST["method"])) {
    if ($_POST["method"] == "add")
        return addRecord();
}

$requester = new link();
$query = $requester->getLink("RStatic")->createQuery();

if (isset($_GET["take"])) {
    $query->limit($_GET["take"]);
}

if (isset($_GET["id"])) {
    $query->andWhere(["rstaticid" => $_GET["id"]]);
}


echo json_encode($query->all());