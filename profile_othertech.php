<?php

include "connect.php";
$id = $_SESSION['username'];
  
//echo $id;
if (isset($_POST['submit'])){
    

    $tech = mysqli_real_escape_string($conn, $_REQUEST['tech']);
    //echo $name;
    //$_SESSION['email']=$un;
    
    $sql = "INSERT INTO profile_othertech (username,tech) VALUES ('$id', '$tech')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_othertech.php");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}
if (isset($_POST['submit1'])){
    

    $tech = mysqli_real_escape_string($conn, $_REQUEST['tech']);
    //echo $name;
    //$_SESSION['email']=$un;
    
    $sql = "INSERT INTO profile_othertech (username,tech) VALUES ('$id', '$tech')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_project.php");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}

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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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

    <h5 class="heading text-center" > Other Technical Qualifications </h5>
    <br>
<form action="" method="POST">
    <div class="form-row">
        <div class = "form-group col-md-4">
           <?php
          include "accordion.php";?>

        </div>
        <div class = "form-group d-flex justify-content-center col-md-8" style="vertical-align: middle;">
        <!-- <label for="type" class="hello" ><strong>Enter the Particulars :</strong></label> -->


        <div class="form-row" style="vertical-align: middle; margin-top: 150px;" >
        
        
             <div class="form-group col-md-12">
                <label for="pname">Description Details: </label>
                <input type="text" class="form-control" name="tech" placeholder="Enter details regarding your Technical Qualification"
                     required>
                <br>
                
            </div>
            <!-- <div class="form-group col-md-4">
                <label for="start">Date:</label>

                 <input type="date" class="form-control"id="dateValue" placeholder="Enter Date" required 
                        
                                     min="2019-01-01" max="2019-12-31">
                <br>
             </div> -->

        
        <div class="form-group col-md-6">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Add Another</button>
      </div></div>
      <div class="form-group col-md-6">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit1">Save and Proceed</button>
      </div>
  </div>
       </div> </div></div>
   </form>
    </div>
</body>
</html>