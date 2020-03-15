
<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Builder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="acc.css">
    <link rel="stylesheet" type="text/css" href="todo_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto Slab', serif;
        }
    </style>

    <meta charset="utf-8">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
    .bs-example{
        margin: 20px;
    }
    .accordion .fa{
        margin-right: 0.5rem;
    }
    .item{
      width: 300px;
      height: 300px;
    }
</style>

<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
          $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
</script>

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
    <script src="file_retrieve.js"></script>

    
</head>
<body>
<!-- <h1  class="title is-1 has-text-success" style="font-color:green;" >𝕡𝕣𝕠𝕗𝕚𝕝𝕖 𝕓𝕦𝕚𝕝𝕕𝕖𝕣</h1> -->
<div class="container" style="padding-bottom: 50px;">
<nav class="navbar navbar-default navbar-static-top" style="margin-top:-30px;  padding-top: 35px;"> 
    
      <div class="col-md-12">
        <div class="navbar-header">
            
        
            <div class="form-row">
            <div class="col-md-9">
            <a class="navbar-brand weight-300" href="#">
                <h1 style="margin-top: -40px; margin-left: 40px;">𝕡𝕣𝕠𝕗𝕚𝕝𝕖 𝕓𝕦𝕚𝕝𝕕𝕖𝕣</h1>
            </a>
          </div>
          <div class="col-md-1">
            <img style="margin-left:25px;" id=myimg width="50" height="50"  />
          </div>
          <div class="col-md-2"> <a  style="margin-left: 40px;" class="button is-primary" href="login.php">
           <strong> Log out </strong>
          </a></div></div>
            
        </div>
        
    
<!-- <nav class="navbar" role="navigation" aria-label="main navigation">
   -->

 </div>   
  
</nav>
<?php
$id = $_GET['username']; 
$_SESSION['username'] = $id; 
//echo $_SESSION['username'];?>
<div class="form-row">
<div class="col-md-4" style="margin-left: -20px;">
<div class="bs-example">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><em class="fa fa-plus"></em> Profile Management</button>                  
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <?php
                    echo "<a href=\"profile.php?username=$id\">Update Profile</a><br>";
                    //echo "<a href=\"profile.php?username=$id\">View Profile</a><br>";
                    //echo "<a href=\"profile.php?username=$id\">Edit Profile</a><br>";
                    ?>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><em class="fa fa-plus"></em> Resume Generator</button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <?php
                    echo "<a href=\"cv.php?username=$id\">Preview Resume</a><br>";
                    //echo "<a href=\"download.php?username=$id\">Generate PDF</a><br>";
                    //echo "<a href=\"profile.php?username=$id\">View Profile</a><br>";
                    //echo "<a href=\"profile.php?username=$id\">Edit Profile</a><br>";
                    ?>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseFour"><em class="fa fa-plus"></em> My TODO LIST</button>                  
                </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <?php
                    echo "<a href=\"todo.php?username=$id\">View List</a><br>";
                    ?>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><em class="fa fa-plus"></em> Settings</button>                     
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <a href="jss.php"> Change Password </a><br>
                    <!-- <a href="#"> View Account Information</a><br> -->
                    <?php
                    echo "<a href=\"profilepicture_firebase.html?username=$id\"> Upload Profile Picture </a><br>";?>


                </div>
            </div>
        </div>
         <div class="card">
            <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"><em class="fa fa-plus"></em> Job Recommendations</button>                     
                </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <?php
                    echo "<a href=\"recommend.php?username=$id\"> My Feed </a><br>";?>
                    


                </div>
            </div>
        </div>
    
    
</div></div></div>
  

<div class="col-md-8" width="850" height="500" style="margin-top: 30px;">
  
<!-- <div class="feedgrabbr_widget" id="fgid_2b538892b93c0c03f1f35dab9"></div>
<script>if (typeof (fg_widgets) === "undefined") fg_widgets = new Array(); fg_widgets.push("fgid_2b538892b93c0c03f1f35dab9");</script>
<script async src="https://www.feedgrabbr.com/widget/fgwidget.js"></script> -->

<!-- <rssapp-list id="9hYdZV23sASMl18a"></rssapp-list><script src="https://widget.rss.app/v1/list.js" type="text/javascript" async></script>
 -->
<div class="form-row">
  <div class="col-md-12">
<!-- <iframe width="750" height="700" src="https://rss.app/embed/v1/9hYdZV23sASMl18a" frameBorder="0" title="News" 
></iframe></div>
 -->
<!-- <rssapp-list id="rh2o1MLIyB6NAiqQ"></rssapp-list><script src="https://widget.rss.app/v1/list.js" type="text/javascript" async></script>
  <div class="col-md-12" width="500" height="200">
     -->

     <!-- <rssapp-list id="QsjP538GOiqAPmnc"></rssapp-list><script src="https://widget.rss.app/v1/list.js" type="text/javascript" async></script> -->

     <rssapp-list id="OC8XatyksB4JPj9w"></rssapp-list><script src="https://widget.rss.app/v1/list.js" type="text/javascript" async></script>
  </div>
</div>


</div>

</body>

</html>