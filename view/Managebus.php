<?php
 require('../model/dbconnect.php');
 //function getposts()
 $model="";
 $name="";
 $plat="";
 $des="";
 $due="";
 $dt="";
 $at="";
 $ts="";
 $as="";
 $c="";
 
 if(isset($_POST['submit']))
 {
	 $mysqli=new mysqli('localhost','root','','busbooking');
	 { if($_SERVER['REQUEST_METHOD']=='POST')
		 $bmodel=$_POST['bmodel'];
		$bname=$_POST['bname'];
		$platform=$_POST['platform'];
		$destination=$_POST['destination'];
		$duedate=$_POST['duedate'];
		$dtime=$_POST['dtime'];
		$atime=$_POST['atime'];
		$seat=$_POST['seat'];
		$aseat=$_POST['aseat'];
		$cost=$_POST['cost'];
		

	   
		$sql1="select * from bus where bmodel='$bmodel'";
				$res=mysqli_query($connection,$sql1);
				if(mysqli_num_rows($res)>0){
					 echo "<script type='text/javascript'>alert('bus id already exists')</script>";
				}
		else{
		$sql="INSERT INTO bus(bmodel,bname,platform,destination,duedate,dtime,atime,seat,aseat,cost)"
			     ."VALUES('$bmodel','$bname','$platform','$destination','$duedate','$dtime','$atime','$seat','$aseat','$cost')";
				 if($mysqli->query($sql)==true)
				 {$_SESSION['message']='Registration successfull! $name is added to the database';
			                      
								echo "<script type='text/javascript'>alert('Successfull')</script>";
								 header( "Location: Managebus.php");
				 }
				 else{
					 $_SESSION['message']='user can not be added to the database';
					 echo "<script type='text/javascript'>alert('con not be added')</script>";
				 }
			
		}

	}
}
else if(isset($_POST['submit2']))
{
	$qry=mysqli_query($connection,"update bus set bmodel='".$_POST["bmodel"]."', bname='".$_POST["bname"]."', platform='".$_POST["platform"]."', destination='".$_POST["destination"]."', duedate='".$_POST["duedate"]."', dtime='".$_POST["dtime"]."', atime='".$_POST["atime"]."', seat='".$_POST["seat"]."', aseat='".$_POST["aseat"]."', cost='".$_POST["cost"]."' where bmodel='".$_GET["edit"]."'");
	header( "Location: Managebus.php");
}

if(isset($_GET['delete']))
{ $qry=mysqli_query($connection,"delete from user where username='".$_GET["delete"]."'");
          header( "Location: Managebus.php");
		 }
else if(isset($_GET['edit']))
  {
	$qry=mysqli_query($connection,"select * from bus where bmodel='".$_GET["edit"]."'");
	while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
					$model=$row["bmodel"];
					$name=$row["bname"];
					$plat=$row["platform"];
					$des=$row["destination"];
					$due=$row["duedate"];
                    $dt=$row["dtime"];
                    $at=$row["atime"];
                    $ts=$row["seat"];
                    $as=$row["aseat"];
                    $c=$row["cost"];
         // header( "Location: Manageuser.php");
   }
  }
 
  if(isset($_GET['delete']))
{ $qry=mysqli_query($connection,"delete from bus where bmodel='".$_GET["delete"]."'");
          header( "Location: Managebus.php");
		 }



else if(isset($_POST['submit3']))
{}

/*if(isset($_POST['search']))
{
}
else
{
	$query="SELECT * FROM 'user'";
	$search_result= searchable($query);
	
}
function searchable($query)
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

          <h1 style="color:white" >Manage Bus</h1>
		<form action="" method="POST" enctype="multipart/form-data">
		<table align="center">

			<tr><td style="color:white" >Bus Model</td>
				<td><input type="text" name="bmodel"  id="bmodel" value="<?php echo $model;?>" required></td>
			</tr>
			<tr><td style="color:white">Bus name</td>
				<td><input type="text" name="bname" id="bname" value="<?php echo $name;?>" required></td>
			</tr>
			
			<tr><td style="color:white" >Platform</td>
				<td><input type="text" name="platform" id="platform" value="<?php echo $plat ;?>" required</td>
			</tr>
			<tr><td style="color:white" >Destination</td>
				<td><input type="text" name="destination" id="destination" value="<?php echo $des ;?>" required ></td>
			</tr>
			
			<tr><td style="color:white">Due Date</td>
				<td><input type="date" name="duedate" id="duedate" value="<?php echo $due ;?>" required ></td>
			</tr>
			<tr><td style="color:white">Departure Time</td>
				<td><input type="time" name="dtime" id="dtime" value="<?php echo $dt ;?>" required  ></td>
			</tr>
			
			<tr><td style="color:white">Arrival Time</td>
				<td><input type="time" name="atime" id="atime" value="<?php echo $at ;?>" required ></td>
			</tr>
			<!--<tr><td style="color:white">Due Date</td>
				<td><input type="date" name="duedate"></td>
			</tr>
			<tr><td style="color:white">Departure Time</td>
				<td><input type="time" name="dtime"></td>
			</tr>
			
			<tr><td style="color:white">Arrival Time</td>
				<td><input type="time" name="atime"></td>
			</tr>-->
			
			<tr><td style="color:white">Total Seat</td>
				<td><input type="text" name="seat" id="seat" value="<?php echo $ts ;?>" required  ></td>
			</tr>
			<tr><td style="color:white">Available Seat</td>
				<td><input type="text" name="aseat" id="aseat" value="<?php echo $as ;?>" required ></td>
			</tr>
			<tr><td style="color:white">Ticket Cost</td>
				<td><input type="text" name="cost" id="cost" value="<?php echo $c ;?>" required ></td>
			</tr>
			
			
			
			<tr><td></td>
			<td><br> <input type="submit" name="submit" style="margin-right:10px" value="Add Bus">		
                 	<input type="submit" name="submit1" style="margin-left:10px" value="delete Bus">	
                    		<input type="submit" name="submit2" style="margin-left:10px" value="update Bus info">	
							<input type="reset" name="reset" style="margin-left:10px" value="reset">
				
			</tr>
			<tr><td></td>
			<td> <br><br><a href="Admin.php">
			<input  type="button" style="margin-left:75px" value="Back">	
            </a>			
				
			</tr>
			</table><br><br>
			
			<input type="text" name="search1" class="search" placeholder="Search Bus here">		
                 	<input type="submit" name="submit3" class="searchsubmit" value="Search"><br><br>	
					<table  id="table" class="t1" align="center">
					<tr class="t1">
					<th class="t1">Model</th>
					<th class="t1">Name</th>
					<th class="t1">Platform</th>
					<th class="t1" >Destination</th>
					<th class="t1" >Due Date</th>
					<th class="t1" >Start Time</th>
					<th class="t1" >Arrival Time</th>
					<th class="t1"> Total Seat</th>
					<th class="t1"> Available Seat</th>
					<th class="t1">Cost</th>
					<th class="t1" >Action</th>
						</tr>
						<?php 
						
						$qry=mysqli_query($connection, "SELECT * FROM `bus`");
						while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
						echo'<tr class="t1">
						<td class="t1">'.$row['bmodel'].'</td>';
						echo'<td class="t1">'.$row['bname'].'</td>';
						echo'<td class="t1">'.$row['platform'].'</td>';
						echo'<td class="t1">'.$row['destination'].'</td>';
						echo'<td class="t1">'.$row['duedate'].'</td>';
						echo'<td class="t1">'.$row['dtime'].'</td>';
						echo'<td class="t1">'.$row['atime'].'</td>';
						echo'<td class="t1">'.$row['seat'].'</td>';
						echo'<td class="t1">'.$row['aseat'].'</td>';
						echo'<td class="t1">'.$row['cost'].'</td>';
						echo'<td class="t1"><a href="?edit='.$row['bmodel'].'">Edit|<a href="?delete='.$row['bmodel'].'">Delete</td></tr>';
						/*echo'<td class="t1"><img src="img/'.$row['image'].'" style="width:100px;height:100px;"</td></tr>';*/
						/*<td class="t1"><?php echo $row['password'];?></td>
						<td class="t1"><?php echo $row['cpassword'];?></td>
						<td class="t1"><?php echo $row['email'];?></td>
						<td class="t1"><?php echo $row['phone'];?></td>
						<td class="t1"><?php echo $row['address'];?></td>*/
						}
						
						
						
						/* while():?>
						<tr class="t1">
						<td class="t1"><?php echo $row['name'];?></td>
						<td class="t1"><?php echo $row['username'];?></td>
						<td class="t1"><?php echo $row['password'];?></td>
						<td class="t1"><?php echo $row['cpassword'];?></td>
						<td class="t1"><?php echo $row['email'];?></td>
						<td class="t1"><?php echo $row['phone'];?></td>
						<td class="t1"><?php echo $row['address'];?></td>
						</tr>
						<?php endwhile;*/?>
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
								document.getElementById("bmodel").value= this.cells[0].innerHTML;
								document.getElementById("bname").value= this.cells[1].innerHTML;
								document.getElementById("platform").value= this.cells[2].innerHTML;
								document.getElementById("destination").value= this.cells[3].innerHTML;
								document.getElementById("duedate").value= this.cells[4].innerHTML;
								document.getElementById("dtime").value= this.cells[5].innerHTML;
								document.getElementById("atime").value= this.cells[6].innerHTML;
							    document.getElementById("seat").value= this.cells[7].innerHTML;
								document.getElementById("aseat").value= this.cells[8].innerHTML;
								document.getElementById("cost").value= this.cells[9].innerHTML;
							}
						}							
							};
							 selectrow();
						</script>
						
						
		</form>
		
	
	</header>
	
</body>
</html>