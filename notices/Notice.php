<?php
include("database.php");
include("../common.php");
 
$sql="SELECT * FROM fquestions ORDER BY id DESC";
$sql1="SELECT * FROM admin ORDER BY id DESC";
 
$result=mysqli_query($con, $sql);
$reult1=mysqli_query($con, $sql1);
?>
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
		<div align="center" style="font-weight:bold; margin-top: 4%;"><a class="z-depth-4" id="button" href="new_topic.php">Create New Notice</a>
				<?php
					while($rows1 = mysqli_fetch_array($reult1, MYSQLI_ASSOC)){
						if(strpos($email, $rows1['email']) !== false){
					
				echo '<a class="z-depth-4" id="button" href="new_club_topic.php">Create New Club Notice</a>';
			}
		}
		?>


			&nbsp;&nbsp;&nbsp;&nbsp;<a class="z-depth-4" id="button" href="../land.html">Home</a></div>
		<table class="highlight z-depth-3" id="table" align="center" bgcolor="white">
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
		
	</div>	

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
 <!-- create new topic -->
