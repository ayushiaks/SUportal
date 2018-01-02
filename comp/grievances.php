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
	isset($_POST['gr'])&&
	isset($_POST['gr_others'])&&
	isset($_POST['message']))
{
	$name = $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$phno = $_POST['phno'];
	$rmno = $_POST['rmno'];
	$gr = $_POST['gr'];
	$gr_others = $_POST['gr_others'];
	$message = $_POST['message'];


	if(!empty($name) &&
	   !empty($id) &&
	   !empty($email) &&
	   !empty($phno)&&
	   !empty($rmno)&&
	   !empty($gr)&&
	   !empty($message)) 	
	{
		if($gr == 'Other' && empty($gr_others))
		{
			$error1 = "Please fill in the details of others";
		}
		else
		{
			$query = "INSERT INTO `cng`.`grievance_records` VALUES ('','".mysqli_real_escape_string($var,$name)."',
												        '".mysqli_real_escape_string($var,$id)."',
												        '".mysqli_real_escape_string($var,$email)."',
												        '".mysqli_real_escape_string($var,$phno)."',
												        '".mysqli_real_escape_string($var,$rmno)."',
												        '".mysqli_real_escape_string($var,$gr)."',
												        '".mysqli_real_escape_string($var,$gr_others)."',
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
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				$("#gr_others").hide();

				$( "#gr_choice_3" ).change(function() {
	  				var val = $("#gr_choice_3").val();
					if(val=="Other"){
					    $("#gr_others").show();
					} else {
					    $("#gr_others").hide();
					}
					});
			});
		</script>
		<link rel="stylesheet" href="../css/grievances.css" />
	</head>
	<body class="#b3e5fc light-blue lighten-4">
		<div class="row">	
			<form class="form" action="grievances.php" method="POST" enctype="multipart/form-data">
				<h4>Greivance Form</h4>
				<div class="row">
					<div class="input-field col s10">
						<input data-error="wrong" data-success="right" placeholder="Name" type="hidden" name="name">
					</div>
					<div class="input-field col s12">	
						<input data-error="wrong" data-success="right" placeholder="email" type="hidden" name="email">
					</div>
					<div class="input-field col s12">	
						<input data-error="wrong" data-success="right" placeholder="ID Number" type="text" name="id">
					</div>
					<div class="input-field col s12">	
						<input data-error="wrong" data-success="right" placeholder="Phone Number" type="text" name="phno">
					</div>	
					<div class="input-field col s12">	
						<input data-error="wrong" data-success="right" placeholder="Room Number" type="text" name="rmno">
					</div>
					<div class="input-field col s12" style="padding-left:0; font-size:17.5px;">Grievance On :</div>  
							<p><div class="choice"><input type="radio" class="with-gap" id="gr_choice_1" name="gr" value="EC"><label for="gr_choice_1">EC</label><br></div></p>
							<p><div class="choice"><input type="radio" class="with-gap" id="gr_choice_2" name="gr" value="CRC"><label for="gr_choice_2">CRC</label><br></div></p>
							<p><div class="choice"><input type="radio" class="with-gap" id="gr_choice_3" name="gr" value="Other"><label for="gr_choice_3">Others</label><br></div></p>
							<input type="text" placeholder="Please Specify" name="gr_others" id="gr_others"><br>
					
					<div class="input-field col s12">		
						<textarea placeholder="Grievance" class="materialize-textarea" name="message" placeholder="Type Your Message Here" rows="6" cols="40"></textarea>
					</div>
						<div><input class="z-depth-4" id="button" type="submit" name="submit" value="Submit"></div>		
						<p style="margin:1%; text-align:center; color:red; font-size: 20px;"><?php echo $error1.$error2.$msg; ?></p>
			</form>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>	
	</body>
</html>