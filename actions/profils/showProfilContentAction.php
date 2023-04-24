<?php

require('actions/database.php');

// Vérifier si l'id du profil est rentré dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){

    // Récupérer l'id du profil
    $idOfTheProfil = $_GET['id'];

    // Vérifier si le profil existe
    $checkIfProfilExists = $bdd->prepare('SELECT * FROM profils WHERE id =?');
    $checkIfProfilExists->execute(array($idOfTheProfil));

    if($checkIfProfilExists->rowCount() > 0){

        //Récupérer toutes les datas du profil
        $profilInfos = $checkIfProfilExists->fetch();

        // Stocker les datas du profil dans des variables propres
        $profil_title = $profilInfos['title'];
        $profil_biographie = $profilInfos['biographie'];
        $profil_questions = $profilInfos['questions'];
        $profil_id_author = $profilInfos['id_author'];
        $profil_pseudo_author = $profilInfos['pseudo_author'];
        $profil_date_publication = $profilInfos['date_publication'];

    }else{
        $errorMsg = "Aucun profil n'a été trouvé";
    }

}else{
    $errorMsg = "Aucun profil n'a été trouvé";
}