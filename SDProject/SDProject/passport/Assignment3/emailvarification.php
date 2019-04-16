<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Assignment</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link type="text/css" rel="stylesheet" href="css/emailvarification.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
	</head>
	<body>
		<?php
			include 'header.php';
		?>
		<div class="emailcheckback">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
					
					</div>
					
					<div class="col-md-6 check">
						<?php
				     		if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
								echo $_SESSION['message']; 
								$_SESSION['message']="";
							
							endif;
							
						?>
						
						
					</div>
					
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
					
					</div>
					<div class="col-md-4 check" style="float:right;">
						<h4 style=" display: inline-block;margin-right:20px;">Go For </h4>
						<a href="loginpage.php" class="btn btn-info btn-lg signupbutton" role="button">Log In</a>
						<br>
						<br>
					</div>
					<div class="col-md-4 check">
						<h4 style=" display: inline-block;margin-right:30px;">Go To </h4>
						<a href="home.php" class="btn btn-info btn-lg signupbutton" role="button">Home</a>
					</div>
					<div class="col-md-2">
					
					</div>
				</div>
			</div>
		</div>
		
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<?php
			include 'footer.php';
		?>
	</body>
</html>
