<?php
  include("database.php");

 
// get value of id that sent from address bar 
$id=$_GET['id'];
$sql="SELECT * FROM fquestions WHERE id='$id'";
$result=mysqli_query($con, $sql);
$rows=mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<head>
	        <link rel="stylesheet" href="../css/view_topic.css" />
</head>
<body>
	<div class="notice">
		<div id="border">
			<div id="topic_name"><h2><?php echo $rows['topic']; ?></h2></div>
			<div id="topic_details"><p ><?php echo $rows['detail']; ?></p></div>
			<div id="user">
				<p>By : <?php echo $rows['name']; ?> </p>
				<p>Email : <?php echo $rows['email'];?></p>
			</div>
			Date/time : </strong><?php echo $rows['datetime']; ?>
	
	<div class="line"></div>  
	<?php
	 
	$tbl_name2="fanswer"; // Switch to table "forum_answer"
	$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
	$result2=mysqli_query($con, $sql2);
	while($rows=mysqli_fetch_array($result2, MYSQLI_ASSOC)){
	?>
	
	<div class="answers">
		<div id="a_comment"><?php echo $rows['a_name']; ?> : <?php echo $rows['a_answer']; ?></div>
		<div id="a_email"><?php echo $rows['a_email']; ?> &nbsp;&nbsp;<br> <?php echo $rows['a_datetime']; ?> </div>
	</div>	

	<?php
	}
	mysqli_close($con);
	?>
			 
			<div id="comments">
				<form name="form1" method="post" action="add_answer.php">
					<div class="c_name">
						<p>Name:</p><input name="a_name" type="text" id="a_name" size="45">
					</div>
					<div class="c_email">
						<p>Email:</p><input name="a_email" type="text" id="a_email" size="45">
					</div>
					<div class="C_answer">
						<p>Comment:</p><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea>
					</div>
						<input name="id" type="hidden" value="<?php echo $id; ?>">
						<input type="submit" name="Submit" value="Submit"> 
				</form>
			</div>	
		</div>	
	</div>
</body>