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
</head>
<body>
	<div class="row">
		<form class="form" action="comp.php" method="POST" enctype="multipart/form-data">
			<h4>Register Complaint</h4>
			<input type="hidden" name="name" value="<?php echo $name;?>" required>
			<input placeholder="ID" type="text" name="id" required>
			<input type="hidden" name="email" value="<?php echo $email;?>" required>
			<input placeholder="Phone Number" type="text" name="phno" required>
			<input placeholder="Room Number" type="text" name="rmno" required>

			<input placeholder="Complaint On" type="text" name="compon" required>

			<p><textarea name="message" placeholder="Type Your Complaint Here"></textarea></p>

			<input class="submit" type="submit" name="submit" value="Submit">
			<input class="submit co_anonymous" type="submit" value="Fill Anonymously">
			<p><?php echo $error1.$error2.$msg; ?></p>

		</form>
	</div>


</body>



</html>
