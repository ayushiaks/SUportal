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
	<body>
		<div class="wrapper">	
			<form class="form" action="cng.php" method="POST" enctype="multipart/form-data">
				Name : <input type="text" name="name"><br>
				ID No. : <input type="text" name="id"><br>
				Bits Email ID : <input type="text" name="email"><br>
				Phone Number : <input type="text" name="phno"><br>
				Room Number : <input type="text" name="rmno"><br>
				Grievance On :<br>  
					<div class="choice"><input type="radio" id="gr_choice_1" name="gr" value="EC"><label for="gr_choice_1">EC</label><br></div>
					<div class="choice"><input type="radio" id="gr_choice_2" name="gr" value="CRC"><label for="gr_choice_2">CRC</label><br></div>
					<div class="choice"><input type="radio" id="gr_choice_3" name="gr" value="Other"><label for="gr_choice_3">Others (Please Specify)</label><br></div>
					<input type="text" name="gr_others" id="gr_others"><br>
				Grievance :<br> <textarea id="message" name="message" placeholder="Type Your Message Here" rows="6" cols="40"></textarea>
				<input class="fomr" type="submit" name="submit" value="Submit">	
				<p><?php echo $error1.$error2.$msg; ?></p>
			</form>
		</div>	
	</body>
</html>