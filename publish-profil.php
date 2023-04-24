<?php 
    require('actions/profils/publishProfilAction.php');
    require('actions/users/securityAction.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <form class="container" method="POST">
        <?php 
            if(isset($errorMsg)){
                 echo '<p>'.$errorMsg.'</p>';
            }elseif(isset($sucessMsg)){
                echo '<p>'.$sucessMsg.'<p>';
            }
         ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Profil</label>
            <input type="text" class="form-control" name="profil">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Biographie</label>
            <textarea class="form-control" name="biographie"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Questions</label>
            <textarea class="form-control" name="questions"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Publier un profil</button>
    </form>
</body>
</html>