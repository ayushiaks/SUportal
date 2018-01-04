<?php
session_start();
include("database.php");


 
$sql="SELECT * FROM club ORDER BY id DESC";
$sql1="SELECT * FROM admin";
 
$result=mysqli_query($con, $sql);
$result1=mysqli_query($con, $sql1);

?>
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
		<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Notice</strong></td>
		<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Details</strong></td>
		<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Location</strong></td>
		<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Poster</strong></td>
		<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>e
		<td>.</td>
	</tr>
<?php
 

while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	while($rows['type'] == 'Sports'){
?>
<tr>
	<td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
	<td bgcolor="#FFFFFF"><?php echo $rows['event_name']; ?><BR></td>
	<td bgcolor="#FFFFFF"><?php echo $rows['detail']; ?><BR></td>
	<td bgcolor="#FFFFFF"><?php echo $rows['location']; ?><BR></td>
	<td bgcolor="#FFFFFF"><?php echo $rows['image']; ?><BR></td>
	<td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
	<td><a href="home.php" id="create-event">add to calendar</a></td>
</tr>
</BR>
</td></BR></td></tr>



<?php
// Exit looping and close connection 
}
}
mysqli_close($con);
?>


<!--create new topic-->

</table>