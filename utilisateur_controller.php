<?php
include './utilisateurs_repository.php';

// traiter les données de la page Connexion.php
if (str_contains($_SERVER['HTTP_REFERER'], "connexion")) {
    $name = $_POST['username'];
    $pwd = $_POST['password'];
    check_username_and_password($name, $pwd);
}
if (str_contains($_SERVER['HTTP_REFERER'], "utilisateurs") and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $pwd = $_POST['password'];
    $nom = $_POST['nom'];
    save($name, $pwd, $nom);
    header("location: utilisateurs.php");
    die();
}
if (str_contains($_SERVER['HTTP_REFERER'], "utilisateurs.php") and $_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $_GET['id'];
    delete($id);
    header("location: utilisateurs.php");
    die();
}

// solution avec un marqueur nominatif

// // solution avec les fonctions de transformation : htmlentities
// $name = $_POST['username'];
// $pwd = $_POST['password'];

// $mysql_username = "root";
// $mysql_password = "";
// $mysql_db = "php_pdo";

// try {
//     $dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset=utf8";
//     $pdo = new PDO($dsn, $mysql_username, $mysql_password);
//     // Injection SQL avec gfghfgf' or true !='sqdsq
//     $select = "SELECT * FROM utilisateurs WHERE username = '" .  htmlentities($name) . "'  AND password = '" . htmlentities($pwd) ."'";
//     $query = $pdo->query($select);
//     $resultat = $query->fetch();
//     if ($resultat != false) {
//         echo "Vous êtes bien connectés : $name -- $pwd";
//     } else {
//         echo "Identifiants incorrects";
//     }

// } catch (PDOException $ex) {
//     echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
// }
// Solution avec le marqueur ?
// $name = $_POST['username'];
// $pwd = $_POST['password'];

// $mysql_username = "root";
// $mysql_password = "";
// $mysql_db = "php_pdo";

// try {
//     $dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset=utf8";
//     $pdo = new PDO($dsn, $mysql_username, $mysql_password);
//     $select = "SELECT * FROM utilisateurs WHERE username = ? AND password = ?";
//     echo "<br>$select<br>";
//     $query = $pdo->prepare($select);
//     $query->execute([$name, $pwd]);
//     $resultat = $query->fetch();
//     if ($resultat != false) {
//         echo "Vous êtes bien connectés : $name -- $pwd";
//     } else {
//         echo "Identifiants incorrects";
//     }
// } catch (PDOException $ex) {
//     echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
// }

// Solution sans requête préparée
// $name = $_POST['username'];
// $pwd = $_POST['password'];

// $mysql_username = "root";
// $mysql_password = "";
// $mysql_db = "php_pdo";

// try {
//     $dsn = "mysql:host=localhost;port=3306;dbname=$mysql_db;charset=utf8";
//     $pdo = new PDO($dsn, $mysql_username, $mysql_password);
//     // Injection SQL
//     $select = "SELECT * FROM utilisateurs WHERE username = '$name' AND password = '$pwd'";

//     $query = $pdo->query($select);
//     $resultat = $query->fetch();
//     if ($resultat != false) {
//         echo "Vous êtes bien connectés : $name -- $pwd";
//     } else {
//         echo "Identifiants incorrects";
//     }
// } catch (PDOException $ex) {
//     echo "\nErreur : problème de connexion avec la BD" . $ex->getMessage();
// }
