<?php 

include_once('../scripts/users.scripts.php');
// Entete de requete
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$doss = getAllDossiers();
$folders= [];
foreach($doss as $dossiers){
    $id=$dossiers['id'];
    $rdvDB = getRdvById($dossiers['id_rdv']);
    $r=mysqli_fetch_assoc($rdvDB);
    $patient =mysqli_fetch_assoc(getPatientById($r['id_patient']));
    $p=['id'=>$patient['id'],'firstName'=>$patient['first_name'],'lastName'=>$patient['last_name']];
    $medecin=mysqli_fetch_assoc(getUserById($r['id_medecin']));
    $m=['id'=>$medecin['id'],'firstName'=>$medecin['first_name'],'lastName'=>$medecin['last_name'],'speciality'=>$medecin['specialty']];

    $rdvJSON=['id'=>$r['id'],'patient' =>$p,'medecin'=>$m,'date'=>$r['date']];

     
    $descriptions=$dossiers['descriptions'];
    $ordonnances=$dossiers['ordonnances'];
  
  array_push($folders,[
    'id'=>$id,
    'rdv'=>$rdvJSON,
    'descriptions'=>$descriptions,
    'ordonnances'=>$ordonnances,
    ]);
    
  }
  echo json_encode(['dossiers'=>$dossiers]);

  