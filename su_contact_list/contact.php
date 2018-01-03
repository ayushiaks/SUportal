<?php
include "replace.php";
?>
<html>
<head>
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
	<div id="wrapper">
		<a class="home-btn" href="../land.html">Home</a>
		<h2 id="con-head">Meet the Student Union</h2>
		<ul id="su-list">
			<div class="row">
				<li class="post"><img src="admin/uploads/president.jpg"><h3>The President</h3><p><?php echo name(0); ?><br><?php echo no(0); ?><br><?php echo email(0); ?></p></li>
				<li class="post"><img src="admin/uploads/gensec.jpg"><h3>General Secretary</h3><p><?php echo name(1); ?><br><?php echo no(1); ?><br><?php echo email(1); ?></p></li>
				<li class="post"><img src="admin/uploads/tc.jpg"><h3>Technical Convenor</h3><p><?php echo name(2); ?><br><?php echo no(2); ?><br><?php echo email(2); ?></p></li>
			</div>
			<div class="row">
				<li class="post"><img src="admin/uploads/sports-b.jpg"><h3>Sports Secretary for Boys</h3><p><?php echo name(3); ?><br><?php echo no(3); ?><br><?php echo email(3); ?></p></li>
				<li class="post"><img src="admin/uploads/sports-g.jpg"><h3>Sports Secretary for Girls</h3><p><?php echo name(4); ?><br><?php echo no(4); ?><br><?php echo email(4); ?></p></li>
				<li class="post"><img src="admin/uploads/cult-b.jpg"><h3>Cultural Secretary for Boys</h3><p><?php echo name(5); ?><br><?php echo no(5); ?><br><?php echo email(5); ?></p></li>
				<li class="post"><img src="admin/uploads/cult-g.jpg"><h3>Cultural Secretary for Girls</h3><p><?php echo name(6); ?><br><?php echo no(6); ?><br><?php echo email(6); ?></p></li>
			</div>
		</ul>
	</div>
</body>
</html>
