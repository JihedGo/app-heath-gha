<?php 

include_once('../scripts/users.scripts.php');
// Entete de requete
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
if(empty($_GET['id'])){
    echo json_encode(['msg'=>"id est obligatoire"]);
    die();
 }else {
    $id = $_GET['id'];
    $doc = getAllDossiersByIdPatient($id);
    $dossiers= [];
    foreach($dossiers as $doc){
    $id=$dossiers['id'];
    $id_rdv=$dossiers['id_rdv'];
    $descriptions=$dossiers['descriptions'];
    $ordonnances=$dossiers['ordonnances'];
  
  array_push($dossiers,[
    'id'=>$id,
    'id_rdv'=>$id_rdv,
    'descriptions'=>$descriptions,
    'ordonnances'=>$ordonnances,
    ]);
 }echo json_encode(['dossiers'=>$dossiers]);
}if($doc){
    http_response_code(200);
    echo json_encode(['msg'=>"afficher le dossier "]);
}else{
    http_response_code(403);
    echo json_encode(['msg'=>"erreur d'affichage"]);
}