
<?php
class test1 extends \PHPUnit_Framework_TestCase
{
  public function testlogin()
  {  
    define('DB_SERVER','localhost:3307');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'php_resume');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

//test case 1 crct password and username
    
    $ret=mysqli_query($con,"SELECT * FROM signin WHERE emailid='admin' and password='admin'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
    $this->assertTrue(true);   
}
else{
    $this->assertTrue(false);  
}
      

// test case 2 wrong password and username

 
    $ret=mysqli_query($con,"SELECT * FROM signin WHERE emailid='admins' and password='admin'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
    $this->assertTrue(true);   
}
else{
    $this->assertTrue(false);  
}


    
  }
}