<?php
  include("database.php");

 
// get value of id that sent from address bar 
$id=$_GET['id'];
$sql="SELECT * FROM fquestions WHERE id='$id'";
$result=mysqli_query($con, $sql);
$rows=mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>

<<<<<<< HEAD
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo $rows['topic']; ?></strong></td>
</tr>
 
<tr>
<td bgcolor="#F8F7F1"><?php echo $rows['detail']; ?></td>
</tr>
 
<!--<tr>
<td bgcolor="#F8F7F1"><strong>By :</strong> <?php echo $rows['name']; ?> <strong>Email : </strong><?php echo $rows['email'];?></td>
</tr>-->
 
<tr>
<td bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo $rows['datetime']; ?></td>
</tr>
</table></td>
</tr>
</table>
<BR>
 
<?php
 
$tbl_name2="fanswer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysqli_query($con, $sql2);
while($rows=mysqli_fetch_array($result2, MYSQLI_ASSOC)){
?>
 
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong>ID</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_id']; ?></td>
</tr>
<tr>
<td width="18%" bgcolor="#F8F7F1"><strong>Name</strong></td>
<td width="5%" bgcolor="#F8F7F1">:</td>
<td width="77%" bgcolor="#F8F7F1"><?php echo $rows['a_name']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Email</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_email']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Answer</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_answer']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_datetime']; ?></td>
</tr>
</table></td>
</tr>
</table><br>
 
=======
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
			<div id="user">
				<p>By : <?php echo $rows['name']; ?> </p>
				<p>Email : <?php echo $rows['email'];?></p>
			</div>
			Date/time : </strong><?php echo $rows['datetime']; ?>
	
	<div class="line"></div>  
>>>>>>> c1d1964d809661c4f091cf7696309f4a579c18f2

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