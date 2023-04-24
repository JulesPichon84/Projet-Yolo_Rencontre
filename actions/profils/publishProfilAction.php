<?php
session_start();
require('actions/database.php');

// Valider le formulaire
if(isset($_POST['validate'])){

    // Vérifier si les chemps ne sont pas vides
    if(!empty($_POST['profil']) && !empty($_POST['biographie']) && !empty($_POST['questions'])){
        
        // Les données du profil
        $profil_title = htmlspecialchars($_POST['profil']);
        $profil_biographie = nl2br(htmlspecialchars($_POST['biographie']));
        $profil_questions = nl2br(htmlspecialchars($_POST['questions']));
        $profil_date = date('d/m/Y');
        $profil_id_author = $_SESSION['id'];
        $profil_pseudo_author = $_SESSION['pseudo'];

        // Insérer le profil sur le profil
        $insertProfilsOnWebsite = $bdd->prepare('INSERT INTO profils(title, biographie, questions, id_author, pseudo_author, date_publication) VALUES(?, ?, ?, ?, ?, ?)');
        $insertProfilsOnWebsite->execute(
            array(
                $profil_title,
                $profil_biographie, 
                $profil_questions, 
                $profil_id_author, 
                $profil_pseudo_author, 
                $profil_date
            )
        );

        $sucessMsg = "Votre profil a bien été publié sur le site !";

    }else{
        $errorMsg = "Veuillez compléter tous les champs ...";
    }

}