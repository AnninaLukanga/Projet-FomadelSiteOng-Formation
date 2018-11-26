  <?php include ("includes/header.php"); ?>
  <?php include ("includes/navbar.php"); ?>

  
  <?php contact_us(); ?>
      
       <form id="contact-form" method="post" action="" role="form">
            <div class="row contact">
                <div class="col-sm-6">
                    <label for="firstname">Prenom / First Name <span class="blue">*</span></label>
                    <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Your First name">
                    <p class="comments"></p>
                </div>
                <div class="col-sm-6">
                    <label for="name">Nom / Last Name <span class="blue">*</span></label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Your last name">
                    <p class="comments"></p>
                </div>
                <div class="col-sm-6">
                    <label for="email">Email <span class="blue">*</span></label>
                    <input id="email" type="text" name="email" class="form-control" placeholder="Your Email">
                    <p class="comments"></p>
                </div>
                <div class="col-md-6">
                    <label for="phone">Numeros Telephone / Phone Number</label>
                    <input id="phone" type="tel" name="phone" class="form-control" placeholder="Your phone Number">
                    <p class="comments"></p>
                </div>
                <div class="col-md-12">
                    <label for="message">Message <span class="blue">*</span></label>
                    <textarea id="message" name="message" class="form-control" placeholder="Mettre votre message ici" rows="4"></textarea>
                    <p class="comments"></p>
                </div>
                <div class="col-md-12">
                    <p class="blue"><strong>* Information Obligatoire!!</strong></p>
                </div>
                <div class="col-sm-12">
                    <input type="submit" class="button1" value="Envoyer">
                </div>    
            </div>
        </form>


  <?php include ("includes/footer.php"); ?>