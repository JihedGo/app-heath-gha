<?php
include_once('db.config.php');


// fonction permet de faire ajouter un utulisateur
function ajouter_Users($first_name, $gender, $phone_number, $email, $address,$password,$specialty,$grade, $last_name, $cin){
  $db = getConnection(); // sna3et connexion
  $sql = "INSERT INTO `users` (`id`, `first_name`, `gender`, `phone_number`, `email`, `address`, `role`, `password`, `specialty`, `grade`, `last_name`, `cin`, `is_deleted`, `status`) 
  VALUES (null,\"".$first_name."\",\"".$gender."\",\"".$phone_number."\",\"".$email."\",\"".$address."\",'ROLE_MEDECIN',\"".$password."\",\"".$specialty."\",\"".$grade."\",\"".$last_name."\",\"".$cin."\",0,0)";
  $r = mysqli_query($db, $sql);
  return $r;    
}

// login 
function login($email, $password){
  $db = getConnection();
  $sql = "SELECT * FROM users WHERE email = \"".$email."\" AND password = \"".$password."\" ";
  $r = mysqli_query($db, $sql);
  return $r;
}
// fonction permet d'afficher tous les utilisateur
function getAllUsers(){
  $db = getConnection();
  $sql = "SELECT * FROM users ORDER BY id DESC";
  $r = mysqli_query($db, $sql);
  return $r;
}

function getUserById($id){
  $db = getConnection();
  $sql = "SELECT * FROM users WHERE id = $id";
  $r = mysqli_query($db, $sql);
  return $r;
}
// fonction permet de supprimer un utilisateur
function supprimer_utilisateur($id){
  $db = getConnection();
  $sql ="DELETE FROM `users` WHERE id = $id";
  $r = mysqli_query($db,$sql);
  return $r;
}
// fonction permet de modifier un utilisateur
function update($id,$first_name,$phone_number){
  $db = getConnection();
  $sql = "UPDATE `users` SET `first_name`=\"".$first_name."\",`phone_number`=\"".$phone_number."\" WHERE id=$id";
  $r = mysqli_query($db, $sql);
  return $r;
}
// fonction permet d'afficher tous les medecin
function getAllMedecins(){
  $db = getConnection();
  $sql = "SELECT * FROM users WHERE role = 'ROLE_MEDECIN' ORDER BY id DESC";
  $r = mysqli_query($db, $sql);
  return $r;
}

// fonction permet d'afficher tous les secretaires
function getAllSecretaires(){
  $db = getConnection();
  $sql = "SELECT * FROM users WHERE role = 'ROLE_SECRETAIRE' ORDER BY id DESC";
  $r = mysqli_query($db, $sql);
  return $r;
}

      function getPatientById($id){
        $db= getConnection();
        $sql = "SELECT * FROM patients WHERE id = $id";
        $r = mysqli_query($db, $sql);
        return $r;
      }
 
      // fonction permet d'ajouter un patients
      function ajouter_patients($firstName, $gender, $phoneNumber, $email, $address, $lastName, $cin,$dateNaiss){
        $db = getConnection(); // sna3et connexion
        $sql = "INSERT INTO `patients`(`id`, `first_name`, `last_name`, `cin`, `email`, `address`, `date_naiss`, `phone_number`, `gender`, `status`) VALUES 
        (null,\"".$firstName."\",\"".$lastName."\",\"".$cin."\",\"".$email."\",\"".$address."\",\"".$dateNaiss."\",\"".$phoneNumber."\",\"".$gender."\",0)";
        $r = mysqli_query($db, $sql);
        return $r;    
    }
      // fonction permet de supprimer un patients
      function  supprimer_patients($id){
       $db = getConnection();
       $sql ="DELETE FROM `patients` WHERE id=$id";
       $r = mysqli_query($db,$sql);
       return $r;
    }
      // fonction permet de modifier un patients
     function updatePatients($id,$firstName,$lastName,$cin){
      $db = getConnection();
      $sql = "UPDATE `patients` SET `first_name`=\"".$firstName."\",`last_name`=\"".$lastName."\",`cin`=\"".$cin."\" WHERE `id`=$id";
      $r = mysqli_query($db,$sql);
      return $r;
    }
    // fonction permet d'afficher tous les patients
    function getAllPatients(){
      $db = getConnection();
      $sql = "SELECT * FROM patients ORDER BY id DESC";
      $r = mysqli_query($db, $sql);
      return $r;
  }

// fonction permet d'afficher tous les dossier
  function getAllDossiers(){
    $db = getConnection();
    $sql = "SELECT * FROM dossiers";
    $r = mysqli_query($db, $sql);
    return $r;

}

// fonction permet d'afficher les infos d'un rendez_vous par id
function getRdvById($id){
  $db = getConnection();
  $sql = "SELECT * FROM `rendez_vous` WHERE id = $id";
  $r = mysqli_query($db, $sql);
  return $r;
}
// fonction permet d'afficher les dossiers par id patients
function getAllDossiersByIdPatient($id){
    $db = getConnection();
    $sql = "SELECT * FROM `dossiers` WHERE id_patient = $id";
    $r = mysqli_query($db, $sql);
    return $r;
}
// fonction permet supprimer un dossier
function supprimerDossier($id){
    $db=getConnection();
    $sql ="DELETE FROM `dossiers` WHERE id =$id";
    $r = mysqli_query($db, $sql);
    return $r;

}
// fonction permet modifier un dossier
function updateDossier($id,$descriptions,$ordonnances){
  $db = getConnection();
  $sql = "UPDATE `dossiers` SET`descriptions`=\"".$descriptions."\",`ordonnances`=\"".$ordonnances."\" WHERE `id`=$id";
  $r = mysqli_query($db,$sql);
  return $r;
}
// fonction permet d'ajouter undossier
function ajouterDossier($id,$descriptions,$ordonnances){
  $db = getConnection(); // sna3et connexion
  $sql = "INSERT INTO `dossiers`(`id`, `id_rdv`, `descriptions`, `ordonnances`) VALUES (,\"".$id."\",\"".$id_rdv."\",\"".$descriptions."\",\"".$ordonnances."\")";
  $r = mysqli_query($db, $sql);
  return $r;    
  }

// fonction permet modifier un rdv
function updateRdv($id,$date){
  $db = getConnection();
  $sql = "UPDATE `rendez_vous` SET `id`,`date`\"".$date."\", WHERE id=$id";
  $r = mysqli_query($db,$sql);
  return $r;
}

 // fonction permet d'ajouter un Rdv
 function ajouterRdv($id,$date,$id_patient,$id_medecin){
  $db = getConnection(); // sna3et connexion
  $sql = "INSERT INTO `rendez_vous`(`id`, `date`, `id_patient`, `id_medecin`) VALUES (,\"".$date."\",\"".$id_patient."\",\"".$id_medecin."\")";
  $r = mysqli_query($db, $sql);
  return $r;    
  }

// fonction permet d'afficher tous les utilisateur
function getAllRdv(){
  $db = getConnection();
  $sql = "SELECT * FROM `rendez_vous` ORDER BY id DESC";
  $r = mysqli_query($db, $sql);
  return $r;
} 


// fonction permet de supprimer un Rdv
function supprimerRdv($id)
{
  $db = getConnection();
  $sql ="UPDATE `rendez_vous` SET `id` WHERE id=$id";
  $r = mysqli_query($db,$sql);
  return $r;
}

