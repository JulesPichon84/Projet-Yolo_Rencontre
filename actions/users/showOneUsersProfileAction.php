<?php

require('actions/database.php');

// Récupérer l'id de l'utilisateur
if(isset($_GET['id']) && !empty($_GET['id'])){

    // L'id de l'utilisateur
    $idOfUser = $_GET['id'];

    // Vérifier si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, lastname, firstname FROM users WHERE id = ? ORDER BY id DESC');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){


        // Récupérer toutes les données de l'utilisateur
        $usersInfos = $checkIfUserExists->fetch();

        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['lastname'];
        $user_firstname = $usersInfos['firstname'];

        // Récupérer tous les messages de l'utilisateur
        $getHisSentence = $bdd->prepare('SELECT * FROM profils WHERE id_author = ?');
        $getHisSentence->execute(array($idOfUser));

    }else{
        $errorMsg = "Aucun utilisateur trouvé !";
    }

}else{
    $errorMsg = "Aucun utilisateur trouvé !";
}