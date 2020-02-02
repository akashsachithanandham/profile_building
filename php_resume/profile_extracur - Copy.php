<?php
session_start();
ob_start();

$conn = new mysqli("localhost:3307","root","","php_resume");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
$id = $_GET['username'];
  
//echo $id;
if (isset($_POST['submit'])){
    

    $career = mysqli_real_escape_string($conn, $_REQUEST['career']);
    //echo $name;
    //$_SESSION['email']=$un;
    
    $sql = "INSERT INTO profile_extra (username,career) VALUES ('$id', '$career')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_extracur.php?username=$id");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}
if (isset($_POST['submit1'])){
    

    $career = mysqli_real_escape_string($conn, $_REQUEST['career']);
    //echo $name;
    //$_SESSION['email']=$un;
    
    $sql = "INSERT INTO profile_extra (username,career) VALUES ('$id', '$career')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:home.html");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}


mysqli_close($conn);
ob_flush();

?>


<!DOCTYPE html>
<html>
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
        .hi{
          vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="heading text-center" > Profile Management </h3>
        <hr size="20" width="75%" align="center" color="green">
    <br>

    <h5 class="heading text-center" > Extra Curricular Activities</h5>
    <br>
<form action="" method="POST">
    <div class="form-row">
        <div class = "form-group col-md-4">
          <div class="bs-example">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
                        <?php
  

  echo "<a href=\"profile.php?username=$id\">Contact Information</a>";
?>

</button>                 
                </h2>
            </div>
            
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><?php
  

  echo "<a href=\"profile_career.php?username=$id\">Carreer Highlights</a>";
?></button>
                </h2>
            </div>
            
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><?php
  

  echo "<a href=\"profile_areaofinterest.php?username=$id\">Areas of Interest</a>";
?></button>                     
                </h2>
            </div>
            
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><?php
  

  echo "<a href=\"profile_othertech.php?username=$id\">Other Technical Qualifications</a>";
?></button>                     
                </h2>
            </div>
            
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><?php
  

  echo "<a href=\"profile_project.php?username=$id\">Projects</a>";
?></button>                     
                </h2>
            </div>
            
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><?php
  

  echo "<a href=\"profile_intern.php?username=$id\">Internships and Inplant Training</a>";
?></button>                     
                </h2>
            </div>
            
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><?php
  

  echo "<a href=\"profile_achieve.php?username=$id\">Achievements and Honours</a>";
?></button>                     
                </h2>
            </div>
            
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><?php
  

  echo "<a href=\"profile_extracur.php?username=$id\">Extra Curricular Activities</a>";
?></button>                     
                </h2>
            </div>
            
        </div>
    </div>
</div>

        </div>

        <div class = "form-group d-flex justify-content-center col-md-8" style="vertical-align: middle;">
        <!-- <label for="type" class="hello" ><strong>Enter the Particulars :</strong></label> -->


        <div class="form-row" style="vertical-align: middle; margin-top: 150px;" >
        
             <div class="form-group col-md-12">
                <label for="pname">Description Details: </label>
                <input type="text" class="form-control" name="career" placeholder="Enter the Details"
                     required>
                <br>
                
            </div>
           
            
            
            
            
            

        
        <div class="form-group col-md-6">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Add Another</button>
      </div></div>
      <div class="form-group col-md-6">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit1">Save and Proceed</button>
      </div>
  </div>
       </div> </div></div></form>
    </div>
</body>
</html>