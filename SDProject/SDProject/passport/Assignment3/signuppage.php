<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();

$first_name = "" ;
$last_name = "";
$student_id = "";
$email = "";
$password1 = "";
$password2 = "";
$error="";
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Assignment</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link type="text/css" rel="stylesheet" href="css/signuppage.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		
	
		
	</head>
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			if (isset($_POST['register'])) { //user registering
			 
				require 'register.php';
				
			}
		}
		?>
	<body>


			<!-- Modal content-->
				<div class="loginBackground">
					
					<div class="container logmod">
						<div class="row">
							<div class="col-lg-7">
								<div class="logoback">
									<a href="home.php">
									<img class="logo" src="images/MR.png">
									</a>
								</div>
								<br>
								<h1 class="head1">Register Yourself</h1>
								<br>
								<h2 class="head2">For Your Own Profile</h2>
							</div>
							<div class="col-lg-5 logback2">
							<div class="container">
								<?php echo $error; ?>
								<form  class="signUpContainer" method="POST" autocomplete="off"id="formlogin">
									<div class="row">
										<div class="input-group ch" style="margin-left:30px;margin-top:40px;">
									
											<input type="text" name="firstname" placeholder="First Name" class="form-control" value="<?php echo $first_name; ?>" />
											<input type="text" name="lastname" placeholder="Last Name" class="form-control" value="<?php echo $last_name; ?>" />
										</div>
									</div>
									<br>
									<div class="row">
										<div class="input-group">
											<span class="input-group-addon" style="color:white;"><i class="fa fa-key"></i></span>
											<input style="margin-left:15px;"id="studentid" type="text" class="form-control" value="<?php echo $student_id; ?>" name="studentid" placeholder="ID (**.**.**.***)"/>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="input-group">
											<span class="input-group-addon" style="color:white;"><i class="fa fa-envelope"></i></span>
											<input style="margin-left:15px;"id="email" type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>"/>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="input-group">
											<span class="input-group-addon" style="color:white;"><i class="fa fa-lock"></i></span>
											<input style="margin-left:20px;"id="password1" type="password" class="form-control" name="password1" placeholder="Password" value=""/>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="input-group">
											<span class="input-group-addon" style="color:white;"><i class="fa fa-lock"></i></span>
											<input style="margin-left:20px;"id="password2" type="password" class="form-control" name="password2" placeholder="Confirm Password"value=""/>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-3"></div>
										<div class="col-6">
											<button type="submit" class="btn btn-primary btn-block" name="register">Sign Up</button>
											<br>
										</div>
										<div class="col-3"></div>
									</div>
									<div class="row">
									
											<h6 class="already">Already have an account?</h6>
									</div>
									<div class="row">
										<div class="col-3"></div>
										<div class="col-6 mar" ">
										
											
											<a href="loginpage.php" class="btn btn-info btn-block loginbutton" style="margin-bottom:20px;" role="button">Login</a>
											<br>
										</div>
									
										
									</div>
								</form>
							</div>	
							</div>
							</div>
</div>
							</div>							
							
				</div>
			
			
		<script src="js/jquery.min.js"></script>
		
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
	
		
		
	</body>
</html>
	