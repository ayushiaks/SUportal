<?php
session_start();
include("database.php");
$sql="SELECT * FROM club ORDER BY id DESC";
$sql1="SELECT * FROM admin";
 
$result=mysqli_query($con, $sql);
$result1=mysqli_query($con, $sql1);

?>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php
 

while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	if($rows['type'] == 'Cultural'){
?>
<div class="club_notice  z-depth-3">
		<p><?php echo $rows['id']; ?></p>
		<h4 class="center-align"><?php echo $rows['event_name']; ?></h4>
		<p class="club_notice_detail"><span style="font-weight:bold;">Details:</span>&nbsp;&nbsp;<?php echo $rows['detail']; ?></p>
		<div class="center-align">
			<img src="<?php echo "notices/uploads/".$rows['image']; ?>"?>
		</div>	
		<p><span style="font-weight:bold;">Location:</span>&nbsp;&nbsp;<?php echo $rows['location']; ?></p>
		<p><?php echo $rows['datetime']; ?></p>
</div>



<?php 
}
}
mysqli_close($con);
?>

</body>
</html>