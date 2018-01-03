<!DOCTYPE html>
<html>
<head>
	<title>
		Create New Club Notice
	</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
	<div id="wrapper" class="form-con">
		<form id="form1" name="form1" method="post" action="add_new_club_topic.php">

			<label>Event Name</label><input name="event name" type="text" id="name" size="50" /><br>
			<label>Poster</label><input name="poster" type="file" id="email" size="50" /><br>
			<label>Location</label><input name="location" type="text" id="topic" /><br>
			<label>Detail</label><input name="detail" id="detail" cols="50" rows="3">
				<?php if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>

			</input><br>
			<input class="submit" type="submit" name="submit" value="Submit"/><br>
			<input class="submit" type="reset" name="submit2" value="Reset"/>

		</form>
	</div>

</body>
</html>
