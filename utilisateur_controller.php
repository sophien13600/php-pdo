<?php

$utilisateur = $_POST['username'];
$mdp = $_POST['password'];
$mysql_username = "root";
$mysql_password = "";
$mysql_db = "php_pdo";
//connexion a la base de donnee
$dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset = utf-8";
$pdo = new PDO($dsn,$mysql_username, $mysql_password);
//si  $_POST['username'] et  $_POST['password'] est dans la base de données alors afficher bienvenue sinon veuillez creer un compte

  //$select = "SELECT * FROM utilisateurs WHERE username ='$utilisateur' AND password = '$mdp'";
  $select = "SELECT * FROM utilisateurs WHERE username = ? AND password = ?";
    //executer la requete SQL
    //$query = $pdo->query($select);
    $query = $pdo->prepare($select);
    $query->execute([$utilisateur, $mdp]);
     $resultat= $query->fetch();
    if($resultat != false){
            echo "vous etes connectés";
    }else{
       echo "vous devez creer un compte";
    }
         
        
