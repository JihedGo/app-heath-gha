<?php 

include_once('../scripts/users.scripts.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if(empty($_GET['id'])){
    echo json_encode(['error'=>"please enter id"]);
    return null;
}else{
    if(!is_numeric($_GET['id'])){
        echo json_encode(['error'=>"id is not number"]);
        return null;
    }else{
        $id = $_GET['id'];
    }
}
$id=$_GET['id'];
$r = getUserById($id);
$r = mysqli_fetch_assoc($r);
$user = [
    'id'=>$r['id'],
    'firstName'=>$r['first_name'],
    'lastName'=>$r['last_name']
];

echo json_encode($user);