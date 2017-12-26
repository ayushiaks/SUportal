<?php

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
		if($gr == 'others' && empty($gr_others))
		{
			$error1 = "Please fill in the details of others";
			header ('Location: cng.html');
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
				header ('Location: cng.html');
			}
			else
			{
				die(mysqli_error($var));
			}
		}	
	}
	else{
		$error2 = "Fill in all the fields";
		header ('Location: cng.html');
	}
}
else{
	header ('Location: cng.html');
}
	

?>