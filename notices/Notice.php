<?php
session_start();
include("database.php");

 
$sql="SELECT * FROM fquestions ORDER BY id DESC";

 
$result=mysqli_query($con, $sql);
?>
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
		<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
		<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
		<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
		<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
	</tr>
	<tr>
	<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="new_topic_loginform.php"><strong>Create New Topic</strong> </a></td>
	</tr>
</table>
<?php
 

while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
?>
<tr>
	<td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
	<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
	<td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
	<td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
	<td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
</tr>
<?php
// Exit looping and close connection 
}
mysqli_close($con);
?>
 <!-- create new topic -->
