<?php
// session_start();
// ob_start();
include "connect.php";



$id = $_GET['username'];
$_SESSION['username'] = $id; 
//echo $id;

$sql = "SELECT * FROM profile_contact where username='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $arrayName = [];
    while($row = $result->fetch_assoc()) {
        
      array_push($arrayName,$row);
    }
} 
else{
  $arrayName = null;
}
//var_dump($arrayName);
  
if (isset($_POST['submit'])){
    $sql = "SELECT * FROM profile_contact where username='$id'";
$result = $conn->query($sql);
if($result ->num_rows == 0){

    $name = mysqli_real_escape_string($conn, $_REQUEST['urname']);
   // echo $name;
    //$_SESSION['email']=$un;
    function get_email(){
      $email = mysqli_real_escape_string($conn, $_REQUEST['emailid']);

    }
    
    get_email();
    function get_phno(){
$phno = mysqli_real_escape_string($conn, $_REQUEST['phoneno']);
    }
    get_phno();
    $address = mysqli_real_escape_string($conn, $_REQUEST['address1']);
    
    $sql = "INSERT INTO profile_contact (username,name,email,phno,address) VALUES ('$id', '$name', '$email', '$phno', '$address')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:profile_career.php");

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
<html lang="en" xml:lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resume Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=2">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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

    <h5 class="heading text-center" > Contact Information </h5>
    <br>

    <h6 for="type" class="heading text-center" >First we have to complete your header.
This identifies your resume so employers can contact you.</h6>
    <br>
		<!-- <label for="type" class="hello" ><strong>Enter the Particulars :</strong></label> -->
    <form action="" method="POST">
      <div class="form-row">
        <div class = "form-group col-md-4">
          <?php
          include "accordion.php";?>
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
                <input type="tel" class="form-control" name="phoneno" minlength="10" maxlength="12" value="<?php echo $arrayName[0]['phno'];?>" placeholder="Enter the Phone Number"
                     required>
                <br>
             </div>
             <div class="form-group col-md-12">
                <label for="age">Address:</label>
                <input type="text" class="form-control" name="address1" value="<?php echo $arrayName[0]['address'];?>" placeholder="Enter the complete address with pincode of your city"
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