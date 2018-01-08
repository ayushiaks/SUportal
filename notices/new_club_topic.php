<!DOCTYPE html>
<?php
include("../common.php");
?>
<html>
<head>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>

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
