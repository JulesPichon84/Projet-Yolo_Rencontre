<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Yolo_Renconte</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Les Profils</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publish-profil.php">Ajouter un profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-profils.php">Mes profils</a>
        </li>
        <?php
          if(isset($_SESSION['auth'])){
            ?>
              <li class="nav-item">
                <a class="nav-link" href="profile.php?id=<?= $_SESSION['id']; ?>">Mon profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="actions/users/logoutAction.php">Déconnexion</a>
              </li>
            <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>