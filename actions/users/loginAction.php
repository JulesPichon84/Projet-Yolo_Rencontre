<?php
session_start();
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['validate'])){

    // Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
        
        // Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        // Vérifier si l'utilisateur existe (pseudo correct)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0){

            // Récupérer les données de l'utilisateur
            $userInfos = $checkIfUserExists->fetch();

            // Vérifier si le mot de passe est correct
            if(password_verify($user_password, $userInfos['password'])){

            // Authentifier l'utilisateur sur le site et récupérer ses données dans des tableaux
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['lastname'];
            $_SESSION['firstname'] = $userInfos['firstname'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];

            // Rediriger l'utilisateur vers la page d'accueil
            header('Location: index.php');

            }else{
                $errorMsg = "Votre mot de passe est incorrect !";
            }

        }else{
            $errorMsg = "Votre pseudo est incorrect !";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs ...";
    }
}