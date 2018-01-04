<?php 
	include("database.php");

	extract($_POST);
	$event_name=$_POST['event_name'];
	$detail=$_POST['detail'];
	$location=$_POST['location'];
	$image=$_POST['image'];
	$datetime=date("d/m/y h:i:s");
	$type=$_POST['type'];
	echo $datetime;
	// insert into db
	$sql="INSERT INTO club (event_name, detail, location, image, type, datetime) VALUES ('event_name', '$detail', '$location', '$image', '$type', '$datetime')";
	$result=mysqli_query($con, $sql);
 
	if($result){
		echo "Successful<BR>";
		
	}
	else {
		echo "ERROR";
	}
	mysqli_close($con);
	
?>
