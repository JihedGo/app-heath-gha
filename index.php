<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
               <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        Connexion
                    </div>
                    <div class="card-body">
                        <?php 
                            if(isset($_GET['error'])){
                                ?>
                                <div class="alert alert-danger">Erreur de connexion</div>
                                <?php
                            }
                        ?>
                        <form action="auth.php" method="post">
                            <div class="form-group">
                                <label class="form-label">Email:</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mot de passe:</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">se Connecter</button>
                            </div>
                        </form>
                    </div>
               </div>
            </div>
        </div>
    </div>
</body>
</html>