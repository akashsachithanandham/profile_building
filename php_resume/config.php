<?php
/* phpcv - PHP Curriculum Vitae 0.1
 * Made by Pierre Mavro
*/

///////////////////////////////
// All versions (first part) //
///////////////////////////////


session_start();
ob_start();


//CONTACT INFO
$conn = new mysqli("localhost:3307","root","","php_resume");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

$id = $_GET['username'];
$name="SELECT DISTINCT * FROM profile_contact where username='$id'";
$get=mysqli_query($conn, $name);



while($row = mysqli_fetch_assoc($get))
{    $my_name=$row['name'];
	$my_mail=$row['email'];
	$phno = $row['phno'];

}

//CAREER OBJECTIVE
$name="SELECT DISTINCT * FROM profile_career where username='$id'";
$get=mysqli_query($conn, $name);



while($row = mysqli_fetch_assoc($get))
{    $career=$row['career'];
	
}
echo $career;


//AREAS OF INTEREST

$name="SELECT DISTINCT * FROM area where username='$id'";
$get=mysqli_query($conn, $name);



while($row = mysqli_fetch_assoc($get))
{    $skill1=$row['sk1'];
     $skill2=$row['sk2'];
     $skill3=$row['sk3'];
	
}

//OTHER TECHNICAL QUALIFICATIONS
$othertech = array();


$name="SELECT DISTINCT * FROM profile_othertech where username='$id'";
$get=mysqli_query($conn, $name);

while($row = mysqli_fetch_assoc($get)) {
  $othertech[] = $row['tech'];
}


//PROJECTS

$project_name = array();
$project_duration = array();
$project_obj = array();
$project_tools = array();
$project_outcome = array();



$name="SELECT DISTINCT * FROM profile_project where username='$id'";
$get=mysqli_query($conn, $name);

while($row = mysqli_fetch_assoc($get)) {
  $project_name[] = $row['pname'];
  $project_duration[] = $row['duration'];
  $project_obj[] = $row['obj'];
  $project_tools[] = $row['tools'];
  $project_outcome[] = $row['outcome'];
}


//INTERNSHIPS AND INPLANT TRAINING


$intern_name = array();
$intern_duration = array();
$intern_obj = array();
$intern_tools = array();
$intern_outcome = array();



$name="SELECT DISTINCT * FROM profile_intern where username='$id'";
$get=mysqli_query($conn, $name);

while($row = mysqli_fetch_assoc($get)) {
  $intern_name[] = $row['pname'];
  $intern_duration[] = $row['duration'];
  $intern_obj[] = $row['obj'];
  $intern_tools[] = $row['tools'];
  $intern_outcome[] = $row['outcome'];
}

//ACHIEVEMENTS AND CONTRIBUTIONS AND HONOURS


$a_name = array();
$a_area= array();
$a_ww = array();

$name="SELECT DISTINCT * FROM profile_achieve where username='$id'";
$get=mysqli_query($conn, $name);

while($row = mysqli_fetch_assoc($get)) {
  $a_name[] = $row['name'];
  $a_area[] = $row['area'];
  $a_ww[] = $row['ww'];
}

//EXTRA CURRICULARS

$extracur = array();


$name="SELECT DISTINCT * FROM profile_extra where username='$id'";
$get=mysqli_query($conn, $name);

while($row = mysqli_fetch_assoc($get)) {
  $extracur[] = $row['career'];
}




//$my_name = "Prenom Nom";
//$my_mail = "my@mail.fr";
$my_birth_day = "1";
$my_birth_month = "1";
$my_birth_year = "2000";
$secret = "mysecret";

///////////////
// Languages //
///////////////

//
// French Version
//
// if ($lang == 'fr')
// {
//     // <br /> has been added because of bug with wkhtmltopdf on letter-spacing
// 	$role = "Mon titre";
// 	$title = "$my_name | $role | $my_mail";
// 	$personnal_infos = array(
// 		"Mail : <a href=\"mailto:$my_mail\">$my_mail</a>");
// 	$personnal_infos_full = array(
// 		"<img src=\"myphoto.jpg\">Ma Photo</img>",
// 		birth_years_old($my_birth_day,$my_birth_month,$my_birth_year) . ' ans',
// 		"Tel : 01.01.01.01.01");
// 	$profile_title = "Profile";
// 	$profile_desc = "Description de mon profile";
// 	$aim_title = "Objectif";
// 	$aim_desc = "Description de mon objectif";
// 	$skills_name = "Compétences";
// 	$first_skill = "1ère compétence";
// 	$first_skill_desc = "Description de ma première compétence";
// 	$second_skill = "2ème compétence";
// 	$second_skill_desc = "Description de ma deuxième compétence";
// 	$third_skill = "3ème compétence";
// 	$third_skill_desc = "Description de ma troisème compétence";
// 	$knowledges_title = "Connaissances";
// 	$experience_title = "Expérience";
// 	$all_jobs = array(
// 		array(
// 			"Job2 - Nom de la société",
// 			"Mon titre",
// 			"20xx-" . date('Y'),
// 			"Description du travail effectué dans cette société"),
// 		array(
// 			"Job1 - Nom de la société",
// 			"Mon titre",
// 			"19xx-20xx",
// 			"Description du travail effectué dans cette société")
// 		);
// 	$education_title = "Formations";
// 	$all_education = array(
// 		array(
// 			"Formation 1"),
// 		array(
// 			"Formation 2",
// 			"Détail 1",
// 			"Détail 2"),
// 		array(
// 			"Diplôme d'école")
// 	);
// 	$others_title = "Divers";
// 	$all_others = array(
// 		array(
// 			"Divers 1",
// 			"Descriptif...",
// 			"Fin du descriptif"),
// 		array(
// 			"Divers 2",
// 			"Descriptif :")
// 	);
// 	$hobby_title = "Loisirs";
// 	$hobby_list = array(
// 		"1er loisir",
// 		"2ème loisir");
// }
//else
//
// English Version
//
//{
    // <br /> has been added because of bug with wkhtmltopdf on letter-spacing
	$role = "My title";
	$title = "$my_name | $role | $my_mail";
	$personnal_infos = array(
		"Mail : <a href=\"mailto:$my_mail\">$my_mail</a>");
	$personnal_infos_full = array(
		"<img src=\"myphoto.jpg\">My Photo</img>",
		birth_years_old($my_birth_day,$my_birth_month,$my_birth_year) . ' years old',
		"Tel : 01.01.01.01.01");
	$profile_title = "Objective";
	//$profile_desc = "Profile's description";
	$aim_title = "Other Technical Qualifications";
	$aim_desc = "Aim's description";
	$skills_name = "Areas of Technical Interest";
	$first_skill = "1st skill";
	$first_skill_desc = "1st skill description";
	$second_skill = "2nd skill";
	$second_skill_desc = "2nd skill description";
	$third_skill = "3rd skill";
	$third_skill_desc = "3rd skill description";
	$knowledges_title = "Knowledges";
	$experience_title = "Experiences";
	$all_jobs = array(
		array(
			"Job2 - Society name",
			"My title",
			"20xx-" . date('Y'),
			"Job accomplished in this society"),
		array(
			"Job1 - Society name",
			"My title",
			"19xx-20xx",
			"Job accomplished in this society")
		);
	$education_title = "Education";
	$all_education = array(
		array(
			"Training 2"),
		array(
			"Training 1",
			"Detail 1",
			"Detail 2"),
		array(
			"School diploma")
	);
	$others_title = "Others";
	$all_others = array(
		array(
			"Other 1",
			"Description...",
			"Ending description"),
		array(
			"Other 2",
			"Descriptiion :")
	);
	$hobby_title = "Hobbies";
	$hobby_list = array(
		"1st hobby",
		"2nd hobby");
//}

//////////////////////////////
// All versions (last part) //
//////////////////////////////

// Knowledges
$first_knowledges = array(
	"Tic",
	"Tac",
	"Toc"
	);
$second_knowledges = array(
	"Foo",
	"Bar"
	);
$third_knowledges = array(
	"Plic",
	"Plac",
	"Ploc"
	);

// Set list array for others
$others_list = array(
	"1 other",
	"2 other",
	"3 other",
	"4 other",
	"5 other",
	"6 other",
	"7 other");

//////////////////
// PDF settings //
//////////////////

// wkhtmltopdf binary path
$wkhtmltopdf_bin = "/usr/bin/wkhtmltopdf";
// Options
$options = "--no-background -B 10";
// URL to cv.php
$site = "http://www.mycvsite.fr/cv.php";
// Destination where to stock file (prefer tempory filesystem if possible)
$pdf_destination = "/tmp";
// PDF file name when downloaded
$pdf_filename = "";

?>
