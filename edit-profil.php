<?php 
    require('actions/users/securityAction.php');
    require('actions/profils/getInfosOfEditedProfilAction.php');
    require('actions/profils/editProfilAction.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <div class="container">
        <?php if(isset($errorMsg)){
             echo '<p>'.$errorMsg.'</p>';
            }
         ?>
         <?php if(isset($profil_question)){
            ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Profil</label>
                    <input type="text" class="form-control" name="profil" value="<?= $profil_title ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Biographie</label>
                    <textarea class="form-control" name="biographie">
                        <?= $profil_biographie?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Questions</label>
                    <textarea class="form-control" name="questions">
                        <?= $profil_question ?>
                    </textarea>
                 </div>
                <button type="submit" class="btn btn-primary" name="validate">Modifier le profil</button>
            </form>
          <?php
         }
         ?>
    </div>

</body>
</html>