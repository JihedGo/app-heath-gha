<?php 
    include_once('../../scripts/users.scripts.php');
    // Entete de requete
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    // manasahech converti l'entree json en tableau(true) =
    $data = json_decode(file_get_contents('php://input'), TRUE);
    
    $first_name = $data["first_name"];
    $last_name = $data["last_name"];
    $gender = $data["gender"];
    $role = $data["role"];
    $email = $data["email"];
    $address = $data["address"];
    $password = $data["password"];
    $cin = $data["cin"];
    $specialty  = $data['speciality'];
    $grade      = $data['grade'];
    $phone_number = $data['phone_number'];
  
    $r = ajouter_Users($first_name, $gender, $phone_number, $email, $address,$password,$specialty,$grade, $last_name, $cin);
    if($r){
        http_response_code(200);
        echo json_encode(['msg'=>"l'utilisateur a ete ajouté avec success !"]);
    }else{
        http_response_code(403);
        echo json_encode(['msg'=>"erreur lors d'ajouter utlisateur"]);
    }