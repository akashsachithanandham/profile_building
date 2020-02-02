<?php
session_start();
ob_start();

$conn = new mysqli("localhost:3307","root","","php_resume");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
$id = $_GET['username'];
  
//echo $id;
if (isset($_POST['submit'])){
    
    $name = mysqli_real_escape_string($conn, $_REQUEST['pname']);
    $obj = mysqli_real_escape_string($conn, $_REQUEST['obj']);
    $Tools = mysqli_real_escape_string($conn, $_REQUEST['Tools']);
    $Outcome = mysqli_real_escape_string($conn, $_REQUEST['Outcome']);
    if(isset($_POST['current']) && 
   $_POST['current'] == '1') 
{
  $duration = "current";
}
else
{
    $duration = mysqli_real_escape_string($conn, $_REQUEST['duration']);
}  
    //echo $name;
    //$_SESSION['email']=$un;
    
    $sql = "INSERT INTO profile_intern (username,pname,duration,obj,tools,outcome) VALUES ('$id', '$name', '$duration', '$obj', '$Tools','$Outcome')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_intern.php?username=$id");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}
if (isset($_POST['submit1'])){
    
$name = mysqli_real_escape_string($conn, $_REQUEST['pname']);
    $obj = mysqli_real_escape_string($conn, $_REQUEST['obj']);
    $Tools = mysqli_real_escape_string($conn, $_REQUEST['Tools']);
    $Outcome = mysqli_real_escape_string($conn, $_REQUEST['Outcome']);
    if(isset($_POST['current']) && 
   $_POST['current'] == '1') 
{
  $duration = "current";
}
else
{
    $duration = mysqli_real_escape_string($conn, $_REQUEST['duration']);
}  
    //echo $name;
    //$_SESSION['email']=$un;
    
    $sql = "INSERT INTO profile_intern (username,pname,duration,obj,tools,outcome) VALUES ('$id', '$name', '$duration', '$obj', '$Tools','$Outcome')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_achieve.php?username=$id");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
    
    }

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
    </style>
</head>
<body>
    <div class="container">
        <h3 class="heading text-center" > Profile Management </h3>
        <hr size="20" width="75%" align="center" color="green">
    <br>

    <h5 class="heading text-center" > Internship or Inplant Training</h5>
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
        <div class = "form-group col-md-8">
        <!-- <label for="type" class="hello" ><strong>Enter the Particulars :</strong></label> -->
        <div class="form-row">
        
             <div class="form-group col-md-12">
                <label for="pname">Organization/Location: </label>
                <input type="text" class="form-control" name="pname" placeholder="Enter the Organization name"
                     required>
                <br>
                
            </div>
            <div class="form-group col-md-8">
                <label for="pname">Period: </label>
                <input type="text" class="form-control" name="duration" placeholder="Enter the Duration">
                <br>
                
            </div>
            <div class="form-group col-md-4">
                <!-- <label for="pname">Duration: </label> -->
                <!-- <input type="text" class="form-control" name="pname" placeholder="Enter the Duration"> -->
                <br>
                <br>
                <input type="checkbox" name="current" value="1"> Current
                <br>
                
            </div>
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
                <label for="pname">Outcome </label>
                <input type="text" class="form-control" name="Outcome" placeholder="Enter the Outcome of the Project"
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
       </div> </div> </div></form>
    </div>
</body>
</html>