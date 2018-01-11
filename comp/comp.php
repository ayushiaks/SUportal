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
			sleep(2);
			header("Location: ../land.php");
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
	<link rel="stylesheet" href="../css/complaints.css" />
	<script>
	$(document).ready(function(){


		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks on the button, open the modal
		btn.onclick = function()
		{
			modal.style.display = "block";

		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function()
		{
			modal.style.display = "none";
		}
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event)
		{
			if (event.target == modal)
			{
				modal.style.display = "none";
			}
		}
	});
	</script>
</head>
<body>
	<div class="row">
		<form id="form" class="z-depth-3" action="comp/comp.php" method="POST" enctype="multipart/form-data">
			<h4>Register Complaint</h4>
			<div class="cng-form">

				<input type="hidden" name="name" value="<?php echo $name;?>" required>

				<input placeholder="ID" type="text" name="id" required>

				<input type="hidden" name="email" value="<?php echo $email;?>" required>

				<input placeholder="Phone Number" type="text" name="phno" required>

				<input placeholder="Room Number" type="text" name="rmno" required></br>

				<input placeholder="Complaint On" type="text" name="compon" required></br>

				<textarea name="message"  class="materialize-textarea" placeholder="Type Your Complaint Here"></textarea>
				<br><br><br><br><br>
			</div>
			<div><button id="myBtn"><input id="remove" class="submit" type="submit" name="submit" value="Submit"></button>
				<input type="submit" class=" submitco_anonymous" value="Fill Anonymously"></div>
				<p><?php echo $error1.$error2.$msg; ?></p>

				<!-- The Modal -->
				<div id="myModal" class="modal">

					<!-- Modal content -->
					<div class="modal-content">
						<span class="close">&times;</span>
						<p style="text-align:center; font-size:20px;"><br><br>Your complaint has been submitted sucessfully.<br><br></p>
					</div>
				</div>

		</form>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
</html>
