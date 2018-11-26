
<nav class="navbar navbar-expand-md navbar-light fixed-top bg-white border-bottom shadow animated slideInDown">
  <a class="navbar-brand" href="index.php"><img src="imgs/logo_fomadel.jpg" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <h5><a class="nav-link" href="apropos.php">Qui somes nous</a></h5>
      </li>
      <li class="nav-item dropdown">
        <h5><a class="nav-link dropdown-toggle" href="#"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Activités
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="agriculture.php">L'agriculture</a>
          <a class="dropdown-item" href="elevage.php">L'elevage</a>
          <a class="dropdown-item" href="hygiene-environement.php">L'hygiène et environnement</a>
          <a class="dropdown-item" href="formations.php">Formations</a>
          <a class="dropdown-item" href="les-jeunes.php">Avec les jeunes</a>
        </div>
        </h5>
      </li>
      <li class="nav-item">
        <h5><a class="nav-link" href="contact.php">Contact</a></h5>
      </li>
      <li class="nav-item">
        <h5><a class="nav-link" href="forum.php">Forum</a></h5>
      </li>
      <li class="nav-item">
        <h5><a class="nav-link" href="shop.php">Boutique</a></h5>
      </li>
      <li class="nav-item">
        <h5><a class="nav-link" href="don.php">Faire un Don</a></h5>
      </li>
      </ul>


      <?php if(logged_in()):?>

        
          <h5><a class="nav-link" href="admin.php">Admin</a></h5>
        
          <h5><a class="nav-link" href="logout.php">Logout</a></h5>
          
       <?php else: ?>

        <a href="login.php" class="nav-link" style="color: gray">Connectez-vous</a>
      <span style = "color: rgb(255, 193, 7)">ou</span>
      <a href="register.php" class="nav-link" style="color: green">Créez un compte</a>

      <?php endif; ?>
      
    
  </div>
</nav>

  