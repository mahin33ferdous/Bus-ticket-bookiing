
<?php
session_start();
$_SESSION['message']='';
require('../model/dbconnect.php');
$mysqli=new mysqli('localhost','root','','busbooking');
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if($_POST['password']==$_POST['cpassword'])
	{
		$name=$mysqli->real_escape_string($_POST['name']);
		$username=$mysqli->real_escape_string($_POST['username']);
		$password=$mysqli->real_escape_string($_POST['password']);
		$email=$mysqli->real_escape_string($_POST['email']);
		$contact=$mysqli->real_escape_string($_POST['contact']);
		$address=$mysqli->real_escape_string($_POST['address']);
		$avatar_path=$mysqli->real_escape_string('img/'.$_FILES['avatar']['name']);
		if(preg_match("!image!",$_FILES['avatar']['type']))
		{
			if(copy($_FILES['avatar']['tmp_name'],$avatar_path))
			{
				$_SESSION['name']=$name;
				$_SESSION['avatar']=$avatar_path;
				
				$sql1="select * from user where username='$username'";
				$res=mysqli_query($connection,$sql1);
				if(mysqli_num_rows($res)>0){
					 echo "<script type='text/javascript'>alert('Username already exists')</script>";
				}
		else{
			$sql1="select * from admin where username='$username'";
				$res=mysqli_query($connection,$sql1);
				if(mysqli_num_rows($res)>0){
					 echo "<script type='text/javascript'>alert('Username already exists')</script>";
				}
		else{
			$sql="INSERT INTO user(name,username,password,email,contact,address,image)"
			     ."VALUES('$name','$username','$password','$email','$contact','$address','$avatar_path')";
				 if($mysqli->query($sql)==true)
				 {$_SESSION['message']='Registration successfull! $name is added to the database';
			                      
								echo "<script type='text/javascript'>alert('Successfully added')</script>";
				 }
				 else{
					 $_SESSION['message']='user can not be added to the database';
					 echo "<script type='text/javascript'>alert('con not be added')</script>";
				 }	
		   }
			}
				 
			}
				 else{
					 $_SESSION['message']='File upload failed';
					 echo "<script type='text/javascript'>alert(' photo can not be uploaded')</script>";
				
					}
					
				 
				
				
			}
			 else{
				   $_SESSION['message']='Upload only png or JPG';
				   echo "<script type='text/javascript'>alert('upload only')</script>";
				 }
		}
		 else{
					 $_SESSION['message']='Two password did not matched';
					 echo "<script type='text/javascript'>alert('did not match')</script>";
				 }
	}
	
	

?>
<html>
<style>

header{
	 background-image:url("bus1.jpg") repeat 0,0; 
	 background-size:100% 100%;
	background-position: center;
    height:100vh;
}

</style>




<body style="background-color:#5f9ea0" >
	<header>

          <h1 style="color:white" >Create User Account</h1>
		<form action="registration.php" method="POST" enctype="multipart/form-data">
		<table align="center">

			<tr><td style="color:white" >Name</td>
				<td><input type="text" name="name" required></td>
			</tr>
			<tr><td style="color:white">User name</td>
				<td><input type="text" name="username" required></td>
			</tr>
			<tr><td style="color:white" >Password</td>
				<td><input type="password" name="password" required</td>
			</tr>
			<tr><td style="color:white" >Confirm Password</td>
				<td><input type="password" name="cpassword" required</td>
			</tr>
			<tr><td style="color:white" >Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			
			<tr><td style="color:white">Contact no</td>
				<td><input type="text" name="contact"></td>
			</tr>
			
			
			<tr><td style="color:white">Address</td>
				<td style="color:white"><textarea name="address" rows="4" cols="22"></textarea></td>
			</tr><br>
			
			<tr><td></td>
				<td><input type="text" name=""><input type="file" name="avatar" accept="image/*" required></div> </td>
			</tr>
			
			
			
			
			
			
			
			<tr><td></td>
			<td><input type="submit" name="submit" style="margin-left:75px" value="Create account">			
				
			</tr><br>
			<tr><td></td>
			<td> <a href="home.php">
			<input  type="button" style="margin-left:75px" value="Back">	
            </a>			
				
			</tr>
			</table>
						
						
		</form>
		
	
	</header>
	
</body>
</html>