<?php
  include_once('../scripts/users.scripts.php');
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  $data = json_decode(file_get_contents('php://input'), TRUE);
 

    $firstName = $data["first_name"];
    $lastName = $data["last_name"];
    $cin = $data["cin"];
    $email = $data["email"];
    $gender = $data["gender"];
    $address = $data["address"];
    $phoneNumber = $data["phone_number"];
    $dateNaiss = $data["date_naiss"];

    
   
    $r = ajouter_patients($firstName, $gender, $phoneNumber, $email, $address, $lastName, $cin,$dateNaiss);
    if($r){
        http_response_code(200);
        echo json_encode(['msg'=>"le patient a ete ajouté avec success !"]);
    }else{
        http_response_code(403);
        echo json_encode(['msg'=>"erreur lors d'ajouter de patient"]);
    }