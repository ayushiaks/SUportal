<?php

$error1 ="";
$error2 = "";
$msg = "";

$var = mysqli_connect("localhost", "root", "");
if(isset($_POST['name']) &&
	isset($_POST['id']) &&
	isset($_POST['email']) &&
	isset($_POST['phno'])&&
	isset($_POST['rmno'])&&
	isset($_POST['compon'])&&
	isset($_POST['message']))
{
	$name = $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$phno = $_POST['phno'];
	$rmno = $_POST['rmno'];
	$message = $_POST['message'];
	$compon = $_POST['compon'];

	if(!empty($name) &&
	   !empty($id) &&
	   !empty($email) &&
	   !empty($phno)&&
	   !empty($rmno)&&
	   !empty($compon)&&
	   !empty($message)) 	
	{
		$query = "INSERT INTO `cng`.`complaint_records` VALUES ('','".mysqli_real_escape_string($var,$name)."',
												        '".mysqli_real_escape_string($var,$id)."',
												        '".mysqli_real_escape_string($var,$email)."',
												        '".mysqli_real_escape_string($var,$phno)."',
												        '".mysqli_real_escape_string($var,$rmno)."',
												        '".mysqli_real_escape_string($var,$compon)."',
												        '".mysqli_real_escape_string($var,$message)."')";
			
		if($query_run = mysqli_query($var,$query))
		{
			$msg = "Your from has been submitted";
		}
		else
		{
			die(mysqli_error($var));
		}
			
	}
	else{
		$error2 = "Fill in all the fields";
	}
}
	
?>

<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    	<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="../css/complaints.css" />
	</head>
	<body class="#42a5f5">
		<div class="row">
			<form id="form" class="col s12 #e3f2fd blue lighten-5 z-depth-3" action="comp.php" method="POST" enctype="multipart/form-data">
			<h4>Register Complaint</h4>
				<div class="div">
					<div class="input-field col s12">
						<input placeholder="Name" type="hidden" name="name">
					</div>
					<div class="input-field col s12">	
						<input placeholder="ID" type="text" name="id">
					</div>
					<div class="input-field col s12">	
						<input placeholder="Email" type="hidden" name="email">
					</div>
					<div class="input-field col s12">	
						<input placeholder="Phone Number" type="text" name="phno">
					</div>
					<div class="input-field col s12">	
						<input placeholder="Room Number" type="text" name="rmno">
					</div>
					<div class="input-field col s12">
						<input placeholder="Complaint On" type="text" name="compon">
					</div>
					<div class="input-field col s12">	
						<textarea class="materialize-textarea" name="message" placeholder="Type Your Complaint Here"></textarea>
					</div>	
						<div ><input class="z-depth-4 button" type="submit" name="submit" value="Submit"><a  style="margin-left:35%; font-size:20px;" class="z-depth-4 button co_anonymous">Fill Anonymously</a></div>	
						<p style="margin:1%; text-align:center; color:red; font-size: 20px;"><?php echo $error1.$error2.$msg; ?></p>
				</div>		
			</form>
		</div>	

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>