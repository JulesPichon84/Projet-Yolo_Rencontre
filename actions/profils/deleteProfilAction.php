<?php

// Vérifier si l'utilisateur est authentifié au niveau du site
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}

require('../database.php');

// Vérifier si l'id est rentré en paramètre dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){

    // L'id du profil en paramètre
    $idOfTheProfil = $_GET['id'];

    // Vérifier si le profil existe
    $checkIfProfilExists = $bdd->prepare('SELECT * FROM profils WHERE id = ?');
    $checkIfProfilExists->execute(array($idOfTheProfil));

    if($checkIfProfilExists->rowCount() > 0){

        // Récupérer les infos du profil
        $profilInfos = $checkIfProfilExists->fetch();
        if($profilInfos['id_author'] == $_SESSION['id']){

            // Supprimer le profil en fonction de son id renté en paramètre
            $deleteThisProfil = $bdd->prepare('DELETE FROM profils WHERE id = ?');
            $deleteThisProfil->execute(array($idOfTheProfil));

            header('Location: ../../my-profils.php');

        }else{
            echo "Vous n'avez pas le droit de supprimer un profil qui ne vous appartient pas !";
        }

    }else{
        echo "Aucun profil n'a été trouvé !";
    }

}else{
    echo "Aucun profil n'a été trouvé !";
}