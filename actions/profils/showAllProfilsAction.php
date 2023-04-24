<?php

require('actions/database.php');

// Récupérer les profils par défaut sans recherche
$getAllProfils = $bdd->query('SELECT id, id_author, title, biographie, pseudo_author, date_publication FROM profils ORDER BY id DESC LIMIT 0,5');

// Vérifier si une recherche a été rentrée par l'utilisateur
if(isset($_GET['search']) && !empty($_GET['search'])){

    // La recherche
    $userSearch = $_GET['search'];

    // Récupérer tous les profils qui correspondent à la recherche
    $getAllProfils = $bdd->query('SELECT id, id_author, title, biographie, pseudo_author, date_publication FROM profils WHERE title LIKE "%'.$userSearch.'%" ORDER BY id DESC');

}
