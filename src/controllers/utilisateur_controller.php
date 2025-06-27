<?php
/* Le Controller
Il recoit la requete HTTP
traite la requete (utiliser un service, utiliser un repository)
retourne la réponse (Vue)
*/

include '../repositories/utilisateur_repository.php';

// traiter les données de la page Connexion.php
if (str_contains($_SERVER['HTTP_REFERER'], "connexion")) {
    $name = $_POST['username'];
    $pwd = $_POST['password'];
    check_username_and_password($name, $pwd);
}
// s'exécute en soumettant le formulaire d'ajout de nouvel utilisateur
if (str_contains($_SERVER['HTTP_REFERER'], "gerer_utilisateur") and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $pwd = $_POST['password'];
    $nom = $_POST['nom'];
    save($name, $pwd, $nom);
    header("location: ../../views/gerer_utilisateur.php");
    die();
}
// s'exécute en cliquant sur le lien de suppression
if (str_contains($_SERVER['HTTP_REFERER'], "gerer_utilisateur") and $_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $_GET['id'];
    remove($id);
    header("location: ../../views/gerer_utilisateur.php");
    die();
}
// s'exécute en soumettant le formulaire de modification 
if (str_contains($_SERVER['HTTP_REFERER'], "modifier_utilisateur") and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $pwd = $_POST['password'];
    $nom = $_POST['nom'];
    $id = $_POST['id'];
    update($name, $pwd, $nom, $id);
    // echo("$name, $pwd, $nom, $id");
    header("location:  ../../views/gerer_utilisateur.php");
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
