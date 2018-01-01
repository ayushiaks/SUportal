<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="new_topic.css" />
</head>
<body>
<!-- create new topic -->
	<div class="wrapper">
		<form class="form" id="form1" name="form1" method="post" action="add_new_topic.php">
				Create New Topic
					Topic: <input name="topic" type="text" id="topic" size="50" />
					Detail: <textarea id="text" name="detail" id="detail" cols="50" rows="3"></textarea>
					Name: <input name="name" type="text" id="name" size="50" />
					Email: <input name="email" type="text" id="email" size="50" />
					<div class="buttons">
						<input id="submit" type="submit" name="submit" value="submit"/>&nbsp;&nbsp;
						<input id="reste" type="reset" name="submit2" value="reset"/>
					</div>	
		</form>
	</div>	

</body>
</html>





