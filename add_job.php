<?php

include "connect.php";
$id = $_SESSION['username'];
  
//echo $id;
if (isset($_POST['submit'])){
    
    $offer = mysqli_real_escape_string($conn, $_REQUEST['offer']);
    $field = mysqli_real_escape_string($conn, $_REQUEST['field']);
    $location = mysqli_real_escape_string($conn, $_REQUEST['location']);
    $link = mysqli_real_escape_string($conn, $_REQUEST['link']);
   
    
    $sql = "INSERT INTO job_det (offer,field,location,link) VALUES ('$offer', '$field', '$location', '$link')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:add_job.php");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
    
    
   }

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
    
</head>
<body>
    <div class="container">
        <h3 class="heading text-center" > Profile Builder </h3>
        <hr size="20" width="75%" align="center" color="green">
    <br>

    <h5 class="heading text-center" > Add Jobs For User</h5>
    <br>
<form action="" method="POST">
    <div class="form-row">
        
        <div class = "form-group col-md-12">
        <!-- <label for="type" class="hello" ><strong>Enter the Particulars :</strong></label> -->
        <div class="form-row">
        
             <div class="form-group col-md-12">
                <label for="pname">Offer For: </label>
                <input type="text" class="form-control" name="offer" placeholder="Enter the Organization name"
                     required>
                <br>
                
            </div>
            
            <div class="form-group col-md-12">
                <label for="pname">Field: </label>
                <input type="text" class="form-control" name="field" placeholder="Enter the Objective of the Project "
                     required>
                <br>
                
            </div>
            <div class="form-group col-md-12">
                <label for="pname">Organization/Location: </label>
                <input type="text" class="form-control" name="location" placeholder="Enter the Tools and Techniques used in the Project"
                     required>
                <br>
                
            </div>
            <div class="form-group col-md-12">
                <label for="pname">Application Link: </label>
                <input type="text" class="form-control" name="link" placeholder="Enter the Outcome of the Project"
                     required>
                <br>
                
            </div>
            

        
        <div class="form-group col-md-12">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Save</button>
      </div></div>
      
       </div> </div> </div></form>
    </div>
</body>
</html>