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
	isset($_POST['gr_to'])&&
	isset($_POST['gr_to_others'])&&
	isset($_POST['message']))
{
	$name = $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$phno = $_POST['phno'];
	$rmno = $_POST['rmno'];
	$gr = $_POST['gr'];
	$gr_others = $_POST['gr_others'];
	$gr_to = $_POST['gr_to'];
	$gr_to_others = $_POST['gr_to_others'];
	$message = $_POST['message'];


	if(!empty($name) &&
	   !empty($email) &&
	   !empty($gr)&&
	   !empty($gr_to)&&
	   !empty($message)) 	
	{
		if(($gr == 'Other' && empty($gr_others)) || ($gr_to == 'Other' && empty($gr_to_others)))
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
												        '".mysqli_real_escape_string($var,$gr_to)."',
												        '".mysqli_real_escape_string($var,$gr_to_others)."',
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
				$("#gr_to_others").hide();

				$( "#gr_to_choice_3" ).change(function() {
	  				var val = $("#gr_to_choice_3").val();
					if(val=="Other"){
					    $("#gr_to_others").show();
					} else {
					    $("#gr_to_others").hide();
					}
					});
			});
		</script>
		<link rel="stylesheet" href="../css/grievances.css" />
	</head>
	<body class="#4db6ac teal lighten-2">
		<div class="row">	
			<form class="form #e0f2f1 teal lighten-5" action="gr_anonymus.php" method="POST" enctype="multipart/form-data">
				<h4>Greivance Form (Anonymous)</h4>
				<div class="div">
					<div class="input-field col s12">
						<input placeholder="Name" type="hidden" name="name" />
					</div>
					<div class="input-field col s12">	
						<input placeholder="email" type="hidden" name="email">
					</div>
					<div class="input-field col s12">	
						<input placeholder="ID Number" type="hidden" name="id">
					</div>
					<div class="input-field col s12">	
						<input placeholder="Phone Number" type="hidden" name="phno">
					</div>	
					<div class="input-field col s12">	
						<input placeholder="Room Number" type="hidden" name="rmno">
					</div>
					<div class="input-field col s12" style="padding:0; font-size:17.5px;">Grievance On :  </div>
							<p><div class="choice"><input type="radio" class="with-gap" id="gr_choice_1" name="gr" value="EC"><label for="gr_choice_1">EC</label><br></div></p>
							<p><div class="choice"><input type="radio" class="with-gap" id="gr_choice_2" name="gr" value="CRC"><label for="gr_choice_2">CRC</label><br></div></p>
							<p><div class="choice"><input type="radio" class="with-gap" id="gr_choice_4" name="gr" value="SU"><label for="gr_choice_4">SU</label><br></div></p>
							<p><div class="choice"><input type="radio" class="with-gap" id="gr_choice_3" name="gr" value="Other"><label for="gr_choice_3">Others</label><br></div></p>
							<input type="text" placeholder="Please Specify" name="gr_others" id="gr_others"><br>
					
					<div class="input-field col s12" style="padding-left:0; font-size:17.5px;">Submit Grievance to :</div>  
							<p><div class="choice_to"><input type="radio" class="with-gap" id="gr_to_choice_1" name="gr_to" value="EC"><label for="gr_to_choice_1">EC</label><br></div></p>
							<p><div class="choice_to"><input type="radio" class="with-gap" id="gr_to_choice_2" name="gr_to" value="CRC"><label for="gr_to_choice_2">CRC</label><br></div></p>
							<p><div class="choice_to"><input type="radio" class="with-gap" id="gr_to_choice_4" name="gr_to" value="SU"><label for="gr_to_choice_4">SU</label><br></div></p>
							<p><div class="choice_to"><input type="radio" class="with-gap" id="gr_to_choice_3" name="gr_to" value="Other"><label for="gr_to_choice_3">Others</label><br></div></p>
							<input type="text" placeholder="Please Specify" name="gr_to_others" id="gr_to_others"><br>		
					
					
					<div class="input-field col s12">		
						<textarea placeholder="Grievance" class="materialize-textarea" name="message" placeholder="Type Your Message Here" rows="6" cols="40"></textarea>
					</div>
						<div><input class="z-depth-4 button" type="submit" name="submit" value="Submit"></div>		
						<p style="margin:1%; text-align:center; color:red; font-size: 20px;"><?php echo $error1.$error2.$msg; ?></p>
				</div>		
			</form>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>	
	</body>
</html>