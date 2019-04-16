<?php
	  require 'db.php';
	  $id = $_GET['id'];
	  // do some validation here to ensure id is safe

	  
	  $result = $mysqli->query("SELECT * FROM StudentInfo WHERE id='$id'") or die($mysqli->error);
	  $user = $result->fetch_assoc();
	  

	
	 
	  echo '<img src="data:image/jpeg;base64,'.base64_encode( $user['image'] ).'"/>';
?>