<?php

$error = '';
$lastname = '';
$firstname = '';
$email = '';
$phone = '';
$message = '';
$check=0;

function textinput($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{
	if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["phone"]) ||empty($_POST["message"])){
		$error .= '<p><label class="text-danger">All The Fields Are Required</label></p>';
		
	}
	else{
		$firstname = textinput($_POST["firstname"]);
		$lastname = textinput($_POST["lastname"]);
		if(!preg_match('/^[a-z ]+$/',$firstname)||!preg_match('/^[a-z ]+$/',$lastname))
		{
			$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
		}
		
		
		$email = textinput($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error .= '<p><label class="text-danger">Invalid email format</label></p>';
			
		}
		$phone = textinput($_POST["phone"]);
		if(!preg_match('/^[0-9]{11}+$/', $phone)){
			$error .= '<p><label class="text-danger">Not a valid phone number</label></p>';
		}
		$message = textinput($_POST["message"]);
	
	if($error == '')
	{
		$file_open = fopen("contact.csv", "a");
		$no_rows = count(file("contact.csv"));
		if($no_rows > 1)
		{
			$no_rows = $no_rows;
		}
		$data = array(
			0 =>	$no_rows,
			1 =>	$firstname,
			2 =>    $lastname,
			3 =>	$email,
			4 =>	$phone,
			5 =>	$message
		);
		fputcsv($file_open, $data);
		$error = '<label class="text-success">Thank you for contacting us</label>';
		$firstname = '';
		$lastname = '';
		$email = '';
		$phone = '';
		$message = '';
	}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Assignment</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link type="text/css" rel="stylesheet" href="css/contact.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
	</head>
	<body>
		<?php
			include 'header.php';
		?>
		<br>
		<div class="container">
			<div class="row">
				<div class= "col-md-12">
					<h4> Home / Contacts </h4>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				
				<div class= "col-md-12">
					<hr>
				</div>
				
			</div>
			<br>
			<div class="row">
				<div class= "col-md-2">
				
				</div>
				<div class= "col-md-8">
					<h2> CONTACT LIST </h2>
				</div>
				<div class= "col-md-2">
					
				</div>
			</div>
		</div>
		<br><br>
		
		<div class="container">
			<div class="row" >
				<div class= "col-md-2">
				
				</div>
				<div class= "col-md-8 conrow"style="">
					<div>
					<h5 style="float:left;">General Enquiries <h5>
					<h5 style="float:left;margin-left:80px;"> +88 3 9862 9214 <h5>
					<br>
					<h5 class="gmail"style=""> mrsupport@gmail.com <h5>
					</div>
					<div>
					
					</div>
				</div>
				
			</div>
			<div class="row" >
				<div class= "col-md-2">
				
				</div>
				<div class= "col-md-8 conrow"style="background-color:#E1E4E6;height:80px;">
					<div>
					<h5 style="float:left;">Principal's Office <h5>
					<h5 style="float:left;margin-left:90px;"> +88 3 9862 9202 <h5>
					
					</div>
					<div>
					
					</div>
				</div>
				
			</div>
			
			<div class="row" >
				<div class= "col-md-2">
				
				</div>
				<div class= "col-md-8"style="height:80px;">
					<div>
					<h5 style="float:left;">Addmission Office <h5>
					<h5 style="float:left;margin-left:75px;"> +88 3 9862 9200 <h5>
					</div>
					<div>
					
					</div>
				</div>
				
			</div>
			<div class="row" >
				<div class= "col-md-2">
				
				</div>
				<div class= "col-md-8 conrow"style="background-color:#E1E4E6;">
					<div>
					<h5 style="float:left;">Student Councilor <h5>
					<h5 style="float:left;margin-left:80px;"> +88 3 9862 9283 <h5>
					<br>
					<h5 class="gmail"style=""> support@gmail.com <h5>
					</div>
					<div>
					
					</div>
				</div>
				
			</div>
			</div>
			<br>
			<br>
			<div class="container">
			<div class="row">
				
				<div class= "col-md-12">
					<hr>
				</div>
				
			</div>
			<br>
			<div class="row">
				<div class= "col-md-2">
				
				</div>
				<div class= "col-md-8">
					<h2> OUR LOCATION </h2>
				</div>
				<div class= "col-md-2">
					
				</div>
			</div>
			</div>
			<br><br>
			<div class="container">
				<div class="row">
					<div class= "col-md-2">
					
					</div>
					<div class= "col-md-5">
						<div class="mapouter">
							<div class="gmap_canvas">
								<iframe class="frame" id="gmap_canvas" src="https://maps.google.com/maps?q=24%C2%B031'49.8%22N%2092%C2%B001'58.4%22E&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
								</iframe>
								<a href="https://www.maps-erstellen.de">maps-erstellen.de
								</a>
							</div>
							<style>.mapouter{text-align:right;height:300px;width:400px;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:400px;}
							</style>
							
						</div>
					</div>
					<div class="col-md-3" style="margin-top:50px;">
						<h4>Rainbow villa</h4>
						<h6>128,Sadekpur Road,<br>Kulaura,Sylhet,Bangladesh</h6>
						<h4 style="margin-top:30px;">Crimpson House</h4>
						<h6>140,Sadekpur Road,<br>Kulaura,Sylhet,Bangladesh</h6>
					</div>
				
				</div>
			
			</div>
		<br><br>
		<div>
		<div class="container">
			<div class="row">
				
				<div class= "col-md-12">
					<hr>
				</div>
				
			</div>
			<br>
			<div class="row">
				<div class= "col-md-2">
				
				</div>
				<div class= "col-md-8">
					<h2> Send Us A Message </h2>
				</div>
				<div class= "col-md-2">
					
				</div>
			</div>
			</div>
		<div class="container">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
					<div class="thumbnail">
						<form method="post">
							<?php echo $error; ?>
							<div class="ch1">
								<h6>Enter Your Name</h6>
							</div>
							<div class="input-group ch">
								
								<input type="text" name="firstname" placeholder="First Name" class="form-control" value="<?php echo $firstname; ?>" />
								<input type="text" name="lastname" placeholder="Last Name" class="form-control" value="<?php echo $lastname; ?>" />
							</div>

							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control" placeholder="Eg. example.email.com" value="<?php echo $email; ?>" />
							</div>
							<div class="form-group">
								<label>Phone No</label>
								<input type="text" name="phone" class="form-control" placeholder="Eg. 01XXXXXXXXX" value="<?php echo $phone; ?>" />
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea name="message" class="form-control textarearesize" placeholder="Write your Message"><?php echo $message; ?></textarea>
							</div>
							<div class="form-group" align="center">
								<input type="submit" name="submit" class="btn btn-info" value="Send Message" />
							</div>
						</form>
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
