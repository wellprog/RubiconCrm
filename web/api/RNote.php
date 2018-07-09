<?php

require dirname(__FILE__) . "/../link/link.php";


$_POST["token"] = "5b43a2399ed58";

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

$requester = new link();

$catQuery = $requester->getLink("RNoteCategory")->createQuery();
$cats = $catQuery->andWhere(["userid" => $userid])->all();

foreach ($cats as $key => $value) {
    $recordsQuery = $requester->getLink("RNoteRecord")->createQuery();
    $cats[$key]["records"] = $recordsQuery->andWhere(["catid" => $value["rnotecategoryid"]])->all();
}

Responce::WriteData($cats);