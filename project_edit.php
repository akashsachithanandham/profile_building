<?php
include "connect.php";
$pid = $_GET["pid"];
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
    $duration1 = mysqli_real_escape_string($conn, $_REQUEST['duration1']);
    $duration = new DateTime($duration);
    $duration1 = new DateTime($duration1);
    $duration = $duration + '-' + $duration1;
    if($duration !="current" && $duration == 0){
    echo "<script>alert(\"Enter the duration\")</script>";
  }
   else if($duration1 > $duration || $duration="current"){
    
    $sql = "UPDATE  profile_project  SET pname='$name', obj='$obj', tools='$Tools', duration='$duration',outcome='$Outcome' where pid='$pid'";
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

    }}}
    $sql = "SELECT * from profile_project where pid='$pid'";
    $result=$conn->query($sql);
    
while($row=$result->fetch_assoc()){
   
    $pid1 = $row['pid'];
    $pname1=$row['pname'];
    $duration1=$row['duration'];
    $outcome1=$row['outcome'];
    $obj1=$row['obj'];
    $tools1=$row['tools'];
}


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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        * {
            font-family: 'Roboto Slab', serif;
        }
    </style>
</head>
<body>

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
                <input type="text" class="form-control" value="<?php echo $pname1; ?>"name="pname" placeholder="Enter the Project Name"
                     required>
                <br>
                
            </div>
            <label for="pname">Period: &nbsp &nbsp </label>
            <br>
            <div class="form-row">
            <div class="form-group col-md-5">
                

                <input type="month" class="form-control" value="<?php echo $duration1; ?>"name="duration" placeholder="Start">
                <br>
                
            </div>
            <label>&nbsp &nbsp to  &nbsp &nbsp </label>
            <div class="form-group col-md-5">
            
                <input type="month" class="form-control" value="<?php echo $duration1;?>"name="duration1" placeholder="End">
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
                <input type="text" class="form-control" name="obj" value="<?php echo $obj1;?>"placeholder="Enter the Objective of the Project "
                     required>
                <br>
                
            </div>
            <div class="form-group col-md-12">
                <label for="pname">Tools or Techniques Used: </label>
                <input type="text" class="form-control" name="Tools" value="<?php echo $tools1;?>" placeholder="Enter the Tools and Techniques used in the Project"
                     required>
                <br>
                
            </div>
            <div class="form-group col-md-12">
                <label for="pname">Outcome: </label>
                <input type="text" class="form-control" name="Outcome" value="<?php echo $outcome1;?>"placeholder="Enter the Outcome of the Project"
                     required>
                <br>
                
            </div>
            
        
        <div class="form-group col-md-12 center-block">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Save</button>
      </div></div>
      <!-- <div class="form-group col-md-6">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit1">Save and Proceed</button>
      </div>
  </div> -->
       </div> </div> </div> </form>
    </div>
</body>

</body>
</html>