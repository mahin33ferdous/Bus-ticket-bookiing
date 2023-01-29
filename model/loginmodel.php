<?php

 Class model{
public $connection;
public function check_login($data){
	 $servername='localhost';
$username='root';
$password='';
$dbname = "busbooking";
$connection=mysqli_connect($servername,$username,$password,"$dbname");
if(!$connection){
   die('Could not Connect My Sql:' .mysql_error());
}
$user=$data['username'];
$pass=$data['password'];
//$query = "SELECT FROM user where username='".$data['username']."' and password='".$data['password'] ."'";
$query = "SELECT * FROM user where username='$user' and password='$pass'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
$query1 = "SELECT * FROM admin where username='$user' and password='$pass'";
//$query1 = "SELECT FROM `admin` where `username`='". $data['username'] ."' and `password`='".$data['password'] ."'";
 
$result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
$count1 = mysqli_num_rows($result1);
if ($count == 1){


return 'userlogin';

}
else if ($count1 == 1){


return 'adminlogin';

}
else{

 return 'invaliduser';
}
}
 }

?>
