<?php
include "connect.php"; ?>
<html>
<head>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto Slab', serif;
        }
    </style>

	<script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>   

    <script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-storage.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-analytics.js"></script>

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
 <style type="text/css">
    	.form-row{
    		margin-left: 25%;
    		margin-right: 25%;
    	}
    </style>
<script type="text/javascript">
window.onload = function(){
   document.getElementById('send').onclick = function(e){
   	var pass1 = document.getElementById("name").value;
   	var pass2 = document.getElementById("name1").value
       //console.log(document.getElementById("name").value);
       //console.log(document.getElementById("name1").value);
       console.log(pass1);
       console.log(pass2);
       if(document.getElementById("name").value == document.getElementById("name1").value){
       	console.log("same");
       	changepass(pass1);
       }
       else{
       	console.log("diff");
       }
       return false;
   }
}
function changepass(pass1){
    		//alert("inside");
    	var user = firebase.auth().currentUser;
    	console.log(user.uid);
var newPassword = pass1;
console.log(newPassword);
user.updatePassword(newPassword).then(function() {
  console.log("successful");// Update successful.
}).catch(function(error) {
  // An error happened.
  console.log("error");
});
}
</script>

</head>
<!-- <form method="post">
<input type="text" name="name" id="name" />
<input type="text" name="name1" id="name1" />

<input type="submit" name="send" id="send" value="send" />
</form> -->

<body>

<div class="container">
	<div class="position-relative" style="left: 900px;top:5px; ">
		<?php
		$id=$_SESSION['username'];
                    echo "<a href=\"bulma.php?username=$id\"> <span style=\"font-size: 30px; padding-right:15px;\" class=\"glyphicon glyphicon-home\"></span></a>";?>
	
<a href="#"><span style="font-size: 30px; padding-right: 15px;: "class="glyphicon glyphicon-refresh"></span></a>
<a href="login.php"><span style="font-size: 30px;"class="glyphicon glyphicon-off"></span></a>

</div>
        <h1 class=" text-center" > Profile Builder</h1>
        <hr size="20" width="100%" align="center" color="green">
    <br>

    <h3 class=" text-center" > Change Password</h3>
    <br>
    <form  method="POST" >
<div class="form-row">
<div class="form-group col-md-12">
                <label for="pname">New Password: </label>
                <input type="password" class="form-control" id="name" placeholder="Enter the Password"
                     required>
                <br></div>

</div>
<div class="form-row">
<div class="form-group col-md-12">
                <label for="pname">Confirm Password: </label>
                <input type="password" class="form-control" id="name1" placeholder="Re-enter the Same Password"
                     required>
                <br></div>
                
</div>
<div class="form-group col-md-12 center-block">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <input type="submit" name="send" id="send" value="submit" />
      </div></div>
</form>
</div>

</body>
</html>