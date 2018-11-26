<?php include ("includes/header.php"); ?>

<?php display_message();?>

			<?php validate_user_login(); ?>

			<?php if(logged_in()){

				redirect("index.php");
			} ?>
			
<?php include ("includes/navbar.php"); ?>
	
<div class="container mt-4">
	<div class="row">
		<div class="col-6"><h2 class ="featurette-heading">Connectez-vous pour accéder à votre espace FOMADEL</h2>
		<h5><a href="register.php" id="" class =" nav-link">ou créez un nouveau compte</a></h5>
		</div>
		<div class="col-6 p-5">
		<h2 class="blog-post-title animated">Se connecter</h2>
		<hr class="mb-5">
			<form id="login-form"  method="post" role="form" style="display: block;">
				<div class="form-group">
					<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="your email" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" id="login-password" tabindex="2" class="form-control" placeholder="your password" required>
				</div>
				<div class="form-group text-center">
					<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
					<label for="remember"> Se souvenir de moi</label>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-outline-secondary" value="Se connecter">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-12">
					<div class="text-center">
						<a href="recover.php" tabindex="5" class="forgot-password">Mot de passe oublié?</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
	</div>
</div>
<hr class="featurette-divider">
<?php include ("includes/footer.php"); ?>