<?php
 require('../model/dbconnect.php');
 //function getposts()
 $uname="";
 $user="";
 $pass="";
 $e="";
 $cont="";
 $add="";
 
 if(isset($_POST['submit']))
 {
	 $mysqli=new mysqli('localhost','root','','busbooking');
	 { if($_SERVER['REQUEST_METHOD']=='POST')

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
			                      
								echo "<script type='text/javascript'>alert('Successfully user added')</script>";
				 }
				 else{
					 $_SESSION['message']='user can not be added to the database';
					 echo "<script type='text/javascript'>alert('user con not be added')</script>";
				 }
				}
		      }
			}
				 else{
					 $_SESSION['message']='File upload failed';
					 echo "<script type='text/javascript'>alert(' photo not be uploaded')</script>";
				
					}
					
				 
				
				
			}
			 else{
				   $_SESSION['message']='Upload only png or JPG';
				   echo "<script type='text/javascript'>alert('upload only')</script>";
				 }
		}
		 else{
					 $_SESSION['message']='Two password did not matched';
					 echo "<script type='text/javascript'>alert('Two password did not match')</script>";
				 }
	}
}
else if(isset($_POST['submit2']))
{
	$qry=mysqli_query($connection,"update user set name='".$_POST["name"]."', username='".$_POST["username"]."', password='".$_POST["password"]."', email='".$_POST["email"]."', contact='".$_POST["contact"]."', address='".$_POST["address"]."' where username='".$_GET["edit"]."'");
	header( "Location: Manageuser.php");
}
if(isset($_GET['delete']))
{ $qry=mysqli_query($connection,"delete from user where username='".$_GET["delete"]."'");
          header( "Location: Manageuser.php");
		 }
else if(isset($_GET['edit']))
  {
	$qry=mysqli_query($connection,"select * from user where username='".$_GET["edit"]."'");
	while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
					$uname=$row["name"];
					$user=$row["username"];
					$pass=$row["password"];
					$e=$row["email"];
					$cont=$row["contact"];
					$add=$row["address"];
          //header( "Location: Manageuser.php");
   }
  }
/*if(isset($_post['delete'])) 
	 {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
				
            $emp_id = $_POST['username'];
			$pass=$_POST['password'];
            
            $sql = "DELETE FROM user WHERE username = $emp_id and password=$pass";
            mysql_select_db('busbooking');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not delete data: ' . mysql_error());
            }
            
            echo "Deleted data successfully\n";
            
            mysql_close($conn);
         }*/
		
/*if(isset($_post['delete']))
{$mysqli=new mysqli('localhost','root','','busbooking');
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
			$username=$mysqli->real_escape_string($_POST['username']);
		$password=$mysqli->real_escape_string($_POST['password']);
	//$mysqli=new mysqli('localhost','root','','busbooking');
		//$sql=mysqli_query($connection,"DELETE FROM user WHERE 'username'='$username' and 'password'='$password'");
			//$sql=mysqli_query($connection,"DELETE FROM user WHERE username='".$_GET["submit1"]."'");
			   $sql="DELETE FROM user WHERE username='".$username."' and password='".$password."'";
			   //$result=mysqli_query($connection,$sql);
				 if($mysqli->query($sql)==true)
				 {$_SESSION['message']='Registration successfull! $name is added to the database';
			                      
								echo "<script type='text/javascript'>alert('deleted')</script>";
				 }
				 else {echo " error";}
				 $mysqli->close();
	}
}*/


 else if(isset($_POST['submit3']))
 {
	/*$qry=mysqli_query($connection,"select * from user where username='".$_POST["search"]."'");
	while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
					$uname=$row["name"];
					$user=$row["username"];
					$pass=$row["password"];
					$e=$row["email"];
					$cont=$row["contact"];
					$add=$row["address"];
	}
}
	else
{
	$query=mysqli_query($connection,"select * from user");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
					$uname=$row["name"];
					$user=$row["username"];
					$pass=$row["password"];
					$e=$row["email"];
					$cont=$row["contact"];
					$add=$row["address"];
	
	
}
          }*/
}


if(isset($_POST['search']))
{}
	

/*function searchable($query)
{
	$con=mysqli_connect("localhost","root","","mahin");
}*/
?>
<html>
<style>

header{
	 background-image:url("bus1.jpg") repeat 0,0; 
	 background-size:100% 100%;
	background-position: center;
    height:100vh;
}
.search{
	width:60%;
	padding:5px;
	font-size:20px;
}
.searchsubmit{
	width:15%;
	padding:5px;
	font-size:20px;
	Background-color:#333399;
	color:white;
}
.t1{
	border: 1px solid black;
	cursor: pointer; transition:all .25s ease-in-out;
}
.t1:hover
{
	background-color:#ddd;
}


</style>




<body style="background-color:#5f9ea0" >
	<header>
	<title> </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

          <h1 style="color:white" >Manage User</h1>
		<form action="" method="POST" enctype="multipart/form-data">
		<table align="center">
              
			<tr><td style="color:white" >Name</td>
				<td><input type="text" name="name" id="name" value="<?php echo $uname;?>" required></td>
			</tr>
			<tr><td style="color:white">User name</td>
				<td><input type="text" name="username" id="username" value="<?php echo $user;?>" required></td>
			</tr>
			<tr><td style="color:white" >Password</td>
				<td><input type="password" name="password" id="password"value="<?php echo $pass;?>"  required</td>
			</tr>
			<tr><td style="color:white" >Confirm Password</td>
				<td><input type="password" name="cpassword" id="cpass" required</td>
			</tr>
			<tr><td style="color:white" >Email</td>
				<td><input type="text" name="email" id="email" value="<?php echo $e;?>"></td>
			</tr>
			
			<tr><td style="color:white">Contact no</td>
				<td><input type="text" name="contact" id="contact" value="<?php echo $cont;?>"></td>
			</tr>
			
			
			<tr><td style="color:white">Address</td>
				<td style="color:white"><textarea name="address" id="address" rows="4" cols="22" value="<?php echo $add;?>"></textarea></td>
			</tr><br>
			
			<tr><td></td>
				<td><input type="text" name=""><input type="file" name="avatar" accept="image/*" ></div> </td>
			</tr>
			
			
			
			
			
			
			
			<tr><td></td>
			<td><br> <input type="submit" name="submit" style="margin-right:10px" value="Add user">		
                 	<input type="submit" name="delete" style="margin-left:10px" value="delete user">	
                    		<input type="submit" name="submit2" style="margin-left:10px" value="update user">	
							<input type="reset" name="reset" style="margin-left:10px" value="reset">
				
			</tr>
			<tr><td></td>
			<td> <br><br><a href="Admin.php">
			<input  type="button" style="margin-left:75px" value="Back">	
            </a>			
				
			</tr>
			</table><br><br>
			
			<input type="text" name="search1" class="search" placeholder="Search User here">		
                 	<input type="submit" name="submit3" class="searchsubmit" value="Search"><br><br>	
					<table id="table" class="t1" align="center">
					<tr class="t1">
					<th class="t1">Name</th>
					<th class="t1">UserName</th>
					<th class="t1">Password</th>
					<th class="t1" >Email</th>
					<th class="t1" >Phone</th>
					<th class="t1" >Address</th>
					<th class="t1" >Action</th>
					<!--<th class="t1" >image</th>-->
						</tr>
						<?php 
						$qry=mysqli_query($connection, "SELECT * FROM `user`");
						while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
						echo'<tr class="t1">
						<td class="t1">'.$row['name'].'</td>';
						echo'<td class="t1">'.$row['username'].'</td>';
						echo'<td class="t1">'.$row['password'].'</td>';
						
						echo'<td class="t1">'.$row['email'].'</td>';
						echo'<td class="t1">'.$row['contact'].'</td>';
						echo'<td class="t1">'.$row['address'].'</td>';
						echo'<td class="t1"><a href="?edit='.$row['username'].'">Edit |<a href="?delete='.$row['username'].'">Delete</td></tr>';
						/*echo'<td class="t1"><img src="img/'.$row['image'].'" style="width:100px;height:100px;"</td></tr>';*/
						/*<td class="t1"><?php echo $row['password'];?></td>
						<td class="t1"><?php echo $row['cpassword'];?></td>
						<td class="t1"><?php echo $row['email'];?></td>
						<td class="t1"><?php echo $row['phone'];?></td>
						<td class="t1"><?php echo $row['address'];?></td>*/
						}
						?>
						</table>
						<script>
						function selectrow()
						{
						var rIndex,table= document.getElementById("table");
						//var table= document.getElementById('table'),rIndex;
						for(var i=0; i< table.rows.length; i++)
						{ table.rows[i].onclick= function()
							{
								rIndex= this.rowIndex;
								document.getElementById("name").value= this.cells[0].innerHTML;
								document.getElementById("username").value= this.cells[1].innerHTML;
								document.getElementById("password").value= this.cells[2].innerHTML;
								//document.getElementById("Cpass").value= this.cells[3].innerHTML;
								document.getElementById("email").value= this.cells[3].innerHTML;
								document.getElementById("contact").value= this.cells[4].innerHTML;
							document.getElementById("address").value= this.cells[5].innerHTML;
							}
						}							
							};
							 selectrow();
						</script>
						
		</form>
		
	
	</header>
	
</body>
</html>