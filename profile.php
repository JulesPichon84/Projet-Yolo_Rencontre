<?php 
    session_start();
    require('actions/users/showOneUsersProfileAction.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    <div class="container">
    <?php if(isset($errorMsg)){ echo $errorMsg; }
    
        if(isset($getHisSentence)){
            ?>
            <div class="card">
                <div class="card-body">
                    <h4><?= $user_pseudo; ?></h4>
                    <hr>
                    <p><?= $user_firstname . ' ' . $user_lastname; ?></p>
                </div>
            </div>
            <br>
            <?php
                while($profils = $getHisSentence->fetch()){
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <?= $profils['title']; ?>
                        </div>
                        <div class="card-body">
                            <?= $profils['biographie']; ?>
                        </div>
                        <div class="card-footer">
                            Par <?= $profils['pseudo_author']; ?> le <?= $profils['date_publication']; ?>
                        </div>
                    </div>
                    <br>
                    <?php
                }	
        }
    ?>
    </div>
</body>
</html>