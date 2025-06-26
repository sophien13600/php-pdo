<?php

function check_username_and_password($name, $pwd)
{
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_db = "php_pdo";

    try {
        $dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset=utf8";
        $pdo = new PDO($dsn, $mysql_username, $mysql_password);
        $select = "SELECT * FROM utilisateurs WHERE username = :name AND password = :pwd";
        echo "<br>$select<br>";
        $query = $pdo->prepare($select);
        $query->bindValue(":name", $name);
        $query->bindValue(":pwd", $pwd);
        $query->execute();
        $resultat = $query->fetch();
        if ($resultat != false) {
            echo "Vous êtes bien connectés : $name -- $pwd";
        } else {
            echo "Identifiants incorrects";
        }
    } catch (PDOException $ex) {
        echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
    }
}

function find_all()
{
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_db = "php_pdo";

    try {
        $dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset=utf8";
        $pdo = new PDO($dsn, $mysql_username, $mysql_password);
        $select = "SELECT * FROM utilisateurs";
        $query = $pdo->query($select);
        return $query->fetchAll();
    } catch (PDOException $ex) {
        echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
    }
    return [];
}
function save($name, $pwd, $nom)
{
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_db = "php_pdo";

    try {
        $dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset=utf8";
        $pdo = new PDO($dsn, $mysql_username, $mysql_password);
        $select = "INSERT INTO utilisateurs VALUES (NULL, :username, :pwd, :nom)";
        $query = $pdo->prepare($select);
        $query->bindValue(":username", $name);
        $query->bindValue(":pwd", $pwd);
        $query->bindValue(":nom", $nom);
        $query->execute();
    } catch (PDOException $ex) {
        echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
    }
}
function delete($id)
{
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_db = "php_pdo";

    try {
        $dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset=utf8";
        $pdo = new PDO($dsn, $mysql_username, $mysql_password);
        $select = "DELETE FROM utilisateurs WHERE id = :id";
        $query = $pdo->prepare($select);
        $query->bindValue(":id", $id);
        $query->execute();
    } catch (PDOException $ex) {
        echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
    }
}
function affiche(){
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_db = "php_pdo";

    try {
        $dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset=utf8";
        $pdo = new PDO($dsn, $mysql_username, $mysql_password);
         $select = "SELECT u.username, u.nom, u.password FROM utilisateurs u";
        $query = $pdo->query($select);
        return $query->fetchAll();
        $query->execute();
    } catch (PDOException $ex) {
        echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
    }
}
    
