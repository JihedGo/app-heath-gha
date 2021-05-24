<?php
  include_once('../scripts/users.scripts.php');
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
   $data = json_decode(file_get_contents('php://input'), TRUE);
   var_dump($data);

  $r = ajouterDossier($id,$descriptions,$ordonnances);
  if($r){
      http_response_code(200);
      echo json_encode(['msg'=>"les dossier a ete ajouté avec success !"]);
  }else{
      http_response_code(403);
      echo json_encode(['msg'=>"erreur lors d'ajouter dossiert"]);
  }