<!DOCTYPE html>

<html>
	<head>
		<title>Assignment</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link type="text/css" rel="stylesheet" href="css/check.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		
	
		
	</head>
	<body>
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#registration">Open Modal</button>
		<div id="registration" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="signUp">Sign Up</div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="logSignBackground">
          <div class="container">
          	<!--<div class="col-md-3"></div>-->
          		<!--<div class="col-md-6">-->
          		<form action="/action_page.php" class="signUpContainer">

          			<div class="row">

          				<div class="col-md-3">
          					<div class="form-group">
          					  <input type="singUpFirstName" class="form-control" id="signUpFirstName" placeholder="FirstName" name="email">
          					</div>
          				</div>
          				<div class="col-md-3">
          					<div class="form-group">

          					  <input type="signUpLastName" class="form-control" id="signUpLastName" placeholder="LastName" name="email">
          					</div>
          				</div>
                    <div class="col-md-3"></div>
                      <div class="col-md-3"></div>
          			</div>


                <div class="row">
                  <div class="col-md-6">
          			<div class="input-group">

          				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          				<input id="signUpUserName" type="text" class="form-control" name="signUpUserName" placeholder="Username">
          			</div>
                	</div>
                  <div class="col-md-6"></div>



                </div>
          			<br>
                 <div class="row">
                     <div class="col-md-6">
          			<div class="input-group">
          				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          				<input id="email" type="text" class="form-control" name="email" placeholder="Email">
          			</div>
                </div>
                  <div class="col-md-6"></div>
                </div>
          			<br>

                <div class="row">
                  <div class="col-md-6">
          			<div class="input-group">
          				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          				<input id="signUpPassword" type="text" class="form-control" name="signUpPassword" placeholder="Password">
          			</div>
                </div>
                  <div class="col-md-6"></div>
                </div>
                   		<br>
          			<div class="row">
                  <div class="col-md-1"></div>

                              <div class="col-md-3">
          			<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          			<br>
          			<div class="textCen textInLogSign">Already have account?
                  	<a href="login.html"role="button" class="btn btn-info">Log in</a></button></div>
                    </div>
                    <div class="col-md-4"></div>
                      <div class="col-md-4"></div>
                </div>
          		</form>

              <!--</div>-->
          	<!--<div class="col-md-3"></div>-->
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

