<?php

require('actions/database.php');

// Vérifier si l'id du profil est bien passé en paramètre dans l'URl
if(isset($_GET['id']) && !empty($_GET['id'])){

    $idOfProfil = $_GET['id'];

    // Vérifier si le profil existe
    $checkIfProfilExists = $bdd->prepare('SELECT * FROM profils WHERE id = ?');
    $checkIfProfilExists->execute(array($idOfProfil));

    if($checkIfProfilExists->rowCount() > 0){

        // Récupérer les données du profil
        $profilInfos = $checkIfProfilExists->fetch();
        if($profilInfos['id_author'] == $_SESSION['id']){

            $profil_title = $profilInfos['title'];
            $profil_biographie = $profilInfos['biographie'];
            $profil_question = $profilInfos['questions'];

            $profil_biographie = str_replace('<br />', '', $profil_biographie);
            $profil_question = str_replace('<br />', '', $profil_question);

        }else{
            $errorMsg = "Vous n'êtes pas l'auteur de ce profil !";
        }

    }else{
        $errorMsg = "Aucun profil trouvé !";
    }

}else{
    $errorMsg = "Aucun profil trouvé !";
}