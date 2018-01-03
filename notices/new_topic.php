<!DOCTYPE html>
<html>
<head>
	<title>
		Create New Notice
	</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
	<div id="wrapper" class="form-con">
		<form id="form1" name="form1" method="post" action="add_new_topic.php">

			<label>Name</label><input name="name" type="text" id="name" size="50" /><br>
			<label>Email</label><input name="email" type="text" id="email" size="50" /><br>
			<label>Topic</label><input name="topic" type="text" id="topic" /><br>
			<label>Detail</label><textarea name="detail" id="detail" cols="50" rows="3"></textarea><br>
			<input class="submit" type="submit" name="submit" value="Submit"/><br>
			<input class="submit" type="reset" name="submit2" value="Reset"/>

		</form>
	</div>

</body>
</html>
