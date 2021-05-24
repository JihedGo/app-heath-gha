<?php 

include_once('../scripts/users.scripts.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$Rdv = getAllRdv();
$rd = [];
foreach($Rdv as $rendv){


    $id=$rendv['id'];
    $date =$rendv['date'];
    $id_patient=$rendv['id_patient'];
    $id_medecin =$rendv['id_medecin'];

    array_push($rd,['id'=>$id,'date'=>$date ,'id_patient'=>$id_patient,'id_medecin'=>$id_medecin ,]);
}
echo json_encode(['Rdv'=>$rd]);
