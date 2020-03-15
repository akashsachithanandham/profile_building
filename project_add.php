<?php

include "connect.php";

  $id = $_SESSION['username'];
  
//echo $id;
if (isset($_POST['submit'])){
  
    
    $name = mysqli_real_escape_string($conn, $_REQUEST['pname']);
    $obj = mysqli_real_escape_string($conn, $_REQUEST['obj']);
    $Tools = mysqli_real_escape_string($conn, $_REQUEST['Tools']);
    $Outcome = mysqli_real_escape_string($conn, $_REQUEST['Outcome']);
    if(isset($_POST['current']) &&  $_POST['current'] == '1') 
{
  $duration = "current";
  $duration1 = "current";
}
else
{
   $duration = mysqli_real_escape_string($conn, $_REQUEST['duration']);
    $duration1 = mysqli_real_escape_string($conn, $_REQUEST['duration1']);
    $duration = new DateTime($duration);
    $duration1 = new DateTime($duration1);
    $duration = $duration + '-' + $duration1;
  }
  if($duration !="current" && $duration == 0){
    echo "<script>alert(\"Enter the duration\")</script>";
  }
    else if($duration1 > $duration || $duration=="current"){
    
    $sql = "INSERT INTO profile_project (username,pname,duration,obj,tools,outcome) VALUES ('$id', '$name', '$duration', '$obj', '$Tools','$Outcome')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_project.php");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
    }
    
    else{
        echo "<script>alert(\"Enter the proper duration\")</script>";

    }
} 
    //echo $name;
    //$_SESSION['email']=$un;
    
    


mysqli_close($conn);
ob_flush();

?>

<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Builder</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto Slab', serif;
        }
    </style>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
      <div class="position-relative" style="left: 900px;top:5px; ">
    <?php
    $id=$_SESSION['username'];
                    echo "<a href=\"bulma.php?username=$id\"> <span style=\"font-size: 30px; padding-right:15px;\" class=\"glyphicon glyphicon-home\"></span></a>";?>
  
<a href="#"><span style="font-size: 30px; padding-right: 15px;: "class="glyphicon glyphicon-refresh"></span></a>
<a href="login.php"><span style="font-size: 30px;"class="glyphicon glyphicon-off"></span></a>

</div>
        <h3 class="heading text-center" > Profile Management </h3>
        <hr size="20" width="75%" align="center" color="green">
    <br>

    <h5 class="heading text-center" > Projects</h5>
    <br>
    <form action="" method="POST">
<div class="form-row">
      
        <div class = "form-group col-md-12">
    
        <!-- <label for="type" class="hello" ><strong>Enter the Particulars :</strong></label> -->
        <div class="form-row">
        
             <div class="form-group col-md-12">
                <label for="pname">Project Name: </label>
                <input type="text" class="form-control" name="pname" placeholder="Enter the Project Name"
                     required>
                <br>
                
            </div>
            <label for="pname">Period: &nbsp &nbsp </label>
            <br>
            <div class="form-row">
            <div class="form-group col-md-5">
                

                <input type="month" class="form-control" name="duration" placeholder="Start">
                <br>
                
            </div>
            <label>&nbsp &nbsp to  &nbsp &nbsp </label>
            <div class="form-group col-md-5">
            
                <input type="month" class="form-control" name="duration1" placeholder="End">
                <br>
                
            </div>
            
            <div class="form-group col-md-2" style="margin-top: -15px;">
                <!-- <label for="pname">Duration: </label> -->
                <!-- <input type="text" class="form-control" name="pname" placeholder="Enter the Duration"> -->
                
                <input type="checkbox" name="current" value="1"> Current
                <br>
                
            </div></div>
            <div class="form-group col-md-12">
                <label for="pname">Objective: </label>
                <input type="text" class="form-control" name="obj" placeholder="Enter the Objective of the Project "
                     required>
                <br>
                
            </div>
            <div class="form-group col-md-12">
                <label for="pname">Tools or Techniques Used: </label>
                <input type="text" class="form-control" name="Tools" placeholder="Enter the Tools and Techniques used in the Project"
                     required>
                <br>
                
            </div>
            <div class="form-group col-md-12">
                <label for="pname">Outcome: </label>
                <input type="text" class="form-control" name="Outcome" placeholder="Enter the Outcome of the Project"
                     required>
                <br>
                
            </div>

        
        <div class="form-group col-md-12">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <input class="btn btn-default" type="submit" value="Save" name="submit"></input>
      </div></div>
      
       </div> </div> </div> </form>
    </div>
</body>
</html>