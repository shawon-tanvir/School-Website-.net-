<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
 
function textinput($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}
// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$first_name = textinput($_POST['firstname']);
$last_name = textinput($_POST['lastname']);
$student_id = textinput($_POST['studentid']);
$email = textinput($_POST['email']);
$password1 = textinput(password_hash($_POST['password1'], PASSWORD_BCRYPT));
$password2 = textinput(password_hash($_POST['password2'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
    if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["studentid"]) || empty($_POST["email"]) || empty($_POST["password1"]) ||empty($_POST["password2"])){
		$error .=  '<p><label class="text-danger">All The Fields Are Required</label></p>';
	}
	else{
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$error .= '<p><label class="text-danger">Invalid email format</label></p>';
			
		}
		
		if(!preg_match('/^[0-9.]{12}+$/',$_POST['studentid'])){
			$error .= '<p><label class="text-danger">Not a valid ID number</label></p>';
		}
		// Check if user with that email already exists
		$result = $mysqli->query("SELECT * FROM users WHERE email='$email' OR id='$student_id'") or die($mysqli->error());

		// We know user email exists if the rows returned are more than 0
		if ( $result->num_rows > 0 ) {
    
			$error .= '<p><label class="text-danger">User with this email or id already exists!</label></p>';
			
		}
		else { // Email doesn't already exist in a database, proceed...
			if(!preg_match('/^[a-zA-Z ]+$/',$_POST['firstname'])||!preg_match('/^[a-zA-Z ]+$/',$_POST['lastname']))
			{
				$error .= '<p><label class="text-danger">Only letters and white space allowed for names</label></p>';
			}
			if($_POST['password1']!= $_POST['password2']){
				$error .= '<p><label class="text-danger">Password did not match.</label></p>';
			}
			
			if($error == ''){
	
	// active is 0 by DEFAULT (no need to include it here)
	
				
				$sql = "INSERT INTO users (first_name, last_name, id, email, password, hash) " 
						. "VALUES ('$first_name','$last_name','$student_id','$email','$password1', '$hash')";

				// Add user to the database
				if ( $mysqli->query($sql) ){

					$_SESSION['active'] = 0; //0 until user activates their account with verify.php
					$_SESSION['logged_in'] = true; // So we know the user has logged in
					$_SESSION['message'] .='<p><label class="text-danger">Confirmation link has been sent to '.$email.', please verify your account by clicking on the link in the message!</label></p>';
							
					

					// Send registration confirmation link (verify.php)
					$header = "From: shawontanvir950@gmail.com\r\n"; 
					$header.= "MIME-Version: 1.0\r\n"; 
					$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
					$header.= "X-Priority: 1\r\n";
					
					$to      = $email;
					$subject = 'Account Verification';
					$message_body = '
					Hello '.$first_name.',

					Thank you for signing up!

					Please click this link to activate your account:

					http://localhost/Assignment3/verify.php?email='.$email.'&hash='.$hash;  

					mail( $to, $subject, $message_body, $header );

					header("location: emailvarification.php");

				}
			}

   
}

}