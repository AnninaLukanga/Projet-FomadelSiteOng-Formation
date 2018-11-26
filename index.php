  
  <?php include ("includes/header.php"); ?>
  <?php include ("includes/navbar.php"); ?>
   
    <main role="main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide animated fadeIn" src="imgs/girl2.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left animated slideInUp">
                <h1>La Force des Mamans pour le Développement</h1>
                <p>Son objectif est la lutte contre les dynamiques d’appauvrissement des ménages dans ce quartier urbain aujourd’hui confronté à d’importants problèmes alimentaires</p>
                <p><a class="btn btn-lg btn-outline-light" href="#" role="button">À Propos</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="imgs/handgreen.jpg" alt="Second slide">
            <img src="" alt="">
            <div class="container">
              <div class="carousel-caption animated slideInUp">
                <h1>Conservation de la nature</h1>
                <p>Un environnement sain permet une santé saine. Sensibiliser, c’est prévenir</p>
                <p><a class="btn btn-lg btn-outline-light" href="#" role="button">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="imgs/happy_ladies2.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right animated slideInUp">
                <h1>Actions en faveur du développement</h1>
                <p>Pour générer des revenus supplémentaires, plusieurs adhérentes se sont lancées à la transformation de produits locaux.</p>
                <p><a class="btn btn-lg btn-outline-light" href="#" role="button">Découvrir</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row animated fadeIn">
          <div class="col-lg-4">
            <i class="fa fa-hand-holding-heart fa-4x text-white p-4 img-thumbnail bg-warning rounded-circle"></i>
            <h2 class="text-warning">Faire un Don</h2>
            <p class="text-justify text-warning lead">Grâce à vos dons, nous pouvons poursuivre et intensifier nos actions pour garantir le bien-être de nombreuses familles, financer nos activités agricoles et améliorer le rendement des maraîchers.</p>
            <p><a class="btn btn-outline-warning" id="btn-warning" href="don.php" role="button">Comment aider &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <i class="fa fa-shopping-basket fa-4x text-white p-4 img-thumbnail bg-secondary rounded-circle"></i>
            <h2 class="text-muted">Boutique</h2>
            <p class="text-justify text-muted lead">Plusieurs adhérentes se sont lancée dans la transformation de produits locaux, elle s’adonne à la fabrication de vin, la confection de poudre et de jus de moringa ainsi que de produits d’entretien.</p>
            <p><a class="btn btn-outline-secondary" href="shop.php" role="button">Voir les produits &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <i class="fa fa-leaf fa-4x text-white p-4 img-thumbnail bg-success rounded-circle"></i>
            <h2 class="text-success">Action Agriculture</h2>
            <p class="text-justify text-success lead">L’agriculture urbaine est une façon de jardiner responsable et aussi de faire diminuer les émissions de CO2. Les fermes urbaines peuvent générer des emplois, depuis la production jusqu'à la vente et la distribution.</p>
            <p><a class="btn btn-outline-success" href="agriculture.php" role="button">Plus de details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading" style="color: #004d00;">La FOMADEL, <span class="text-muted">promotrice des initiatives de développement locales.</span></h2>
            <p class="lead">La Force des Mamans pour le Développement mène différentes actions à l’intention de jeunes et des femmes dans les activités de maraichage et d’élevage à travers la sensibilisation et la formation.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="imgs/handcare2.jpg" alt="handcare">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading" style="color: #004d00;">C'est une ONG <span class="text-muted">qui fait la promotion de l’agriculture urbaine.</span></h2>
            <p class="lead">Les cultures maraichères se présentent comme une opportunité pour générer des ressources complémentaires, ou se substituer aux emplois trop peu rémunérateurs des ménages pour la survie de nombreuses familles.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="imgs/agriculture.jpg" alt="Agriculture">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading" style="color: #004d00;">Un environnement sain <span class="text-muted">permet une santé saine.</span></h2>
            <p class="lead">la FOMADEL est à l’origine de programmes d’action et de sensibilisation en faveur de la santé et de l’hygiène, de la conservation de la nature et de l’assainissement des rues dans le quartier.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="imgs/water.jpg" alt="Water">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->

  <?php include ("includes/footer.php"); ?>
