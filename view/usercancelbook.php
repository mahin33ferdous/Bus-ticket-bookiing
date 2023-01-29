
 <?php
 require('../model/dbconnect.php');
 
 
 if(isset($_POST['submit']))
 {
	 $mysqli=new mysqli('localhost','root','','busbooking');
	 { if($_SERVER['REQUEST_METHOD']=='POST')
		 
	     $bookid=$_POST['bookid'];
		  $bmodel=$_POST['bmodel'];
		  $seatnum=$_POST['seatnum'];
		
		
            $sql="delete from busbook where bookid='$bookid'";
				 if($mysqli->query($sql)==true)
				 {
					 $qry=mysqli_query($connection,"update bus set aseat=aseat+'$seatnum' where bmodel='$bmodel'");
					 
					 $_SESSION['message']='Registration successfull! $name is added to the database';
			                      
								echo "<script type='text/javascript'>alert('Booking Cancelled')</script>";
								 //header( "Location: bookbus.php");
				 } else { 
				              echo "<script type='text/javascript'>alert('can not be Cancelled')</script>"; 
				        }
	   
		
		
		
			
		

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
          <table >
			
		
          <h2 style="color:white" >Selection Your Booking</h2>
		<form action="" method="POST" enctype="multipart/form-data">
		<tr><td style="color:white" ></td>
				<td><input type="text" name="user" placeholder="Enter username then click" >
				<input type="submit" name="submitclick" style="margin-right:10px" value="Click">
				</td></tr>
				
			</table>
		<table align="center">
             	<tr><td style="color:white" >Book ID</td>
				<td><input type="text" name="bookid"  id="bookid"  ></td>
			</tr>
			<tr><td style="color:white" >Bus Model</td>
				<td><input type="text" name="bmodel"  id="bmodel" ></td>
			</tr>
			<tr><td style="color:white">Bus name</td>
				<td><input type="text" name="bname" id="bname"  ></td>
			</tr>
			
			<tr><td style="color:white" >Platform</td>
				<td><input type="text" name="platform" id="platform"  </td>
			</tr>
			<tr><td style="color:white" >Destination</td>
				<td><input type="text" name="destination" id="destination"   ></td>
			</tr>
			
			<tr><td style="color:white">Due Date</td>
				<td><input type="date" name="duedate" id="duedate"   ></td>
			</tr>
			<tr><td style="color:white">Departure Time</td>
				<td><input type="time" name="dtime" id="dtime"    ></td>
			</tr>
			
			<tr><td style="color:white">Arrival Time</td>
				<td><input type="time" name="atime" id="atime"  ></td>
			</tr>
			
			
			<tr><td style="color:white">Username</td>
				<td><input type="text" name="username"  id="username"   ></td>
			</tr>
			<tr><td style="color:white">Booked seat</td>
				<td><input type="text" name="seatnum"   id="seatnum"    ></td>
			</tr>
			<tr><td style="color:white">Bill</td>
				<td><input type="text" name="tcost"  id="tcost"    ></td>
			</tr>
			
			
			
          <tr><td></td>
			<td><br>	
                 		<input type="submit" name="submit" style="margin-right:10px" value="Cancel Your Booking">	
							<input type="reset" name="reset" style="margin-left:10px" value="reset">
				
			</tr>
			<tr><td></td>
			<td> <br><br><a href="User.php">
			<input  type="button" style="margin-left:75px" value="Back">	
            </a>			
				
			</tr>
			</table><br><br>
			
			<!--<input type="text" name="search1" class="search" placeholder="Search Bus here">		
                 	<input type="submit" name="submit3" class="searchsubmit" value="Search"><br><br>-->	
					<table  id="table" class="t1" align="center">
					<tr class="t1">
					<th class="t1">BookID</th>
					<th class="t1">Model</th>
					<th class="t1">Name</th>
					<th class="t1">Platform</th>
					<th class="t1" >Destination</th>
					<th class="t1" >DueDate</th>
					<th class="t1" >StartTime</th>
					<th class="t1" >ArrivalTime</th>
					<th class="t1"> User</th>
					<th class="t1">SeatNum</th>
					<th class="t1">bill</th>
					<!--<th class="t1" >Action</th>-->
					
						</tr>
						<?php 
						if(isset($_POST['submitclick'])){
							$user=$_POST['user'];
						$qry=mysqli_query($connection, "SELECT * FROM `busbook`where username='$user'" );
						while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
						echo'<tr class="t1">
						<td class="t1">'.$row['bookid'].'</td>';
						echo'<td class="t1">'.$row['bmodel'].'</td>';
						echo'<td class="t1">'.$row['bname'].'</td>';
						echo'<td class="t1">'.$row['platform'].'</td>';
						echo'<td class="t1">'.$row['destination'].'</td>';
						echo'<td class="t1">'.$row['duedate'].'</td>';
						echo'<td class="t1">'.$row['dtime'].'</td>';
						echo'<td class="t1">'.$row['atime'].'</td>';
						echo'<td class="t1">'.$row['username'].'</td>';
						echo'<td class="t1">'.$row['seatnum'].'</td>';
						echo'<td class="t1">'.$row['cost'].'</td>';
						//echo'<td class="t1"><a href="?edit='.$row['bookid'].'">Edit |<a href="?delete='.$row['bookid'].'">Delete</td></tr>';
						}
						
						}
						?>
						
			
						<script>
						function selectrow()
						{
						var rIndex,table= document.getElementById("table");
						//var table= document.getElementById('table'),rIndex;
						for(var i=0; i< table.rows.length; i++)
						{ table.rows[i].onclick= function()
							{
								rIndex= this.rowIndex;
								document.getElementById("bookid").value= this.cells[0].innerHTML;
								document.getElementById("bmodel").value= this.cells[1].innerHTML;
								document.getElementById("bname").value= this.cells[2].innerHTML;
								document.getElementById("platform").value= this.cells[3].innerHTML;
								document.getElementById("destination").value= this.cells[4].innerHTML;
								document.getElementById("duedate").value= this.cells[5].innerHTML;
								document.getElementById("dtime").value= this.cells[6].innerHTML;
								document.getElementById("atime").value= this.cells[7].innerHTML;
							    document.getElementById("username").value= this.cells[8].innerHTML;
								document.getElementById("seatnum").value= this.cells[9].innerHTML;
								document.getElementById("tcost").value= this.cells[10].innerHTML;
							}
						}							
							};
							 selectrow();
						</script>
						
						
						
		</form>
		
	
	</header>
	
</body>
</html>