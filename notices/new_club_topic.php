<!DOCTYPE html>
<?php
<<<<<<< HEAD
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
      
          
      if($file_size > 10485760)
      {
         $errors[]='File size must be less than 10 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"./uploads/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }


      echo $datetime;
      // insert into db
      $sql="INSERT INTO fquestions (topic, detail, name, email, file_name, datetime) VALUES ('$topic', '$detail', '$name', '$email', '$file_name', '$datetime')";
      $result=mysqli_query($con, $sql);
    
      if($result){
         echo "Successful<BR>";
         echo "<a href=Notice.php>View your topic</a>";
      }
      else {
         echo "ERROR";
      }
      mysqli_close($con);
   }
?>
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

			<label>Event Name</label><input name="event_name" type="text" id="name" size="50" required /><br>
			<label>Poster</label><input name="image" type="file" id="email" size="50" required /><br>
			<label>Location</label><input name="location" type="text" id="topic" required  /><br>
			<label>Detail</label><input name="detail" id="detail" cols="50" rows="3" required >
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
         $errors[]='File size must be less than 2 MB';
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
			<label>Notice Type</label><br>
					<input type="radio" id="notice_1" name="type" value="EC" required><label for="notice_1">Technical</label><br>
					<input type="radio" id="notice_2" name="type" value="CRC" required><label for="notice_2">Cultural</label><br>
					<input type="radio" id="notice_3" name="type" value="Other" required><label for="notice_3">Sports</label><br><br>
			<input class="submit" type="submit" name="submit" value="Submit"/><br>
			<input class="submit" type="reset" name="submit2" value="Reset"/>

		</form>
	</div>
=======
include("../common.php");
?>
<html>
<head>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
>>>>>>> front end changes

      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="../css/new_topic.css" />
</head>
<body class="#b3e5fc light-blue lighten-4">
   <div class="row">
      <form id="form" class="col #f9fbe7 lime lighten-5 s12 z-depth-4" name="form1" method="post" action="add_new_club_topic.php" enctype="multipart/form-data">
         <div class="row">
            <h3>Create New Club Notice:</h3>
            <div class="input-field col s12">
               <input placeholder="Event Name" name="event_name" type="text" id="topic" size="50" required/>
            </div>
            <div class="input-field col s12">   
               <textarea placeholder="Details" id="textarea1" class="materialize-textarea" name="detail" required></textarea>
            </div>
            <div class="input-field col s12">
               <input placeholder="Location" name="location" type="text" id="topic" size="50" required/>
            </div>
            <div class="input-field col s12">   
               <input  name="name" type="hidden" id="name" size="50" value="<?php echo $name;?>" required />
            </div>
            <div class="input-field col s12">   
               <input name="email" type="hidden" id="email" size="50" value="<?php echo $email;?>" required/>
            </div>
            <div class="input-field col s12" style="padding:0; font-size:17.5px;">Grievance On :  </div>
                     <p><div class="choice"><input type="radio" class="with-gap" id="notice_1" name="type" value="Technical"><label for="notice_1">Technical</label><br></div></p>
                     <p><div class="choice"><input type="radio" class="with-gap" id="notice_2" name="type" value="Cultural"><label for="notice_2">Cultural</label><br></div></p>
                     <p><div class="choice"><input type="radio" class="with-gap" id="notice_3" name="type" value="Sports"><label for="notice_3">Sports</label><br></div></p>               
               
            <div class="input-field col s12 file-field input-field">
                 <div class="btn  upload">
                      <span>Poster</span>
                  <input type="file" name="file">
               </div>
             </div>  
            <div class="buttons">
               <input class="button z-depth-4" type="submit" name="submit" value="submit"/>&nbsp;&nbsp;
               <input class="button z-depth-4" type="reset" name="submit2" value="reset"/>
            </div>   
      </form>
   </div>
</body>
</html>
