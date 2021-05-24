<?php 

include_once('../scripts/users.scripts.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$users = getAllMedecins();
$meds = [];
foreach($users as $u){
   array_push($meds,['id'=>$u['id'],'firstName'=>$u['first_name'],'specialite'=>$u['specialty'],'grade'=>$u['grade']]);
}

echo json_encode($meds);