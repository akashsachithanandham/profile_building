
<?php
include "connect.php";



// if (isset($_POST['submit'])){
    
//     $un = mysqli_real_escape_string($conn, $_REQUEST['email']);
//     $_SESSION["email"]=$un;
//     $pswrd = mysqli_real_escape_string($conn, $_REQUEST['pw']);
    
//     $sql = "SELECT password from signin where emailid='$un'";    
    
// $result=$conn->query($sql);
// $row=$result->fetch_assoc();
// $actual=$row["password"];

// if($actual===null)
// echo "<script type='text/javascript'>alert('invalid username');</script>";

// else{
// if($pswrd===$actual){
//     $sql = "UPDATE signin set state='in' where emailid='$un'";   
// $result=$conn->query($sql);
// header("Location:success.php");

// //echo "<script type='text/javascript'>location.replace(\"userhome.php\");</script>";

// }
// else
// echo "<script type='text/javascript'>alert('wrong password');</script>";
// }
// }

if (isset($_POST['submit1'])){
  header("Location:login.php");
}
if (isset($_POST['submit'])){
  header("Location:admin_login.php");
}

?>



<html>
<head>
  <title>Profile Builder</title>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css"> -->
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto Slab', serif;
        }
    </style>
    <style type="text/css">
      body{
        background-image: url("b.jfif");
        background-repeat: no-repeat;
        background-attachment: fixed;
  background-size: cover;
      }
      .container{
        margin-top: 250px;
      }
    </style>
</head>
<body>

<div class="container">
    <h1 class=" text-center" > 𝕡𝕣𝕠𝕗𝕚𝕝𝕖 𝕓𝕦𝕚𝕝𝕕𝕖𝕣 </h1>
    <hr size="30" width="100%" align="center" color="green">
    <form method="POST">
    <div style="margin-top: 100px; margin-bottom: 150px;"class="form-row">

            <div class="col-md-6"><div class="text-center">
  <button type="submit" class="btn btn-info btn-lg"  name="submit">Admin</button></div></div>
  <div class="col-md-6"><div class="text-center">
    
  <button type="submit" class="btn btn-info btn-lg"  name="submit1">User</button></div></div></form>
  <br><br><br>
</div>
</div>

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


</div>

</body>
</html>