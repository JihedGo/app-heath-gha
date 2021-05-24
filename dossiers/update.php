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
 if(empty($data->descriptions) || empty($data->ordonnances)){
     echo json_encode(['msg'=>'descriptions et ordonnances sont obligatoire']);
     die();
 }else{
    $descriptions=$data->descriptions;
    $ordonnances=$data->ordonnances;
   
   
    $r=update($id,$descriptions,$ordonnances);
   if ($r) {
       echo json_encode(['msg'=>'ok!']);
   }else
   {  echo json_encode(['msg'=>'erreur']);}
 }
