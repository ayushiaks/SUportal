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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="../css/complaints.css" />
	</head>
	<body>
		<div class="wrapper">
			<form class="form" action="comp.php" method="POST" enctype="multipart/form-data">
				NAME : <input type="text" name="name"><br>
				ID No. : <input type="text" name="id"><br>
				Bits Email ID : <input type="text" name="email"><br>
				Phone Number : <input type="text" name="phno"><br>
				Room Number : <input type="text" name="rmno"><br>
				Complaint Against : <input type="text" name="compon"><br>
				Complaint :<br> <textarea id="message" name="message" placeholder="Type Your Message Here" rows="6" cols="40"></textarea>
				<input class="fomr" type="submit" name="submit" value="Submit">	
				<p><?php echo $error1.$error2.$msg; ?></p>
			</form>
		</div>	
	</body>
</html>