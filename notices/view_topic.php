<?php
  include("database.php");

 
// get value of id that sent from address bar 
$id=$_GET['id'];
$sql="SELECT * FROM fquestions WHERE id='$id'";
$result=mysqli_query($con, $sql);
$rows=mysqli_fetch_array($result, MYSQLI_ASSOC);
	$file_name = $rows['file_name'];
	$location = "http://localhost/SUportal/notices/uploads/%20".$file_name;
	?>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="../css/view_topic.css" />
</head>
<body class=" #b3e5fc light-blue lighten-4">
	<div class="notice">
		<div id="border">
			<div id="topic_name"><h2><?php echo $rows['topic']; ?></h2></div>
			<div id="topic_details">
				<blockquote><p ><?php echo $rows['detail']; ?></p></blockquote>
			</div>
			<div class="file_download">
				<a href="<?php echo $location; ?>" download>download attached files</a>
			</div>
			<div id="user">
				<p>By : <?php echo $rows['name']; ?> </p>
				<p>Email : <?php echo $rows['email'];?></p>
			</div>
			Date/time : </strong><?php echo $rows['datetime']; ?>
	
	<div class="line"></div>  

	<p style="font-size:20px; margin-top:3%">Comments :</p>
	<?php
	 
	$tbl_name2="fanswer"; // Switch to table "forum_answer"
	$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
	$result2=mysqli_query($con, $sql2);
	while($rows=mysqli_fetch_array($result2, MYSQLI_ASSOC)){
		?>
	<div class="answers">
		<div id="a_comment"><strong style="background-color: white;"><?php echo $rows['a_name']; ?></strong> : <?php echo $rows['a_answer']; ?></div>
		<div id="a_email"><?php echo $rows['a_email']; ?> &nbsp;&nbsp;<br> <?php echo $rows['a_datetime']; ?> </div>
	</div>	

	<?php
	}
	mysqli_close($con);
	?>
			 
			<div class="rows" id="comments">
				<form name="form1" method="post" action="add_answer.php">
					<div class="c_name">
						<input name="a_name" type="hidden" id="a_name" size="45">
					</div>
					<div class="c_email">
						<input name="a_email" type="hidden" id="a_email" size="45">
					</div>
					<div class="C_answer">
						<textarea placeholder="Comment" id="a_answer" class="materialize-textarea" name="a_answer"></textarea>
					</div>
						<input name="id" type="hidden" value="<?php echo $id; ?>">
						<input type="submit" name="Submit" value="Submit"> 
				</form>
			</div>	
		</div>	
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>