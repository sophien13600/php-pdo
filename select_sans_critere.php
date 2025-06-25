<?php

$mysql_username = "root";
$mysql_password = "";
$mysql_db = "php_pdo";

//DSN Data Source Naame : URL de connexion
try{
    $dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset = utf-8";
    //etablir la connexion avec MYSQL
    $pdo = new PDO($dsn,$mysql_username, $mysql_password);
    //chaine contenant la requete SQL
    $select = "SELECT * FROM utilisateurs";
    //executer la requete SQL
    $query = $pdo->query($select);
    
   // récupérer le premier tuple
    $resultat = $query->fetch();
    echo "\n" . $resultat['id']  . " " . $resultat['username'] ;
    //echo "\n $resultat[0] $resultat[1] $resultat[2] $resultat[3]";
    // récupérer tous les tuples de la table
    // $resultat = $query->fetchAll();
    // foreach ($resultat as $key => $value) {
    //     echo "\n $value[0] $value[1] $value[2] $value[3]";
    // }
}catch (PDOException $ex){
    echo "\nErreur : probmème de connexion avec la BD" . $ex->getMessage();
} echo "Fin";
