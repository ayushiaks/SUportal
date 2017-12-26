<?php

	include "../replace.php";

	if(isset($_POST['prez-name']) && !empty($_POST['prez-name']))
	{
		$string = $_POST['prez-name'];
		$name = name(0);
		replacename($string,$name);
	}
		if(isset($_POST['prez-no']) && !empty($_POST['prez-no']))
	{
		$string = $_POST['prez-no'];
		$no = no(0);
		replaceno($string,$no);
	}
		if(isset($_POST['prez-id']) && !empty($_POST['prez-id']))
	{
		$string = $_POST['prez-id'];
		$id = email(0);
		replaceemail($string,$id);
	}


	if(isset($_POST['gensec-name']) && !empty($_POST['gensec-name']))
	{
		$string = $_POST['gensec-name'];
		$name = name(1);
		replacename($string,$name);
	}
		if(isset($_POST['gensec-no']) && !empty($_POST['gensec-no']))
	{
		$string = $_POST['gensec-no'];
		$no = no(1);
		replaceno($string,$no);
	}
		if(isset($_POST['gensec-id']) && !empty($_POST['gensec-id']))
	{
		$string = $_POST['gensec-id'];
		$id = email(1);
		replaceemail($string,$id);
	}

	if(isset($_POST['tc-name']) && !empty($_POST['tc-name']))
	{
		$string = $_POST['tc-name'];
		$name = name(2);
		replacename($string,$name);
	}
		if(isset($_POST['tc-no']) && !empty($_POST['tc-no']))
	{
		$string = $_POST['tc-no'];
		$no = no(2);
		replaceno($string,$no);
	}
		if(isset($_POST['tc-id']) && !empty($_POST['tc-id']))
	{
		$string = $_POST['tc-id'];
		$id = email(2);
		replaceemail($string,$id);
	}


	if(isset($_POST['sports-b-name']) && !empty($_POST['sports-b-name']))
	{
		$string = $_POST['sports-b-name'];
		$name = name(3);
		replacename($string,$name);
	}
		if(isset($_POST['sports-b-no']) && !empty($_POST['sports-b-no']))
	{
		$string = $_POST['sports-b-no'];
		$no = no(3);
		replaceno($string,$no);
	}
		if(isset($_POST['sports-b-id']) && !empty($_POST['sports-b-id']))
	{
		$string = $_POST['sports-b-id'];
		$id = email(3);
		replaceemail($string,$id);
	}

	if(isset($_POST['sports-g-name']) && !empty($_POST['sports-g-name']))
	{
		$string = $_POST['sports-g-name'];
		$name = name(4);
		replacename($string,$name);
	}
		if(isset($_POST['sports-g-no']) && !empty($_POST['sports-g-no']))
	{
		$string = $_POST['sports-g-no'];
		$no = no(4);
		replaceno($string,$no);
	}
		if(isset($_POST['sports-g-id']) && !empty($_POST['sports-g-id']))
	{
		$string = $_POST['sports-g-id'];
		$id = email(4);
		replaceemail($string,$id);
	}

	if(isset($_POST['cult-b-name']) && !empty($_POST['cult-b-name']))
	{
		$string = $_POST['cult-b-name'];
		$name = name(5);
		replacename($string,$name);
	}
		if(isset($_POST['cult-b-no']) && !empty($_POST['cult-b-no']))
	{
		$string = $_POST['cult-b-no'];
		$no = no(5);
		replaceno($string,$no);
	}
		if(isset($_POST['cult-b-id']) && !empty($_POST['cult-b-id']))
	{
		$string = $_POST['cult-b-id'];
		$id = email(5);
		replaceemail($string,$id);
	}

	if(isset($_POST['cult-g-name']) && !empty($_POST['cult-g-name']))
	{
		$string = $_POST['cult-g-name'];
		$name = name(6);
		replacename($string,$name);
	}
		if(isset($_POST['cult-g-no']) && !empty($_POST['cult-g-no']))
	{
		$string = $_POST['cult-g-no'];
		$no = no(6);
		replaceno($string,$no);
	}
		if(isset($_POST['cult-g-id']) && !empty($_POST['cult-g-id']))
	{
		$string = $_POST['cult-g-id'];
		$id = email(6);
		replaceemail($string,$id);
	}
?>
<html>
	<head>
		
	</head>
	<body>
		<form class="form" action="enter.php" method="POST" enctype="multipart/form-data">
			<h4>President Details<h4>
				Name:<input type="text" name="prez-name">
				Number:<input type="text" name="prez-no">
				ID:<input type="text" name="prez-id">
	
			<h4>General Secretary Details<h4>
				Name:<input type="text" name="gensec-name">
				Number:<input type="text" name="gensec-no">
				ID:<input type="text" name="gensec-id">
	
			<h4>Technical Convernor Details<h4>
				Name:<input type="text" name="tc-name">
				Number:<input type="text" name="tc-no">
				ID:<input type="text" name="tc-id">
	
			<h4>Boys' Sports Secretary Details<h4>
				Name:<input type="text" name="sports-b-name">
				Number:<input type="text" name="sports-b-no">
				ID:<input type="text" name="sports-b-id">
	
			<h4>Girls' Sports Sceretary Details<h4>
				Name:<input type="text" name="sports-g-name">
				Number:<input type="text" name="sports-g-no">
				ID:<input type="text" name="sports-g-id">
	
			<h4>Boys' Cultural Secretary Details<h4>
				Name:<input type="text" name="cult-b-name">
				Number:<input type="text" name="cult-b-no">
				ID:<input type="text" name="cult-b-id">
	
			<h4>Girls' Cultural Secretary Details<h4>
				Name:<input type="text" name="cult-g-name">
				Number:<input type="text" name="cult-g-no">
				ID:<input type="text" name="cult-g-id">
	
			<input type="submit" value="Submit">	
	</body>
</html>