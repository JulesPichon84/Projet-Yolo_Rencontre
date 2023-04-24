<?php 
    session_start();
    require('actions/profils/showAllProfilsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
<body>
    <?php include'includes/navbar.php'; ?>
    <br><br>

    <div class="container">

        <form method="GET">
            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success">Rechercher</button>
                </div>

            </div>
        </form>
        <br>
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
                        <?= $profils['biographie']; ?>
                    </div>
                    <div class="card-footer">
                        Publié par <a href="profile.php?id=<?= $profils['id_author']; ?>"><?= $profils['pseudo_author']; ?></a> le <?= $profils['date_publication']; ?>
                    </div>
                </div>
                <br>
                <?php
            }
        ?>
    </div>

</body>
</html>
