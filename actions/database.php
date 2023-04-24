<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=yolo_rencontre;charset=utf8;', 'root', 'ElRoot8!!4<>');
}catch(Exception $e){
    die('Une erreur a été trouvée :' . $e->getMessage());
}

