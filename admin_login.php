<?php 
include "connect.php";
 if (isset($_POST['submit'])){
    
    $un = mysqli_real_escape_string($conn, $_REQUEST['un']);
    $_SESSION["admin_user"]=$un;
    $pswrd = mysqli_real_escape_string($conn, $_REQUEST['pw']);
    
    $sql = "SELECT password from signin where emailid='$un'";    
    
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$actual=$row["password"];

if($actual===null)
echo "<script type='text/javascript'>alert('invalid username');</script>";

else{
if($pswrd===$actual){
    $sql = "UPDATE signin set state='in' where emailid='$un'";   
$result=$conn->query($sql);
header("Location:add_job.php");

//echo "<script type='text/javascript'>location.replace(\"userhome.php\");</script>";

}
else
echo "<script type='text/javascript'>alert('wrong password');</script>";
}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Builder</title>
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css" -->
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto Slab', serif;
        }
    </style>
    <style type="text/css">
    	.form-row{
    		margin-left: 25%;
    		margin-right: 25%;
    	}
    </style>
</head>
<body>
<div class="container" style="padding-bottom: 30px;">
	<div class="position-relative" style="left: 900px;top:5px; ">
		<?php
		$id=$_SESSION['username'];
                    echo "<a href=\"bulma.php?username=$id\"> <span style=\"font-size: 30px; padding-right:15px;\" class=\"glyphicon glyphicon-home\"></span></a>";?>
	
<a href="#"><span style="font-size: 30px; padding-right: 15px;: "class="glyphicon glyphicon-refresh"></span></a>
<a href="login.php"><span style="font-size: 30px;"class="glyphicon glyphicon-off"></span></a>

</div>
        <h1 class="heading text-center" > Profile Builder</h1>
        <hr size="20" width="100%" align="center" color="green">
    <br>

    <h3 class=" text-center" > LOGIN </h3>
    <br>
    <form  method="POST" >
<div class="form-row">
<div class="form-group col-md-12">
                <label for="pname">Email: </label>
                <input type="password" class="form-control" id="name" name="un" placeholder="Enter your EmailID"
                     required>
                <br></div>

</div>
<div class="form-row">
<div class="form-group col-md-12">
                <label for="pname"> Password: </label>
                <input type="password" class="form-control" id="name1" name="pw" placeholder="Enter your Password"
                     required>
                <br></div>
                
</div>
<div class="form-group col-md-12 center-block">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <input type="submit" name="submit" id="send" value="submit" />
      </div></div>
      <div class="text-center" style="margin-bottom:150px;">
      <a href="admin_signup.php"> Create an Account</a></div>
</body>
</html>