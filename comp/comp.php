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
				header("Location: ../land.html");
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
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    	<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
			<form id="form" class="col s12 #e3f2fd blue lighten-5 z-depth-3" action="comp/comp.php" method="POST" enctype="multipart/form-data">
			<h4>Register Complaint</h4>
				<div class="div">
					<div class="input-field col s12">
						<input type="hidden" name="name" value="<?php echo $name;?>" required>
					</div>
					<div class="input-field col s12">	
						<input placeholder="ID" type="text" name="id" required>
					</div>
					<div class="input-field col s12">	
						<input type="hidden" name="email" value="<?php echo $email;?>" required>
					</div>
					<div class="input-field col s12">	
						<input placeholder="Phone Number" type="text" name="phno" required>
					</div>
					<div class="input-field col s12">	
						<input placeholder="Room Number" type="text" name="rmno" required>
					</div>
					<div class="input-field col s12">
						<input placeholder="Complaint On" type="text" name="compon" required>
					</div>
					<div class="input-field col s12">	
						<textarea class="materialize-textarea" name="message" placeholder="Type Your Complaint Here"></textarea>
					</div>
					<div><button id="myBtn" class="z-depth-4 button"><input id="remove" type="submit" name="submit" value="Submit"></button>
						<a  style="margin-left:35%; font-size:20px;" class="z-depth-4 button co_anonymous">Fill Anonymously</a></div>	
						<p style="margin:1%; text-align:center; color:red; font-size: 20px;"><?php echo $error1.$error2.$msg; ?></p>

					<!-- The Modal -->
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