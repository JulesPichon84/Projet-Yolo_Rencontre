<?php 
    require('actions/users/securityAction.php'); 
    require('actions/profils/myProfilsAction.php');
    
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
    <body>
        <?php include 'includes/navbar.php'; ?>
        <br><br>
        <div class="container">

        <?php 
            while($profils = $getAllProfils->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                    <a href="profil.php?id=<?= $profils['id']; ?>">
                        <?= $profils['title']; ?>
                    </a>
                    </div>
                    <div class="card-body">
                    <p class="card-text"><?= $profils['biographie']; ?>
                    </p>
                    <a href="profil.php?id=<?= $profils['id']; ?>" class="btn btn-primary">Accéder au profil</a>
                    <a href="edit-profil.php?id=<?= $profils['id']; ?>" class="btn btn-warning">Modifier le profil</a>
                    <a href="actions/profils/deleteProfilAction.php?id=<?=  $profils['id']; ?>" class="btn btn-danger">Supprimer le profil</a>
                    </div>
                </div>
                <?
            }
        ?>
        </div>
    </body>
</html>