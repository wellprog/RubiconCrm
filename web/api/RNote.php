<?php

require dirname(__FILE__) . "/../link/link.php";


// $_POST["token"] = "5b462fd7196ae";


if (!isset($_POST["token"])) {
    Responce::WriteError(Responce::ERR_WRONG_FIELDS);
}

$token = $_POST["token"];

if (!file_exists($token)) {
    Responce::WriteError(Responce::ERR_AUTH);
}

$userid = file_get_contents($token);

$user = Vtiger_Record_Model::getInstanceById($userid);
if ($user == null) {
    Responce::WriteError(Responce::ERR_AUTH);
}

if (isset($_POST["method"]) && $_POST["method"] == "AddCat") {
    if (!isset($_POST["name"]))
        Responce::WriteError(Responce::ERR_WRONG_FIELDS);


    $model = Vtiger_Record_Model::getCleanInstance("RNoteCategory");
    $model->set("name", $_POST["name"]);
    $model->set("userid", $userid);
    $model->set("assigned_user_id", $userid);

    $model->save();
    if ($model->getId() == "") {
        Responce::WriteError(Responce::ERR_SAVE_RECORD);
    } else {
        Responce::WriteData($model->getId());
    }
}

$requester = new link();

$catQuery = $requester->getLink("RNoteCategory")->createQuery();
$cats = $catQuery->andWhere(["userid" => $userid])->all();

foreach ($cats as $key => $value) {
    $recordsQuery = $requester->getLink("RNoteRecord")->createQuery();
    $cats[$key]["records"] = $recordsQuery->andWhere(["catid" => $value["rnotecategoryid"]])->all();
}

Responce::WriteData($cats);