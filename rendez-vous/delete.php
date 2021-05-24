<?php 
    include_once('../scripts/users.scripts.php');
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    if(empty($id = $_GET['id'])){
        echo json_encode(['msg'=>"id est obligatoire "]);
        die();
       }else {
           $id = $_GET['id'];
           $r = supprimerRdv($id);
       }
       if($r){
           http_response_code(200);
           echo json_encode(['msg'=>"l'utilisateur a ete supprimé"]);
       }else{
           http_response_code(403);
           echo json_encode(['msg'=>"erreur de suppression"]);
       }