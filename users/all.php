<?php 

include_once('../scripts/users.scripts.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$utilisateurs = getAllUsers();
$users = [];
foreach($utilisateurs as $user){
    $id=$user['id'];
    $cin=$user['cin'];
    $first_name=$user['first_name'];
    $last_name=$user['last_name'];
    $phone_number=$user['phone_number'];
    $gender=$user['gender'];
    $email=$user['email'];
    $address=$user['address'];
    $role = $user['role'];
    array_push($users,[
    'id'=>$id,
    'cin'=>$cin,
    'firstName'=>$first_name,
    'lastName'=>$last_name,
    'phoneNumber'=>$phone_number,
    'gender'=>$gender,
    'email'=>$email,
    'address'=>$address,
     'role'=>$role
    ]);
       
}
echo json_encode(['users'=>$users]);

