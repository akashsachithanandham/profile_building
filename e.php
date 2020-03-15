<?php

include "connect.php";

//   $id = $_SESSION['username'];
  
// //echo $id;
// if (isset($_POST['submit'])){
    
//     $name = mysqli_real_escape_string($conn, $_REQUEST['pname']);
//     $obj = mysqli_real_escape_string($conn, $_REQUEST['obj']);
//     $Tools = mysqli_real_escape_string($conn, $_REQUEST['Tools']);
//     $Outcome = mysqli_real_escape_string($conn, $_REQUEST['Outcome']);
//     if(isset($_POST['current']) && 
//    $_POST['current'] == '1') 
// {
//   $duration = "current";
// }
// else
// {
//    $duration = mysqli_real_escape_string($conn, $_REQUEST['duration']);
//     $duration1 = mysqli_real_escape_string($conn, $_REQUEST['duration1']);
//     $duration = new DateTime($duration);
//     $duration1 = new DateTime($duration1);
//     if($duration1 > $duration){
//     $duration = $duration + '-' + $duration1;
//     $sql = "INSERT INTO profile_project (username,pname,duration,obj,tools,outcome) VALUES ('$id', '$name', '$duration', '$obj', '$Tools','$Outcome')";
//     if(mysqli_query($conn, $sql)){
//     echo "recorded";
//     header("Location:profile_project.php");

//     }

//  else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
// }
    
//     }
//     else{
//         echo "<script>alert(\"Enter the proper duration\")</script>";

//     }
// }  
//     //echo $name;
//     //$_SESSION['email']=$un;
    
//     }
// if (isset($_POST['submit1'])){
// $name = mysqli_real_escape_string($conn, $_REQUEST['pname']);
//     $obj = mysqli_real_escape_string($conn, $_REQUEST['obj']);
//     $Tools = mysqli_real_escape_string($conn, $_REQUEST['Tools']);
//     $Outcome = mysqli_real_escape_string($conn, $_REQUEST['Outcome']);
//     if(isset($_POST['current']) && 
//    $_POST['current'] == '1') 
// {
//   $duration = "current";
// }
// else
// {
//    $duration = mysqli_real_escape_string($conn, $_REQUEST['duration']);
//     $duration1 = mysqli_real_escape_string($conn, $_REQUEST['duration1']);
//     $duration = new DateTime($duration);
//     $duration1 = new DateTime($duration1);
//     if($duration1 > $duration){
//     $duration = $duration + '-' + $duration1;
//     $sql = "INSERT INTO profile_project (username,pname,duration,obj,tools,outcome) VALUES ('$id', '$name', '$duration', '$obj', '$Tools','$Outcome')";
//     if(mysqli_query($conn, $sql)){
//     echo "recorded";
//     header("Location:profile_intern.php");

//     }

//  else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
// }
    
//     }
//     else{
//         echo "<script>alert(\"Enter the proper duration\")</script>";

//     }
    
//     }}

// mysqli_close($conn);
// ob_flush();

?>

<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resume Builder</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto Slab', serif;
        }
    </style>
    <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
    <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
  
    <script >
  var config = {
    apiKey: "AIzaSyDFZYD1W5alvk1NgBQmpKq3ts8wS0e1qhM",
    authDomain: "profile-building.firebaseapp.com",
    databaseURL: "https://profile-building.firebaseio.com",
    projectId: "profile-building",
    storageBucket: "profile-building.appspot.com",
    messagingSenderId: "257471243972",
    appId: "1:257471243972:web:914e1ee949036f7d210b91",
    measurementId: "G-SVBLV1ZQD1"
  };
  firebase.initializeApp(config);
</script>

    <script type="text/javascript">
      firebase.auth().onAuthStateChanged(user => {
  if(user) {
     //document.getElementByName("submit1").value= email;
     console.log("welcome");
    //window.location = 'profile.php?username=' + email  ; //After successful login, user will be redirected to home.html
  }
  else{
window.location="a.html";
  }
    });
    </script>
</head>
<body>
    <div class="container">
        <h3 class="heading text-center" > Profile Management </h3>
        <hr size="20" width="75%" align="center" color="green">
    <br>

    <h5 class="heading text-center" > Projects</h5>
    <br>
    <form action="" method="POST">
<div class="form-row">
        <div class = "form-group col-md-4">
           <?php
          include "accordion.php";?>

        </div>
        <div class = "form-group col-md-8">
    <?php 
            $id = "krUAXTWfIBX1pnbWDT0XHAKa1xm2";
$sql = "SELECT * from profile_project where username='$id'";
    $result=$conn->query($sql);
    
while($row=$result->fetch_assoc()){
   
    
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


        
</div></div>

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
        <div class="form-row">
        <div class="form-group col-md-6">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Add Another</button>
      </div></div>
      <div class="form-group col-md-6">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit1">Save and Proceed</button>
      </div>
  </div>
</div>
        </div> </form>
    </div>
</body>
</html>