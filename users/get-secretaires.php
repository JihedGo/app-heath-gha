<?php 

include_once('../scripts/users.scripts.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$users = getAllsecretaires();
$secretaires = [];
foreach($users as $user){
    
    $id = $user ['id'];
    $firstName =$user ['first_name'];
    $lastName=$user['last_name'] ;
    $gender=$user['gender'];
    $role=$user['role'];
    $cin=$user['cin'] ;
    array_push($secretaires,[
        'id'=>$id,
        'first_name'=>$firstName,
        'last_name'=>$lastName,
        'gender'=>$gender,
        'role'=>$role,
        'cin'=>$cin
        ]);
    
}echo json_encode(['secretaires '=>$secretaires]);

