<?php
include("../common.php");
$error1 ="";
$error2 = "";
$msg = "";

$var = mysqli_connect("localhost", "root", "");
if(isset($_POST['name']) &&
	isset($_POST['id']) &&
	isset($_POST['email']) &&
	isset($_POST['phno'])&&
	isset($_POST['rmno'])&&
	isset($_POST['message']))
{
	$name = $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$phno = $_POST['phno'];
	$rmno = $_POST['rmno'];
	$message = $_POST['message'];


	if(!empty($name) &&
	   !empty($id) &&
	   !empty($email) &&
	   !empty($phno)&&
	   !empty($rmno)&&
	   !empty($message)) 	
	{
		$query = "INSERT INTO `cng`.`complaint_records` VALUES ('','".mysqli_real_escape_string($var,$name)."',
												        '".mysqli_real_escape_string($var,$id)."',
												        '".mysqli_real_escape_string($var,$email)."',
												        '".mysqli_real_escape_string($var,$phno)."',
												        '".mysqli_real_escape_string($var,$rmno)."',
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
	</head>
	<body>
		<form class="form" action="comp.php" method="POST" enctype="multipart/form-data">
			NAME : <input type="text" name="name"><br>
			ID No. : <input type="text" name="id"><br>
			Bits Email ID : <input type="text" name="email"><br>
			Phone Number : <input type="text" name="phno"><br>
			Room Number : <input type="text" name="rmno"><br>
				<input type="text" name="gr_others" id="gr_others"><br>
			Complaint :<br> <textarea id="message" name="message" placeholder="Type Your Message Here" rows="6" cols="40"></textarea>
			<input class="fomr" type="submit" name="submit" value="Submit">	
			<p><?php echo $error1.$error2.$msg; ?></p>
		</form>
	</body>
</html>