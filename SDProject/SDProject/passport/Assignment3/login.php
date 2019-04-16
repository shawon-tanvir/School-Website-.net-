<?php
$error='';
function textinput2($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email =textinput2($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
$user = $result->fetch_assoc();
if ( $result->num_rows == 0 ){ // User doesn't exist
    $error .= '<p><label class="text-danger prey">User with that email does not exist!</label></p>';
	
}
else if($user['active']==0)
{
	$error .= '<p><label class="text-danger prey">Your account is not varified by your email account. Please verify your account!</label></p>';
        
}
else { // User exists
    

    if ( password_verify($_POST['signUpPassword'], $user['password']) ) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

		header("location: profile.php");
    }
    else {
		$error .= '<p><label class="text-danger prey">You have entered wrong password, try again!</label></p>';
        
    }
}

