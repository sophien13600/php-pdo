<?php
/*Service : tous les controles, toute les verifications toutes les transformations*/ 
include "../src/repositories/utilisateur_repository.php";

function show_utilisateurs_in_list()
{
    $utilisateurs = find_all();
    $liste = "<ul>";
    foreach ($utilisateurs as $user) {
        $a = "<a href=../src/controllers/utilisateur_controller.php?id=$user[0]'>Supprimer</a>";
        $a_mod = "<a href=./modifier_utilisateur.php?id=$user[0]'>Modifier</a>";
        $liste .= "<li>$user[1] $user[2] $user[3] $a $a_mod</li>";
    }
    $liste .= "</ul>";
    return $liste;
}
