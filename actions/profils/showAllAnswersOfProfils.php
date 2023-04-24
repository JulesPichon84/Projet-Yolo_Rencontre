<?php

require('actions/database.php');

$getAllAnswersOfThisProfil = $bdd->prepare('SELECT id_author, pseudo_author, id_question, content FROM answers WHERE id_question = ? ORDER BY id DESC ');
$getAllAnswersOfThisProfil->execute(array($idOfTheProfil));