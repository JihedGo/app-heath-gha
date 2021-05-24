<?php
include_once('../scripts/users.scripts.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$patients=getAllPatients();
$pts=[]; 
foreach ($patients as $pt){
 

  $id = $pt['id'];
  $firstName = $pt['first_name'];
  $lastName = $pt['last_name']; 
  $cin = $pt['cin'];

  array_push($pts,['id'=>$id,'first_name'=>$firstName ,'last_name' =>$lastName ,'cin' =>$cin]);
}
echo json_encode(['patients'=>$pts]);



