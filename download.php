<?php 
  
// header("Content-Type: application/octet-stream"); 
  
// $file = "http://localhost/php_resume/cv.php?username=".$_GET["username"]  . ".pdf"; 
  
// header("Content-Disposition: attachment; filename=" . urlencode($file));    
// header("Content-Type: application/download"); 
// header("Content-Description: File Transfer");             
// header("Content-Length: " . filesize($file)); 
  
// flush(); // This doesn't really matter. 
// echo $file;
  
// $fp = fopen($file, "r"); 
// while (!feof($fp)) { 
//     echo fread($fp, 65536); 
//     flush(); // This is essential for large downloads 
// }  
  
// fclose($fp);  
?> 

<?php
$id = $_GET['username'];
$site = 'http://localhost/php_resume/cv.php?username='.$id;
$title = 'myPDF'; // Your own title
//if(isset($title)){$title=$_POST['title'];}else{$title=null;}
include("mpdf.php"); //include mpdf.php file from mPDF library

 

$mpdf=new mPDF('win-1252','A4','','',15,10,16,10,10,10);//A4 page in portrait for landscape add -L.
$mpdf->SetHeader($title);
$mpdf->setFooter('{PAGENO}');
$mpdf->useOnlyCoreFonts = true; 
$mpdf->SetDisplayMode('fullpage');
ob_start();
?>
<?php
$file = file_get_contents($site);
echo $file; //this is webpage content
 ?>
<?php 
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($html);
//$mpdf->SetProtection(array(), 'user', 'password'); uncomment to protect your pdf page with password. // If you want to use password.
$mpdf->Output('myPDF.pdf','D');
exit;
?>