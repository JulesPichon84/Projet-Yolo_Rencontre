<?php 
    session_start();
    require('actions/profils/showProfilContentAction.php');
    require('actions/profils/postAnswerAction.php');
    require('actions/profils/showAllAnswersOfProfils.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
<body>
    <?php include'includes/navbar.php'; ?>
    <br><br>

    <div class="container">


        <?php 
            if(isset($errorMsg)){ echo $errorMsg; }
        
            if(isset($profil_date_publication)){
            ?>
            <section class="show-content">
                <h3><?= $profil_title; ?></h3>
            <hr>
            <p><?= $profil_biographie ?></p>
            <hr>
            <small><?= '<a href="profile.php?id='.$profil_id_author.'">'.$profil_pseudo_author . '</a> ' . $profil_date_publication; ?></small>
            </section>
            <br>
            <section class="show-answers">
                
                <form class="form-group" method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Envoyer un message :</label>
                        <textarea name="answer" class="form-control"></textarea>
                        <br>
                        <button class="btn btn-primary" type="submit" name="validate">Envoyer un message</button>
                    </div>
                </form>
                <?php
                    while($answer = $getAllAnswersOfThisProfil->fetch()){
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <a href="profile.php?id=<?= $answer['id_author']; ?>"><?= $answer['pseudo_author']; ?></a>
                            </div>
                        
                            <div class="card-body">
                            <?= $answer['content']; ?>
                            </div>
                        </div>
                        <br><br>
                        <?php
                    }
                ?>
            </section>
            <?php
        }
        ?>

    </div>

</body>
</html>