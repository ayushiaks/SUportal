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
	!empty($id) &&
	!empty($email) &&
	!empty($phno)&&
	!empty($rmno)&&
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
				sleep(2);
				header("Location: ../land.php");

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
		$("#gr_to_others").hide();

		$( "#gr_to_choice_3" ).change(function() {
			var val = $("#gr_to_choice_3").val();
			if(val=="Other"){
				$("#gr_to_others").show();
			} else {
				$("#gr_to_others").hide();
			}
		});

		$( "#gr_to_choice_3" ).change(function() {
			var val = $("#gr_to_choice_3").val();
			if(val=="Other"){
				$("#gr_to_others").show();
			} else {
				$("#gr_to_others").hide();
			}
		});



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
		<form class="form z-depth-3" action="comp/grievances.php" method="POST" enctype="multipart/form-data">
			<h3>Grievance Form </h3>
			<br>
			<div class="cng-form">

				<input type="hidden" name="name" value="<?php echo $name;?>" required/>

				<input type="hidden" name="email" value="<?php echo $email;?>" required>

				<input class="form-field" placeholder="ID Number" type="text" name="id" required>

				<input class="form-field" placeholder="Phone Number" type="text" name="phno" required>

				<input class="form-field" placeholder="Room Number" type="text" name="rmno" required>

				<p>Grievance On :</p>
				<p><div class="choice"><input type="radio" id="gr_choice_1" name="gr" value="EC"><label for="gr_choice_1">EC</label><br></div></p>
				<p><div class="choice"><input type="radio" id="gr_choice_2" name="gr" value="CRC"><label for="gr_choice_2">CRC</label><br></div></p>
				<p><div class="choice"><input type="radio" id="gr_choice_4" name="gr" value="SU"><label for="gr_choice_4">SU</label><br></div></p>
				<p><div class="choice"><input type="radio" id="gr_choice_3" name="gr" value="Other"><label for="gr_choice_3">Others</label><br></div></p>
				<input type="text" placeholder="Please Specify" name="gr_others" id="gr_others"><br>

				<p>Submit Grievance to :</p>
				<p><div class="choice_to"><input type="radio" id="gr_to_choice_1" name="gr_to" value="EC"><label for="gr_to_choice_1">EC</label><br></div></p>
				<p><div class="choice_to"><input type="radio" id="gr_to_choice_2" name="gr_to" value="CRC"><label for="gr_to_choice_2">CRC</label><br></div></p>
				<p><div class="choice_to"><input type="radio" id="gr_to_choice_4" name="gr_to" value="SU"><label for="gr_to_choice_4">SU</label><br></div></p>
				<p><div class="choice_to"><input type="radio" id="gr_to_choice_3" name="gr_to" value="Other"><label for="gr_to_choice_3">Others</label><br></div></p>
				<input type="text" placeholder="Please Specify" name="gr_to_others" id="gr_to_others"><br>

				<textarea placeholder="Grievance" name="message"  class="materialize-textarea" placeholder="Type Your Message Here" rows="6" cols="40" required></textarea><br><br><br>

				<div><button id="myBtn"><input id="remove" class="submit" type="submit" name="submit" value="Submit"></button>
					<input type="submit" class="submitgr_anonymous" value="Fill Anonymously"></div>
					<p><?php echo $error1.$error2.$msg; ?></p>
				</div>
				<!-- Trigger/Open The Modal -->


				<!-- The Modal -->
				<div id="myModal" class="modal">

					<!-- Modal content -->
					<div class="modal-content">
						<span class="close">&times;</span>
						<h5 style="text-align:center;"><br><br>Your Grievance has been submitted sucessfully.<br><br></h5>
					</div>

				</div>
			</form>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
	</html>
