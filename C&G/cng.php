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
		<link rel="stylesheet" href="../css/style.css" />
	</head>
	<body>
		<div id="wrapper" class="form-con">
			<h2 id="cng-head">Contact and Grievances</h2>
			<p>
				Please fill the following form to reach out to us.
			</p>
			<div class="formmm"
			<form class="form" action="cng.php" method="POST" enctype="multipart/form-data">
				<label>Name :</label> <input type="text" name="name"><br>
				<label>ID No. :</label> <input type="text" name="id"><br>
				<label>BITS Email ID :</label> <input type="text" name="email"><br>
				<label>Phone Number :</label> <input type="text" name="phno"><br>
				<label>Room Number :</label> <input type="text" name="rmno"><br>
				<label>Grievance ON :</label><br>
					<input type="radio" id="gr_choice_1" name="gr" value="EC"><label for="gr_choice_1">EC</label><br>
					<input type="radio" id="gr_choice_2" name="gr" value="CRC"><label for="gr_choice_2">CRC</label><br>
					<input type="radio" id="gr_choice_3" name="gr" value="Other"><label for="gr_choice_3">Others (Please Specify)</label><br>
					<input type="text" name="gr_others" id="gr_others"><br>
				<label>Grievance :</label><br> <textarea id="message" name="message" placeholder="Type Your Message Here" rows="6" cols="40"></textarea>
				<input class="fomr submit" type="submit" name="submit" value="Submit">
				<p><?php echo $error1.$error2.$msg; ?></p>
			</form>
		</div>

	</body>
</html>
