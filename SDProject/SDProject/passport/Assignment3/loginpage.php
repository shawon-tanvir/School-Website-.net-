<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
$error='';
$email='';
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Assignment</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link type="text/css" rel="stylesheet" href="css/loginpage.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		
	
		
	</head>
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			if (isset($_POST['login'])) { //user registering
			 
				require 'login.php';
				
			}
		}
	?>
	<body>
		


				<div class="loginBackground">
					
							
							<div class="logback2">
						
								<br><br>
									
									
										<div class="container">
											<div class="logoback">
												<a href="home.php">
												<img class="logo" src="images/MR.png">
												</a>
											</div>
											<br>
											<div class="errordiv" style="">
											<?php echo $error; ?>
											</div>
											<form class="signUpContainer" method="post" autocomplete="off">
												
												<div class="row">
													<div class="input-group">
														<span class="input-group-addon" style="color:white;"><i class="fa fa-user"></i></span>
														<input style="margin-left:20px;"id="signUpUserName" type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>"/>
													</div>
												</div>
												<br>
												
												<div class="row">
													<div class="input-group">
														<span class="input-group-addon" style="color:white;"><i class="fa fa-lock"></i></span>
														<input style="margin-left:20px;"id="signUpPassword" type="password" class="form-control" name="signUpPassword" placeholder="Password"/>
													</div>
												</div>
												<br>
												<br>
												<div class="row">
													<div class="col-3"></div>
													<div class="col-6">
														<button type="submit" class="btn btn-primary btn-block "name="login">Log In</button>
														<br>
													</div>
													<div class="col-3"></div>
												</div>
												
												<div class="row">
												
														<h6 class="already2">New User?</h6>
												</div>
												<div class="row">
													<div class="col-3"></div>
													<div class="col-6 mar" ">
														
														<a href="signuppage.php" class="btn btn-info btn-block signupbutton" role="button">Sign Up</a>
														<br>
													</div>
													<div class="col-3"></div>
													
												</div>
											</form>
										</div>
									
								
							</div>
							
				</div>
			
			
		<script src="js/jquery.min.js"></script>
		
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
	
		
		
	</body>
</html>
	