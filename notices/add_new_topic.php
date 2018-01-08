<?php 
	include("database.php");
	extract($_POST);
	extract($_FILES);
	$topic=$_POST['topic'];
	$detail=$_POST['detail'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$datetime=date("d/m/y h:i:s");
	if(!empty($topic)&&
		!empty($detail)&&
		!empty($name)&&
		!empty($email)&&
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
		// insert into db
		$sql="INSERT INTO fquestions (topic, detail, name, email, file_name, datetime) VALUES ('$topic', '$detail', '$name', '$email', '$file_name', '$datetime')";
		$result=mysqli_query($con, $sql);
	 
		if($result){
			header('Location: Notice.php');
		}
		else {
			echo "ERROR";
		}
		mysqli_close($con);
	}
	else{
			header('Location: Notice.php');
	}



?>
