<?php
include("../common.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="../css/new_topic.css" />
</head>
<body>
<!-- create new topic -->
	<div class="row">
		<form id="form" class="col s12 z-depth-4" name="form1" method="post" action="add_new_topic.php" enctype="multipart/form-data">
			<div class="row">
				<h3>Create New Topic:</h3>
				<div class="input-field col s12">
					<input placeholder="Topic" name="topic" type="text" id="topic" size="50" required/>
				</div>
				<div class="input-field col s12">	
					<textarea placeholder="Details" id="textarea1" class="materialize-textarea" name="detail" required></textarea>
				</div>
				<div class="input-field col s12">	
					<input  name="name" type="hidden" id="name" size="50" value="<?php echo $name;?>" required />
				</div>
				<div class="input-field col s12">	
					<input name="email" type="hidden" id="email" size="50" value="<?php echo $email;?>" required/>
				</div>
				<div class="input-field col s12 file-field input-field">
			        <div class="btn  upload">
			      	    <span>Upload File</span>
			        	<input type="file" name="file">
			      </div>
			    </div>	
				<div class="buttons">
					<input class="button z-depth-4" type="submit" name="submit" value="submit"/>&nbsp;&nbsp;
					<input class="button z-depth-4" type="reset" name="submit2" value="reset"/>
				</div>	
		</form>
	</div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>        




