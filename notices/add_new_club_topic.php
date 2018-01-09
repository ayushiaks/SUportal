<?php 
	include("database.php");

	extract($_POST);
	extract($_FILES);
	$event_name=$_POST['event_name'];
	$detail=$_POST['detail'];
	$location=$_POST['location'];
	$datetime=date("d/m/y h:i:s");
	$type=$_POST['type'];
	echo $datetime;
	echo "Success lite";
    
    if(!empty($event_name)&&
		!empty($detail)&&
		!empty($location)&&
		!empty($type)&&
		!empty($datetime))
	{
	  $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      
      echo $file_name; 
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads\ ".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }


		echo $datetime;
	}

	// insert into db
	$sql="INSERT INTO club (event_name, detail, location, image, type, datetime) VALUES ('$event_name', '$detail', '$location', '$file_name', '$type', '$datetime')";
	$result=mysqli_query($con, $sql);
 
	if($result){
		header("Location: ../land.html");
		
	}
	else {
		echo "ERROR";
	}
	mysqli_close($con);
	
?>
