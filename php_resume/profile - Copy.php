<?php
session_start();
ob_start();

$conn = new mysqli("localhost:3307","root","","php_resume");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

$id = $_SESSION['username'];
echo $id;

$sql = "SELECT * FROM profile_contact where username='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $arrayName = [];
    while($row = $result->fetch_assoc()) {
        
      array_push($arrayName,$row);
    }
} 
//var_dump($arrayName);
  
if (isset($_POST['submit'])){
    $sql = "SELECT * FROM profile_contact where username='$id'";
$result = $conn->query($sql);
if($result ->num_rows == 0){

    $name = mysqli_real_escape_string($conn, $_REQUEST['urname']);
   // echo $name;
    //$_SESSION['email']=$un;
    $email = mysqli_real_escape_string($conn, $_REQUEST['emailid']);
    $phno = mysqli_real_escape_string($conn, $_REQUEST['phoneno']);
    $address = mysqli_real_escape_string($conn, $_REQUEST['address1']);
    
    $sql = "INSERT INTO profile_contact (username,name,email,phno,address) VALUES ('$id', '$name', '$email', '$phno', '$address')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_career.php?username=$id");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}
else{

  $name = mysqli_real_escape_string($conn, $_REQUEST['urname']);
   // echo $name;
    //$_SESSION['email']=$un;
    $email = mysqli_real_escape_string($conn, $_REQUEST['emailid']);
    $phno = mysqli_real_escape_string($conn, $_REQUEST['phoneno']);
    $address = mysqli_real_escape_string($conn, $_REQUEST['address1']);
    
    $sql = "UPDATE profile_contact set name = '$name', email='$email', phno = '$phno', address='$address' where username='$id'";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_career.php?username=$id");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
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

    <h5 class="heading text-center" > Contact Information </h5>
    <br>

    <h6 for="type" class="heading text-center" >First we have to complete your header.
This identifies your resume so employers can contact you.</h6>
    <br>
		<!-- <label for="type" class="hello" ><strong>Enter the Particulars :</strong></label> -->
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
		<div class="form-row">
            <div class="form-group col-md-12">
                <label for="pname">Your Name:</label>
                <input type="text" class="form-control" name="urname" value="<?php echo $arrayName[0]['name'];?>" placeholder="Enter the Name you need in your Resume"
                     required>
                <br>
                
            </div>
            <div class="form-group col-md-12">
                <label for="age">Email:</label>
                <input type="email" class="form-control" name="emailid" value="<?php echo $arrayName[0]['email'];?>" placeholder="Enter the EmailId you need in your Resume"
                     required>
                <br>
             </div>
             <div class="form-group col-md-12">
                <label for="age">Contact Number:</label>
                <input type="tel" class="form-control" name="phoneno" value="<?php echo $arrayName[0]['phno'];?>" placeholder="Enter the Phone Number"
                     required>
                <br>
             </div>
             <div class="form-group col-md-12">
                <label for="age">Address:</label>
                <input type="tel" class="form-control" name="address1" value="<?php echo $arrayName[0]['address'];?>" placeholder="Enter the complete address with pincode of your city"
                     required>
                <br>
             </div>
             
            

        </div>
        <div class="form-group col-md-12">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Next</button>
      </div></div>
    </div></div>
      </form>
	</div>
</body>
</html>