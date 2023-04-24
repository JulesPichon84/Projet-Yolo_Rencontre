<?php

require('actions/database.php');

// Validation du formualaire
if(isset($_POST['validate'])){

    // Vérifier si les champs sont remplis
    if(!empty($_POST['title']) && !empty($_POST['biographie']) && !empty($_POST['questions'])){

        // Les données à faire passer dans la requête
        $new_profil_title = htmlspecialchars(($_POST['title']));
        $new_profil_biographie = nl2br(htmlspecialchars($_POST['biographie']));
        $new_profil_questions = nl2br(htmlspecialchars($_POST['questions']));

        // Modifier les infos du profil qui possède l'id rentré en paramètre
        $editProfilOnWebsite = $bdd->prepare('UPDATE profils SET title = ?, biographie = ?, questions = ? WHERE id = ?');
        $editProfilOnWebsite->execute(array($new_profil_title, $new_profil_biographie, $new_profil_questions, $_GET['id']));

        // redirection vers la page d'affichage des profils de l'utilisateur
        header('Location: my-profils.php');

    }else{
        $errorMsg = "Veuillez compléter tous les champs ...";
    }

}