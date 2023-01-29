<?php
	
 Class model{
public $connection;
public function add_user($name,$username,$password,$email,$contact,$address,$avatar_path){ 
//public function add_user($data){
 $servername='localhost';
$username='root';
$password='';
$dbname = "busbooking";
$connection=mysqli_connect($servername,$username,$password,"$dbname");
if(!$connection){
   die('Could not Connect My Sql:' .mysql_error());
}
/*$n=$data['name'];
$user=$data['username'];
$pass=$data['password'];
$em=$data['email'];
$con=$data['contact'];
$add=$data['address'];
$pic=$data['avatar'];*/
//$data1=implode(":",$data);

$sql="select * from user where username='$username'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

$sql1="select * from admin where username='$username'";
$result1 = mysqli_query($connection, $sql1) or die(mysqli_error($connection));
$count1 = mysqli_num_rows($result1);

$sql2="INSERT INTO user(name,username,password,email,contact,address,image)"
			     ."VALUES('$name','$username','$password','$email','$contact','$address','$$avatar_path')";
 			 
/*$sql2="INSERT INTO user(name,username,password,email,contact,address,image)
			     VALUES('". $data1['name'] ."','". $data1['username'] ."','$". $data1['password'] ."','". $data1['email'] ."','". $data1['contact'] ."','". $data1['address'] ."','". $data1['avatar'] ."')";	*/			 
$result2 = mysqli_query($connection, $sql2) or die(mysqli_error($connection));
$count2 = mysqli_num_rows($result2);				 

if($count == 1){


return 'userexists';

}
else if ($count1 == 1){


return 'adminexists';

}
else if($count2 == 1){

 return 'inserted';
}
else {
	  return 'notinserted';
}

			


}

public function add_bus($bname,$bmodel,$platform,$destination,$duedate,$dt,$at,$seat,$aseat,$cost){ 
 $servername='localhost';
$username='root';
$password='';
$dbname = "busbooking";
$connection=mysqli_connect($servername,$username,$password,"$dbname");
if(!$connection){
   die('Could not Connect My Sql:' .mysql_error());
}

$sql="select * from bus where bmodel='$bmodel'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);


$sql1="INSERT INTO bus(bmodel,bname,platform,destination,,duedate,dtime,atime,seat,aseat,cost)"
			     ."VALUES('$bmodel','$bname','$platform','$destination','$duedate','$dt','$$at','$seat','$aseat','$$cost')";
 			 
$result1 = mysqli_query($connection, $sql1) or die(mysqli_error($connection));
$count1 = mysqli_num_rows($result1);				 

if($count == 1){


return 'modelexists';

}
else if ($count1 == 1){


return 'inserted';

}

else {
	  return 'notinserted';
}

}

public function add_book($bname,$bmodel,$platform,$destination,$duedate,$dt,$at,$username,$seatnum,$cost){ 
 $servername='localhost';
$username='root';
$password='';
$dbname = "busbooking";
$connection=mysqli_connect($servername,$username,$password,"$dbname");
if(!$connection){
   die('Could not Connect My Sql:' .mysql_error());
}

$sql="select * from user where username='$username'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);


$sql1="select * from bus where aseat>'$seatnum'";
$result1 = mysqli_query($connection, $sql1) or die(mysqli_error($connection));
$count1 = mysqli_num_rows($result1);

$sql2="INSERT INTO busbook(bmodel,bname,platform,destination,,duedate,dtime,atime,username,seatnum,cost)"
			     ."VALUES('$bmodel','$bname','$platform','$destination','$duedate','$dt','$$at','$username','$seatnum','$$cost')";
 			 
$result2 = mysqli_query($connection, $sql2) or die(mysqli_error($connection));
$count2 = mysqli_num_rows($result2);				 

if(!$count == 1){


return 'nonExsistingUser';

}
else if ($count1 == 1){


return 'notEnoughSit';

}
else if ($count2 == 1){


return 'booked';

}

else {
	  return 'notbooked';
}

}
public function delete_user($username){ 
 $servername='localhost';
$username='root';
$password='';
$dbname = "busbooking";
$connection=mysqli_connect($servername,$username,$password,"$dbname");
if(!$connection){
   die('Could not Connect My Sql:' .mysql_error());
}

$sql="delete from user where username='$username'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if($count == 1){
return 'delete';
}

else {
	  return 'notdelete';
}
}
public function delete_bus($bmodel){ 
 $servername='localhost';
$username='root';
$password='';
$dbname = "busbooking";
$connection=mysqli_connect($servername,$username,$password,"$dbname");
if(!$connection){
   die('Could not Connect My Sql:' .mysql_error());
}

$sql="delete from bus where bmodel='$bmodel'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if($count == 1){
return 'delete';
}

else {
	  return 'notdelete';
}
}

public function cancel_book($bookid,$bmodel,$seatnum){ 
 $servername='localhost';
$username='root';
$password='';
$dbname = "busbooking";
$connection=mysqli_connect($servername,$username,$password,"$dbname");
if(!$connection){
   die('Could not Connect My Sql:' .mysql_error());
}

$sql="delete from busbook where bookid='$bookid'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);



if($count == 1){
	
	$sql1="update bus set aseat=aseat-'$seatnum' where bmodel='$bmodel'";
$result1 = mysqli_query($connection, $sql1) or die(mysqli_error($connection));
$count1 = mysqli_num_rows($result1);
if($count1==1)
{
	return 'updateseat';
}
return 'delete';
}

else {
	  return 'notdelete';
}
}

public function update_user($name,$username,$password,$email,$contact,$address,$avatar_path){ 
 $servername='localhost';
$username='root';
$password='';
$dbname = "busbooking";
$connection=mysqli_connect($servername,$username,$password,"$dbname");
if(!$connection){
   die('Could not Connect My Sql:' .mysql_error());
}

$sql1="select * from user where username='$username'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);


$sql="delete from busbook where bookid='$bookid'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);



if($count == 1){
	
	$sql1="update bus set aseat=aseat-'$seatnum' where bmodel='$bmodel'";
$result1 = mysqli_query($connection, $sql1) or die(mysqli_error($connection));
$count1 = mysqli_num_rows($result1);
if($count1==1)
{
	return 'updateseat';
}
return 'delete';
}

else {
	  return 'notdelete';
}
}
}


?>
