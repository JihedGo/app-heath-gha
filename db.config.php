<?php 

    const HOST = 'localhost';
    const USER = 'jihed';
    const PASSWORD = 'ideveloper';
    const DBNAME = 'db_my_pfe';

     // fonction permet de connecter a la base de données
 function getConnection(){
    $db = mysqli_connect(HOST,USER,PASSWORD,DBNAME) ; // 4 parametres: 1) HOST, 2) USER, 3) PASSWORD , 4) DBNAME
    return $db;
}
    
