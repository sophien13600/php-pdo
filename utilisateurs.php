<?php
include "./utilisateurs_service.php";

$utilisateurs = show_utilisateurs_in_list();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
</head>

<body>
    <h1>Gestion des utilisateurs</h1>
    <h2>Créer un nouvel utilisateur</h2>
    <main class=container>
        <form action="./utilisateur_controller.php" method="post">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="username">Nom d'utilisateur</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id=username name=username>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="password">Mot de passe</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" id=password name=password>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="nom">Nom complet</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id=nom name=nom>
                </div>
            </div>
            <div>
                <button class="btn btn-primary">
                    Enregistrer
                </button>
            </div>

        </form>
    </main>
    <h2>Liste des utilisateurs</h2>
    <div>
        <?= $utilisateurs ?>
    </div>
</body>

</html>
     <?php
    // DAO data access object , repository ou manager en php
//    $mysql_username = "root";
//$mysql_password = "";
//$mysql_db = "php_pdo";
 //$dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset=utf8";
   // $pdo = new PDO($dsn, $mysql_username, $mysql_password);
    //$select_all = "SELECT u.username, u.password FROM utilisateurs u ";
    //$query_all =$pdo->query($select_all);
    //$resultat_all = $query_all->fetchAll();
    //foreach($resultat_all as $key =>$arrays){
    //return $arrays;
    //foreach($arrays as $array){
      //  $username = $array['username'];
       // $password = $array ['password'];
        //echo "$username  $password";

//    }
  //  }


    ?>
