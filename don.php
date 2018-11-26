<?php include ("includes/header.php"); ?>
<?php include 'includes/navbar.php'?>

    <main role="main">
       <div class="container">
       
        <!-- titre de la page -->
            <div class="row">
                <div class="col-md-12" id="top">
                    <h2 class="blog-post-title">Faire un don</h2>
                    <hr>
                </div>
            </div>
        
        <!-- div1 -->
        <!-- col1 -->
            <div class="row featurette ">
                <div class="col-md-9 order-md-1">
                    <p class="text-justify lead mt-3">
                    Les actions de FOMADEL sont financées en premier lieu par la collecte de ses membres et par les dons des personnes qui
                   partagent nos opinions.
                   Grâce à ces dons, nous pouvons garantir le bien-être de nombreuses familles par nos diverses actions.</p>
                   
                   <h3 class="text-muted mt-5">Je donne</h3>
                    <hr>
                    <p class="text-justify lead mt-3">
                   Pour nous faire un don en ligne, cliquez sur le bouton ci-dessous. Grâce à vous, nous pouvons poursuivre et intensifier nos actions
                   et agir sur les causes profondes de la pauvreté.
                    </p>

                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="mt-5">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="YPMWWT9SY2L4W">
                        <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                        <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                    </form>
<p>En cliquant sur le bouton ci-dessus,vous serez redirigé sur notre page de paiement <span class ="font-weight-bold font-italic text-primary ">PayPal</span>. Vous serez en toute securité 
lorsque vous effectuerez votre virement.</p>
                </div>
                <!-- col2 -->
                <div class="col-md-3 order-md-2" style="background: gray">
                </div> 
            </div> 
            <hr class="featurette-divider">
            </div>      
    </main>
      <?php include 'includes/footer.php'?>