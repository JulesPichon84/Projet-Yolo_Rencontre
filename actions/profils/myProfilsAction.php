<?php

require('actions/database.php');

$getAllProfils = $bdd->prepare('SELECT id, title, biographie FROM profils WhERE id_author = ? ORDER BY id DESC');
$getAllProfils->execute(array($_SESSION['id']));