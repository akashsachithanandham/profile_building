<?php
include "connect.php";

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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        * {
            font-family: 'Roboto Slab', serif;
        }
    </style>
    <style>
        * {
            font-family: 'Roboto Slab', serif;
        }
    </style>
    <style>
    .inlin{
        display:inline-block;
        width:80%;
        margin-left:10%;
        margin-right:10%;
        padding: 5%;
        margin-top:5%;
    }
       .but  {
  background: none;
  color: inherit;
  border: none;
  padding: 0;
  font: inherit;
  cursor: pointer;
  outline: inherit;
}

.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
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

<div class="container" style="padding-bottom: 50px;">
	<div class="position-relative" style="left: 900px;top:5px; ">
		<?php
		$id=$_SESSION['username'];
                    echo "<a href=\"bulma.php?username=$id\"> <span style=\"font-size: 30px; padding-right:15px;\" class=\"glyphicon glyphicon-home\"></span></a>";?>
	
<a href="#"><span style="font-size: 30px; padding-right: 15px;: "class="glyphicon glyphicon-refresh"></span></a>
<a href="login.php"><span style="font-size: 30px;"class="glyphicon glyphicon-off"></span></a>

</div>
	 <?php 
            $id = $_GET['username'];//in 

$sql1 = "SELECT * FROM  area where username='$id'";
    $result=$conn->query($sql1);
while($row=$result->fetch_assoc()){
   
    $sk1 = $row['sk1'];
    $sk2=$row['sk2'];
    $sk3=$row['sk3'];
    
    }


$sql = "SELECT * from job_det where field='$sk1' or field='$sk2' or field='$sk3' ";
    $result=$conn->query($sql);
    
while($row=$result->fetch_assoc()){
   
    $offer = $row['offer'];
    $field=$row['field'];
    $location=$row['location'];
    $link=$row['link'];
    
    
     
    echo"
    <div class=\"inlin card\">
        <h4> Offer For: $offer </h4>
        <h5> Field: $field</h5>
        <h5> Organization/Location: $location</h5>
        <a href =\"$link\">Apply Now </a>
         
 </div>
    ";
    
    
    ;
}?>
</div>
</body>
</html>