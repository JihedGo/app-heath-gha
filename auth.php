<?php 

    include_once('users.scripts.php');
    $email    = $_POST['email'];
    $password = $_POST['password'];
    if(mysqli_fetch_assoc(login($email, $password))){
        $user = mysqli_fetch_assoc(login($email, $password));
        var_dump($user);
        if($user){
            $role = $user['role'];
            if($role == "ROLE_ADMIN"){
                session_start();
                $_SESSION['user'] = $user;
                header('location: admin.php');
            }else{
                session_start();
                $_SESSION['user'] = $user;
                header('location: sec.php');
            }
        }else{
            header('location: index.php?error');
        }
        var_dump($user);
        $role = null;
        session_start();
        $user = login($email, $password);
        $_SESSION['user'] = login($email, $password);

    }else{
        header('location: index.php?error');
    }