<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 Accordion</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500|Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
        margin: 20px;
    }
</style>
</head>
<body>
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
</body>
</html>                                                        