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
		<link rel="stylesheet" href="../css/grievances.css" />
	</head>
	<body>
		<div class="row">	
			<form class="form z-depth-3" style="background-color:black; opacity:0.7;" action="comp/gr_anonymus.php" method="POST" enctype="multipart/form-data">
				<h4>Greivance Form (Anonymous)</h4>
				<div class="div">
					<div class="input-field col s12">
						<input placeholder="Name" type="hidden" value="<?php echo $name;?>" name="name"/>
					</div>
					<div class="input-field col s12">	
						<input placeholder="email" type="hidden" value="<?php echo $email;?>" name="email">
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
						<textarea placeholder="Grievance" class="materialize-textarea" name="message" placeholder="Type Your Message Here" rows="6" cols="40" required></textarea>
					</div>
						<div><button id="myBtn" class="z-depth-4 button"><input id="remove" type="submit" name="submit" value="Submit"></button></div>		
						<p style="margin:1%; text-align:center; color:red; font-size: 20px;"><?php echo $error1.$error2.$msg; ?></p>


					<div id="myModal" class="modal">

					  <!-- Modal content -->
					  <div class="modal-content">
					    <span class="close">&times;</span>
					    <p style="text-align:center; font-size:20px;"><br><br>Your complaint has been submitted sucessfully.<br><br></p>
					  </div>
					</div>  
				</div>		
			</form>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>	
	</body>
</html>