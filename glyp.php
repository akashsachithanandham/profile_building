<!DOCTYPE html>
<html>
<head>
	
    <link rel="stylesheet" href="style.css">
   
    
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
<div class="position-relative" style="left: 900px;top:5px; ">
		<?php
		$id=$_SESSION['username'];
                    echo "<a href=\"bulma.php?username=$id\"> <span style=\"font-size: 30px; padding-right:15px;\" class=\"glyphicon glyphicon-home\"></span></a>";?>
	
<a href="#"><span style="font-size: 30px; padding-right: 15px;: "class="glyphicon glyphicon-refresh"></span></a>
<a href="login.php"><span style="font-size: 30px;"class="glyphicon glyphicon-off"></span></a>

</div>
</body>
</html>