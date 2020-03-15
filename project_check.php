
<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3307","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);


if (isset($_POST['submit'])){
    
    $un = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $_SESSION["email"]=$un;
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
header("Location:success.php");

//echo "<script type='text/javascript'>location.replace(\"userhome.php\");</script>";

}
else
echo "<script type='text/javascript'>alert('wrong password');</script>";
}
}

if (isset($_POST['submit1'])){
    
    $un = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $_SESSION["email"]=$un;
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
header("Location:success1.php");

//echo "<script type='text/javascript'>location.replace(\"userhome.php\");</script>";

}
else
echo "<script type='text/javascript'>alert('wrong password');</script>";
}
}

ob_flush();
?>



<html>
<head>
  <title>admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    body{

background-color: #01579B;
  background-repeat: no-repeat;
  background-size:cover;
  
}
.container{
  background-color: #B3E5FC;
}
</style>
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
    <h1 class="heading text-center" > Time Table Management System </h1>
    <hr size="20" width="80%" align="center" color="green">
    <?php 
            $id = "krUAXTWfIBX1pnbWDT0XHAKa1xm2";
$sql = "SELECT * from profile_project where username='$id'";
    $result=$conn->query($sql);
    
while($row=$result->fetch_assoc()){
   
    $pid=$row['pid'];
    $pname=$row['pname'];
    $duration=$row['duration'];
    $outcome=$row['outcome'];
    $obj=$row['obj'];
    $tools=$row['tools'];
    
     
    echo"
    <div class=\"inlin card\">
        <h2> Project Name: $pname </h2>
        <h3> Duration: $duration</h3>
        <h3> Objective: $obj</h3>
        <h3> Outcome: $outcome</h3>
        <h3> Tools and Techniques Used: $tools</h3>
        <form method=\"POST\">
        <div class=\"form-row\">
        <input type=\"text\" value=$uid style=\"display:none;\" name=\"rno\">
            <div class=\"col-md-6\"><div class=\"text-center\">
  <button type=\"button\" class=\"btn btn-info btn-md\"  data-toggle=\"modal\" data-target=\"#modalLoginForm\">Edit</button></div></div>
  <div class=\"col-md-6\"><div class=\"text-center\">
  <button type=\"button\" class=\"btn btn-info btn-md\"  data-toggle=\"modal\" data-target=\"#modalLoginForm1\">Delete</button></div>
</div>
</div>
        
        </form>
 </div>
    ";
    
    
    ;
}?>
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        
        <h4 class="modal-title w-100 font-weight-bold">Sign in </h4>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form action="" method="POST">
         <i class=\"fas fa-user icon\"></i>
          <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-email" >Your email</label>
          <input type="email" id="defaultForm-email" class="form-control validate" name="email" required>
          
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-pass" >Your password</label>
          <input type="password" id="defaultForm-pass" class="form-control validate" name="pw" required>
          
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" type="submit" name="submit">Login</button>
      </div>
      </form>
    </div>

  </div>
</div>


</div>

<div class="modal fade" id="modalLoginForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        
        <h4 class="modal-title w-100 font-weight-bold">Sign in </h4>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form action="" method="POST">
         <i class=\"fas fa-user icon\"></i>
          <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-email" >Your email</label>
          <input type="email" id="defaultForm-email" class="form-control validate" name="email" required>
          
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-pass" >Your password</label>
          <input type="password" id="defaultForm-pass" class="form-control validate" name="pw" required>
          
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" type="submit1" name="submit1">Login</button>
      </div>
      </form>
    </div>

  </div>
</div>


</div>

</body>
</html>