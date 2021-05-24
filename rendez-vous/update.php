<?php
 include_once('../scripts/users.scripts.php');
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");
 header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
 header("Access-Control-Max-Age: 3600");
 header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 if(empty($_GET['id'])){
    echo json_encode(['msg'=>"id est obligatoire"]);
    die();
 }else{
    $id = $_GET['id'];
 }
 
 $data = json_decode(file_get_contents('php://input'));
 if(empty($data->date)){
     echo json_encode(['msg'=>'date est obligatoire']);
     die();
 }else{
    $date=$data->date;
    $r=updateRdv($id,$date);
   if ($r) {
       echo json_encode(['msg'=>'ok!']);
   }else
   {  echo json_encode(['msg'=>'erreur']);}
 }
