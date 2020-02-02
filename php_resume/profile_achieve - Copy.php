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

    $area = mysqli_real_escape_string($conn, $_REQUEST['area']);
    
    $when = mysqli_real_escape_string($conn, $_REQUEST['when']);
    
    //echo $name;
    //$_SESSION['email']=$un;
    
    $sql = "INSERT INTO profile_achieve (username,name,area,ww) VALUES ('$id', '$name', '$area', '$when')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_achieve.php?username=$id");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}
if (isset($_POST['submit1'])){
    

     $name = mysqli_real_escape_string($conn, $_REQUEST['pname']);

    $area = mysqli_real_escape_string($conn, $_REQUEST['area']);
    
    $when = mysqli_real_escape_string($conn, $_REQUEST['when']);
    
 $sql = "INSERT INTO profile_achieve (username,name,area,ww) VALUES ('$id', '$name', '$area', '$when')";    
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_extracur.php?username=$id");

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
    </style>
</head>
<body>
    <div class="container">
        <h3 class="heading text-center" > Profile Management </h3>
        <hr size="20" width="75%" align="center" color="green">
    <br>

    <h5 class="heading text-center" > Achievements, Scholarships, Honours, Contribution, etc</h5>
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
                <label for="pname">Name: </label>
                <input type="text" class="form-control" name="pname" placeholder="Enter the Organization name"
                     required>
                <br>
                
            </div>
            <div class="form-group col-md-12">
                <label for="pname">Area / Topic / Details </label>
                <input type="text" class="form-control" name="area" placeholder="Enter the Details as comma separated format">
                <br>
                
            </div>
            
            <div class="form-group col-md-12">
                <label for="pname">When and Where: </label>
                <input type="text" class="form-control" name="when" placeholder="Enter the Date and Venue as comma separated format"
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
       </div> </div> </div></form>
    </div>
</body>
</html>