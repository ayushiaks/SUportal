<?php
session_start();
include("database.php");
 
$sql="SELECT * FROM fquestions ORDER BY id DESC";

 
$result=mysqli_query($con, $sql);
?>
<head>
	<link rel="stylesheet" href="../css/notices.css" />
</head>
<body>
	<div class="wrapper">
		<table id="table" width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="white">
			<tr>
				<th width="15%" align="center"><strong><p class="header">Notice</p></strong></th>
				<th width="53%" align="center"><strong><p class="header">Details</p></strong></th>
				<th width="13%" align="center"><strong><p class="header">Date/Time</p></strong></th>
			</tr>
		<?php
		 

		while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		?>
			<tr>
				<td align="center"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><p style="font-weight:bold"><?php echo $rows['topic']; ?></p></a><BR></td>
				<td align="left"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><p><?php echo $rows['detail']; ?></p></a><BR></td>
				<td align="center" bgcolor="#FFFFFF"><p><?php echo $rows['datetime']; ?></p></td>
			</tr>
		<?php
		// Exit looping and close connection 
		}
		mysqli_close($con);
		?>

		</table>
		<div align="center"><a id="button" href="new_topic.php">Create New Notice</a></div>
	</div>	
</body>
 <!-- create new topic -->
