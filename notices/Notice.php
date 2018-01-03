<?php
session_start();
include("database.php");

include("../index.php");


 
$sql="SELECT * FROM fquestions ORDER BY id DESC";
$sql1="SELECT * FROM admin";
$sql2="SELECT * FROM club ORDER BY id DESC";
 
$result=mysqli_query($con, $sql);
$result1=mysqli_query($con, $sql1);
$result2=mysqli_query($con, $sql2);

?>
<<<<<<< HEAD
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
		<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Notice</strong></td>
		<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Details</strong></td>
		<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
		<td>.</td>
	</tr>
<?php
 

while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
?>
<tr>
	<td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
	<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>" id="event-title"><?php echo $rows['topic']; ?></a><BR></td>
	<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['detail']; ?></a><BR></td>
	<td align="center" bgcolor="#FFFFFF" id="event-date"><?php echo $rows['datetime']; ?></td>
	<td><a href="home.php" id="create-event">add to calendar</a></td>
</tr>
</BR>
</td></BR></td></tr></table>

<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
		<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Event Name</strong></td>
		<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Detail</strong></td>
		<td width="53%" align="center" bgcolor="#E6E6E6"><strong>location</strong></td>
		<td width="53%" align="center" bgcolor="#E6E6E6"><strong>poster</strong></td>
		<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
		<td>.</td>
	</tr>
<?php
 

while($rows2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
?>
<tr>
	<td bgcolor="#FFFFFF"><?php echo $rows2['id']; ?></td>
	<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>" id="event-title"><?php echo $rows['event_name']; ?></a><BR></td>
	<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['detail']; ?></a><BR></td>
	<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['location']; ?></a><BR></td>
	<td bgcolor="#FFFFFF"><img src="<?php echo $rows['detail']; ?>"><BR></td>
	<td align="center" bgcolor="#FFFFFF" id="event-date"><?php echo $rows['datetime']; ?></td>
	<td><a href="home.php" id="create-event">add to calendar</a></td>
</tr>

</BR></td></BR></td></BR></td></BR></td></tr></table>

<?php
// Exit looping and close connection 
}
mysqli_close($con);
?>

</table>
<!--create new topic-->
<tr>
	<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="new_topic.php"><strong>Create New Notice</strong> </a></td>
	</tr>
<?php
while($rows1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
if(strpos($email, $rows1['email']) !== false)
{
?>
<tr>
	<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="new_club_topic.php"><strong>Create New Club Notice</strong> </a></td>
	</tr>
	<?php 
	}
	 ?>
	    
=======
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="../css/notices.css" />
</head>
<body class=" #b3e5fc light-blue lighten-4">
	<div class="wrapper">
		<table class="highlight" id="table" align="center" bgcolor="white">
			<tr>
				<td width="15%" align="center"><p style="text-align:center;" class="header">Notice</p></td>
				<td width="53%" align="center"><p class="header">Details</p></td>
				<td width="13%" align="center"><p class="header">Date/Time</p></td>
			</tr>
		<?php
		 

		while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		?>
			<tr>
				<td ><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><p style="text-align:center;"><?php echo $rows['topic']; ?></p></a></td>
				<td><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><p><?php echo $rows['detail']; ?></p></a></td>
				<td  bgcolor="#FFFFFF"><p><?php echo $rows['datetime']; ?></p></td>
			</tr>
		<?php
		// Exit looping and close connection 
		}
		mysqli_close($con);
		?>

		</table>
		<div align="center" style="font-weight:bold;"><a class="z-depth-4" id="button" href="new_topic.php">Create New Notice</a></div>
	</div>	

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
 <!-- create new topic -->
>>>>>>> c1d1964d809661c4f091cf7696309f4a579c18f2
