<?php
include __DIR__ .  "/../config/connection.php";
function check_username_and_password($name, $pwd)
{
  

    try {
       $pdo = get_connection(); 
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
       $pdo = get_connection(); 
        $select = "SELECT * FROM utilisateurs";
        $query = $pdo->query($select);
        return $query->fetchAll();
    } catch (PDOException $ex) {
        echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
    }
    return [];
}
function find_by_id($id)
{
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_db = "php_pdo";

    try {
       $pdo = get_connection(); 
        $select = "SELECT * FROM utilisateurs WHERE id = :id";
        $query = $pdo->prepare($select);
        $query->bindValue(":id", $id);
        $query->execute();
        return $query->fetch();
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
       $pdo = get_connection(); 
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
function remove($id)
{
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_db = "php_pdo";

    try {
       $pdo = get_connection(); 
        $select = "DELETE FROM utilisateurs WHERE id = :id";
        $query = $pdo->prepare($select);
        $query->bindValue(":id", $id);
        $query->execute();
    } catch (PDOException $ex) {
        echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
    }
}
function update($name, $pwd, $nom, $id)
{
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_db = "php_pdo";

    try {
       $pdo = get_connection(); 
        $select = "UPDATE utilisateurs SET nom = :nom, username= :username, password = :pwd WHERE id = :id";
        $query = $pdo->prepare($select);
        $query->bindValue(":username", $name);
        $query->bindValue(":pwd", $pwd);
        $query->bindValue(":nom", $nom);
        $query->bindValue(":id", $id);
        $query->execute();
    } catch (PDOException $ex) {
        echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
        echo $ex->getMessage();
        echo "$id $name $nom $pwd";
        die();
    }
}
