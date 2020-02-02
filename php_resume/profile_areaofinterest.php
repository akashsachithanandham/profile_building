<?php
session_start();
ob_start();

$conn = new mysqli("localhost:3307","root","","php_resume");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
$id = $_GET['username'];
  //$id="e@gmail.com";
//echo $id;

$sql = "SELECT * FROM area where username='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $arrayName = [];
    while($row = $result->fetch_assoc()) {
        
      array_push($arrayName,$row);
    }
} 
if (isset($_POST['submit'])){
    
$sql = "SELECT username FROM area where username='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // output data of each row
  




    $sk1 = mysqli_real_escape_string($conn, $_REQUEST['skill1']);
   // echo $name;
    //$_SESSION['email']=$un;
    $sk2 = mysqli_real_escape_string($conn, $_REQUEST['skill2']);
    $sk3 = mysqli_real_escape_string($conn, $_REQUEST['skill3']);
    $address = mysqli_real_escape_string($conn, $_REQUEST['address1']);
    
    $sql = "INSERT INTO area (username,sk1,sk2,sk3) VALUES ('$id', '$sk1', '$sk2', '$sk3')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_othertech.php?username=$id");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}
else{
    $sk1 = mysqli_real_escape_string($conn, $_REQUEST['skill1']);
   // echo $name;
    //$_SESSION['email']=$un;
    $sk2 = mysqli_real_escape_string($conn, $_REQUEST['skill2']);
    $sk3 = mysqli_real_escape_string($conn, $_REQUEST['skill3']);
    //$address = mysqli_real_escape_string($conn, $_REQUEST['address1']);
    $sql = "UPDATE area SET sk1 = '$sk1', sk2='$sk2', sk3='$sk3' WHERE username='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location:profile_othertech.php?username=$id");
} else {
    echo "Error updating record: " . $conn->error;
}
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
		<h3 class="heading text-center" > Profile Management </h3>
		<hr size="20" width="75%" align="center" color="green">
    <br>

    <h5 class="heading text-center" > Areas of Technical Interest </h5>
    <br>
    <form action="" method="POST">

    <div class="form-row">
    <div class="form-group col-md-4">
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
    <div class="form-group col-md-8">
    
		<!-- <label for="type" class="hello" ><strong>Enter the Particulars :</strong></label> -->
		
        
             <div>
                <label for="test_names"><strong>Skill no 1: </strong></label>
                <input type="text" class="form-control" name="skill1" value="<?php echo $arrayName[0]['sk1'];?>" placeholder="Enter Your high proficiency skill"
                     required>
                <br>
            </div>
            <div>
                <label for="test_result"><strong>Skill no 2:</strong></label>
                <input type="text" class="form-control" name="skill2"  value="<?php echo $arrayName[0]['sk2'];?>" placeholder="Enter Your medium proficiency skill"
                     required>
                <br>
            </div>
            <div>
                <label for="normal_range"><strong>Skill no 3:</strong></label>
                <input type="text" class="form-control" name="skill3" value="<?php echo $arrayName[0]['sk3'];?>" placeholder="Enter Your intermediate proficiency skill"
                     required>
                <br>
            </div>
            <!-- <div class="form-group col-md-4">
                <label for="start">Date:</label>

                 <input type="date" class="form-control"id="dateValue" placeholder="Enter Date" required 
                        
                                     min="2019-01-01" max="2019-12-31">
                <br>
             </div> -->

        
        <div>
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Next</button>
      </div></div>
       
  </div></div></form>
	</div>
</body>
</html>