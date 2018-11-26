<?php 


// Library composer/ phpmailer

require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function clean($string){

	return htmlentities($string);
}

function redirect($location){

	return header("Location: {$location}");
}

function set_message($message){
	if(!empty($message)){

		$_SESSION['message'] = $message;
	} else {
		$message = "";
	}
}

function display_message(){
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function token_generator(){
	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
	return $token;
}

function validation_errors($error_message){
					$error_message = <<<DELIMITER

	<div class="alert alert-danger" role="alert">
  						<strong>Oh snap!</strong> $error_message
	</div>
DELIMITER;
	echo $error_message;
}

function email_exists($email){
	$sql = "SELECT id FROM users WHERE email = '$email'";
	
	$result = query($sql);

	if(row_count($result) == 1){
		return true;
	} else {
		return false;
	}
}

function username_exists($username){
	$sql = "SELECT id FROM users WHERE username = '$username'";
	
	$result = query($sql);

	if(row_count($result) == 1){
		return true;
	} else {
		return false;
	}
}

function send_email($email=null, $subject=null, $msg=null, $headers=null){

	$mail = new PHPMailer(true);  

                                
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
    $mail->Username = '3824487ffcb1d0';                 // SMTP username
    $mail->Password = 'a539e11696cee7';                           // SMTP password
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 2525;      


    $mail->setFrom('selim.baccouche@gmail.com', 'Fomadel Ong');
    $mail->addAddress($email);     // Add a recipient


        //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject =  $subject;
    $mail->Body    = $msg;
    $mail->AltBody = $msg;

    if($mail->send()){

   		echo 'Message has been sent';

	} else {

    	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

    	return false;
	}



	// return mail($email, $subject, $msg, $headers);

}

// Function Validation

function validate_user_registration(){

	$errors = [];

	$min = 3;
	$max = 20;

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		$first_name 			= clean($_POST['first_name']);
		$last_name 				= clean($_POST['last_name']);
		$username 				= clean($_POST['username']);
		$email 					= clean($_POST['email']);
		$password 				= clean($_POST['password']);
		$confirm_password 		= clean($_POST['confirm_password']);

		if(strlen($first_name) < $min){
			$errors[] = "Your First Name should be more than {$min} characters";
		}
		if(strlen($first_name) > $max){
			$errors[] = "Your First Name should not be more than {$max} characters";
		}

		if(strlen($last_name) < $min){
			$errors[] = "Your Last Name should be more than {$min} characters";
		}
		if(strlen($last_name) > $max){
			$errors[] = "Your Last Name should not be more than {$max} characters";
		}

		if(strlen($username) < $min){
			$errors[] = "Your Username should be more than {$min} characters";
		}
		if(strlen($username) > $max){
			$errors[] = "Your Username should not be more than {$max} characters";
		}

		if(username_exists($username)){
			$errors[] = "Sorry that username is already taken";

		}

		if(email_exists($email)){
			$errors[] = "Sorry that email is already registered";

		}

		if(strlen($email) < $min){
			$errors[] = "Your Email should be more than {$min} characters";
		}

		if($password !== $confirm_password){
			$errors[] = "Your Password fileds do not match ";
		}

		if(!empty($errors)){
			foreach ($errors as $error){
				
			echo validation_errors($error);
				//ERROR DISPLAY
			} 
		}else{ 

				if(register_user($first_name, $last_name, $username, $email, $password)){
					
					set_message("<p class='bg-success text-center'>Please check your Email or Spam folder for activation link</p>");
					redirect("index.php");

				} 	else {
					set_message("<p class='bg-danger text-center'>Sorry we could not registered the user</p>");
					redirect("index.php");

				}
		}
	} // post request
} // function 

// Function Register User

function register_user($first_name, $last_name, $username, $email, $password){

	$first_name 	= escape($first_name);
	$last_name 		= escape($last_name);
	$username 		= escape($username);
	$email 			= escape($email);
	$password 		= escape($password);



	if(email_exists($email)){

		return false;

	} else if (username_exists($username)){

		return false;

	} else {

		$password = password_hash($password,PASSWORD_BCRYPT);

		$validation_code = md5($username . microtime());

		$sql = "INSERT INTO users(first_name, last_name, username, email, password, validation_code, active)";
		$sql.= " VALUES('$first_name','$last_name','$username','$email','$password','$validation_code', 0)";
		$result = query($sql);
		

		$subject = "Activate Account";
		$msg = " Please Click The Link Below To Activate Your Account,
			<a href='http://www.fomadel.selimbaccouche.com/activate.php?email=$email&code=$validation_code'>
				Click the link =).
			</a>
		   ";
		$header = "From: noreply@yourwebsite.com";

		send_email($email, $subject, $msg, $headers);

		return true;
	}
}


// Function Activate
	

function activate_user(){

	if($_SERVER['REQUEST_METHOD'] == 'GET'){

		if(isset($_GET['email'])){
			echo $email = clean($_GET['email']);
			echo $validation_code = clean($_GET['code']);

			$sql = "SELECT id FROM users WHERE email = '".escape($_GET['email'])."' AND 
			validation_code = '".escape($_GET['code'])."' ";
			$result = query($sql);
			

			if(row_count($result) == 1){
				
				$sql2 = "UPDATE users SET active = 1, validation_code = 0 WHERE email ='".escape($email)."'
				AND validation_code = '".escape($validation_code)."' ";
				$result2 = query($sql2);
				confirm($result2);

				set_message("<p class='bg-success'>Your Account has been activate please login</p>");

				redirect("login.php");		
			} else {
				set_message("<p class='bg-danger'>Sorry Your Account could not be activated </p>");

				redirect("login.php");		
			}



		}
	}
} // end of function


// function validate user login 

function validate_user_login(){

	$errors = [];

	$min = 3;
	$max = 20;

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$email 			= clean($_POST['email']);
		$password 		= clean($_POST['password']);
		$remember		= isset($_POST['remember']);




		if(empty($email)){
			$errors[] = "Email field cannot be empty";
		}
		if(empty($password)){
			$errors[] = "Password field cannot be empty";
		}

		if(!empty($errors)){
			foreach ($errors as $error){
				
			echo validation_errors($error);
				//ERROR DISPLAY
			} 
		}else{

			if(login_user($email, $password,  $remember)){

				redirect("admin.php");
			} else{
				echo validation_errors("Your credentials are not correct");
			}
		}


	}
}// end of function



// function User login 

function login_user($email, $password, $remember){

	$sql = "SELECT password, id FROM users WHERE email = '".escape($email)."' AND active = 1";

	$result = query($sql);

	if (row_count($result) == 1){

		$row = fetch_array($result);

		$db_password = $row['password'];



		if(password_verify($password, $db_password)){

			if($remember == "on"){

				setcookie('email', $email, time() . 86400);
			}

			$_SESSION['email'] = $email;


			return true;
		} else{

			return false;
		}


		return true;
	} else{

		return false;
	}

} // end of function 


// function logged in

function logged_in(){
	if(isset($_SESSION['email']) || isset($_COOKIE['email'])){

		return true;
	} else{

		return false;
	}
}// end of function 


// function recovered Password

function recover_password(){
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(isset($_SESSION['token'])){
			
			$email = clean($_POST['email']);

			if(email_exists($email)){

				$validation_code = md5($email . microtime());

				setcookie('temp_access_code', $validation_code, time() + 900);

				$sql = "UPDATE users SET validation_code = '".escape($validation_code)."' WHERE email = 
				'".escape($email)."'";
				$result = query($sql);
				confirm($result);
				
				$subject = "Please reset your password";
				$msg = "<h2>Here is your password reset, click the link below or paste in your browser</h2>

				<h1>{$validation_code}</h1>
				
				<a href='http://localhost:30/fomadel_site3/code.php?email={$email}&code={$validation_code}'> 

				Click the link below

				http://localhost:30/fomadel_site3/code.php?email={$email}&code={$validation_code}



				</a>

				";
				$headers = "From: noreply@fomadel.com";

				send_email($email, $subject, $msg, $headers);

				set_message("<p class='bg-success text-center'>Please check your spam/email for a password reset code</p>");

				redirect("index.php");
			} else{

				echo validation_errors("This email does not exist");

			}
		} else{

			redirect("index.php");

		} // token check
		if(isset($_POST['cancel-submit'])){

			// redirect("login.php");
			echo validation_errors("Not working");

		}
	} else{
		
	}
}// end of function 


// code validation

function validation_code(){

	if(isset($_COOKIE['temp_access_code'])){
		
		if(!isset($_GET['email']) && !isset($_GET['code'])){

			redirect("index.php");

		} else if(empty($_GET['email']) || empty($_GET['code'])){

			redirect("index.php");

		} else {

			if(isset($_POST['code'])){
				
				$email = clean($_GET['email']);

				$validation_code = clean($_POST['code']);

				$sql = "SELECT id FROM users WHERE validation_code= '".escape($validation_code)."'
						AND email = '".escape($email)."'";
				$result = query($sql);

				if(row_count($result) == 1){

					setcookie('temp_access_code', $validation_code, time() . 300);

					redirect("reset.php?email=$email&code=$validation_code");

				}else{
					echo validation_errors("Sorry wrong validation code");
				}
			}
		}
	}else {

		redirect("recover.php");

		set_message("<p class='bg-danger text-center'>Sorry your validation is expire</p>");
	}
}//end of the function

// function password reset

function password_reset(){


	if(isset($_COOKIE['temp_access_code'])){

		if(isset($_GET['email']) && isset($_GET['code'])){

			if(isset($_SESSION['token']) && isset($_POST['token'])){

				if($_POST['token']){

					if($_POST['password'] === $_POST['confirm_password']){


						$updated_password = password_hash($_POST['password'],PASSWORD_BCRYPT);


						$sql = "UPDATE users SET password = '".escape($updated_password)."', validation_code = 0, active=1 WHERE email = '".escape($_GET['email'])."' ";
						query($sql);

						set_message("<p class='bg-success text-center'> Your password has been updated, please log in</p>");
						redirect("login.php");

					} else {
						echo validation_errors("Password fields don't match");
					}
				} 
	 
			}
	
		}
	} else{
		
		set_message("<p class='bg-danger text-center'> Sorry your time as expired</p>");

		redirect("recover.php");
	}
} // end of the function



//contacter nous

function isEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
function isPhone($phone) {
        return preg_match("/^[0-9 ]*$/",$phone);
    }


function contact_us(){


  $array = array("firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "", "firstnameError" => "", "nameError" => "", "emailError" => "", "phoneError" => "", "messageError" => "", "isSuccess" => false);
    $emailTo = "selim.baccouche@gmail.com";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $array["firstname"] = $_POST["firstname"];
        $array["name"] = $_POST["name"];
        $array["email"] = $_POST["email"];
        $array["phone"] = $_POST["phone"];
        $array["message"] = $_POST["message"];
        $array["isSuccess"] = true; 
        $emailText = "";
        
        if (empty($array["firstname"]))
        {
            $array["firstnameError"] = "Votre Prenom";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Firstname: {$array['firstname']}\n";
        }

        if (empty($array["name"]))
        {
            $array["nameError"] = "Votre Nom";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Name: {$array['name']}\n";
        }

        if(!isEmail($array["email"])) 
        {
            $array["emailError"] = "Mettez un mail conforme";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Email: {$array['email']}\n";
        }

        if (!isPhone($array["phone"]))
        {
            $array["phoneError"] = "Que des chiffre";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Phone: {$array['phone']}\n";
        }

        if (empty($array["message"]))
        {
            $array["messageError"] = "Quelle est votre message";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Message: {$array['message']}\n";
        }
        
        if($array["isSuccess"]) 
        {
            $headers = "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            mail($emailTo, "Un message de votre site", $emailText, $headers);
        }
                
    }


}// end of the function

 ?>