<?php 
    include_once('../../scripts/users.scripts.php');
    // Entete de requete
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    $orgDate ="2019-09-15";
    $newDate =date("d-m-Y",strtotime($orgDate));
    echo"New date format is".$newDate."(MM-DD-YYYY)";


    $data = json_decode(file_get_contents('php://input'), TRUE);


    $r =ajouterRdv($id,$date,$id_patient,$id_medecin);

    if($r){
        http_response_code(200);
        echo json_encode(['msg'=>"le rendez_vous a ete ajouté avec success !"]);
        
    }else{
        http_response_code(403);
        echo json_encode(['msg'=>"erreur lors d'ajouter de rendez_vous"]);
    }
    