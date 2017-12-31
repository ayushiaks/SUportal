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
<<<<<<< HEAD
			<td>
				<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#ffffff">
					<tr>
						<td colspan="3" bgcolor="#e6e6e6">Create New Topic</td>
					</tr>
					<tr>
						<td width="14%">Topic</td>
						<td width="2%">:</td>
						<td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
					</tr>
					<tr>
						<td valign="top">Detail</td>
						<td valign="top">:</td>
						<td><textarea name="detail" id="detail" cols="50" rows="3"></textarea></td>
					</tr>
					<!--<tr>
						<td>Name</td>
						<td>:</td>
						<td><input name="name" type="text" id="name" size="50" /></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input name="email" type="text" id="email" size="50" /></td>
					</tr>-->
					<tr>
						
						<td><input type="submit" name="submit" value="submit"/>
						<input type="reset" name="submit2" value="reset"/></td>
					</tr>
				</table>
			</td>
=======
			<label>Name</label><input name="name" type="text" id="name" size="50" /><br>
			<label>Email</label><input name="email" type="text" id="email" size="50" /><br>
			<label>Topic</label><input name="topic" type="text" id="topic" /><br>
			<label>Detail</label><textarea name="detail" id="detail" cols="50" rows="3"></textarea><br>
			<input class="submit" type="submit" name="submit" value="Submit"/><br>
			<input class="submit" type="reset" name="submit2" value="Reset"/>
>>>>>>> 4480d26fa8c851e7ce6aab2e2d944724fbca07ba
		</form>
	</div>

</body>
</html>
