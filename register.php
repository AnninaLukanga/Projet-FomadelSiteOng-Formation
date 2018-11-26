<?php include ("includes/header.php"); ?>
<?php include ("includes/navbar.php"); ?>

<main role="main">
<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			
			<?php validate_user_registration(); ?>
								
		</div>
		<div class="container mt-4">
		<h2 class="blog-post-title animated">Créer un compte</h2>
	<hr>
<div class="row">
	<div class="col-6 p-5">
	
	<form id="register-form" method="post" role="form" >

<div class="form-group">
	<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="Your First Name" value="" required >
</div>
<div class="form-group">
	<input type="text" name="last_name" id="last_name" tabindex="1" class="form-control" placeholder="Your last Name" value="" required >
</div>
<div class="form-group">
	<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Your username" value="" required >
</div>
<div class="form-group">
	<input type="email" name="email" id="register_email" tabindex="1" class="form-control" placeholder="Your email" value="" required >
</div>
<div class="form-group">
	<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="your password" required>
</div>
<div class="form-group">
	<input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm your Password" required>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-outline-success" value="Créer un compte">
		</div>
	</div>
</div>
</form>
	</div>
	<div class="col-6">
		<h3 class ="featurette-heading">Vous avez déjà un compte?</h3>
		<h5><a href="login.php" class ="nav-link">Connectez vous <span class ="text-muted">pour accéder à votre espace FOMADEL<span></a></h5>
	</div>
	</div>
</div>

</div><!-- /.container -->
<hr class="featurette-divider">
<?php include ("includes/footer.php"); ?>