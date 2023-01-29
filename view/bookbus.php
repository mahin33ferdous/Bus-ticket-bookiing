<?php
 require('../model/dbconnect.php');

 
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
		$username=$_POST['username'];
		$seatnum=$_POST['seatnum'];
		$tcost=$_POST['tcost'];
		

	   
		
		$sql1="select * from user where username='$username'";
				$res=mysqli_query($connection,$sql1);
				if(mysqli_num_rows($res)>0){
					$sql1="select * from bus where aseat>'$seatnum'";
				$res=mysqli_query($connection,$sql1);
				if(mysqli_num_rows($res)>0){
					$sql="INSERT INTO busbook(bmodel,bname,platform,destination,duedate,dtime,atime,username,seatnum,cost)"
			     ."VALUES('$bmodel','$bname','$platform','$destination','$duedate','$dtime','$atime','$username','$seatnum','$tcost')";
				 if($mysqli->query($sql)==true)
				 {
					 $qry=mysqli_query($connection,"update bus set aseat='$aseat'-'$seatnum' where bmodel='$bmodel'");
					 
					 $_SESSION['message']='Registration successfull! $name is added to the database';
			                      
								echo "<script type='text/javascript'>alert('Booking Successfull')</script>";
								 //header( "Location: bookbus.php");
				 } 
				 
				 else{
					 $_SESSION['message']='user can not be added to the database';
					 echo "<script type='text/javascript'>alert('con not be added')</script>";
				 }
				} else{
					 $_SESSION['message']='requireed seat number is greater then available seats';
					 echo "<script type='text/javascript'>alert('requireed seat number is greater then available seats')</script>";
				 }
				
				} else{
					 $_SESSION['message']='user can not be added to the database';
					 echo "<script type='text/javascript'>alert('this user does not exists')</script>";
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

          <h2 style="color:white" >Bus Selection</h2>
		<form action="" method="POST" enctype="multipart/form-data">
		<table align="center">

			<tr><td style="color:white" >Bus Model</td>
				<td><input type="text" name="bmodel"  id="bmodel"  required></td>
			</tr>
			<tr><td style="color:white">Bus name</td>
				<td><input type="text" name="bname" id="bname"  required></td>
			</tr>
			
			<tr><td style="color:white" >Platform</td>
				<td><input type="text" name="platform" id="platform" required</td>
			</tr>
			<tr><td style="color:white" >Destination</td>
				<td><input type="text" name="destination" id="destination" required ></td>
			</tr>
			
			<tr><td style="color:white">Due Date</td>
				<td><input type="date" name="duedate" id="duedate"  required ></td>
			</tr>
			<tr><td style="color:white">Departure Time</td>
				<td><input type="time" name="dtime" id="dtime"  required  ></td>
			</tr>
			
			<tr><td style="color:white">Arrival Time</td>
				<td><input type="time" name="atime" id="atime"  required ></td>
			</tr>
			
			
			<tr><td style="color:white">Total Seat</td>
				<td><input type="text" name="seat" id="seat"  required  ></td>
			</tr>
			<tr><td style="color:white">Available Seat</td>
				<td><input type="text" name="aseat" id="aseat"  required ></td>
			</tr>
			<tr><td style="color:white">Ticket Cost</td>
				<td><input type="text" name="cost" id="cost" onkeyup="calcost()"  required ></td>
			</tr>
			<tr><td style="color:white"></td>
				<td><input type="text" name="username" placeholder="Enter your Username Here" id="username" required  ></td>
			</tr>
			<tr><td style="color:white"></td>
				<td><input type="text" name="seatnum" placeholder="Enter required seat Here" onkeyup="calcost()"  id="seatnum"  required  ></td>
			</tr>
			<tr><td style="color:white"></td>
				<td><input type="text" name="tcost" placeholder="cost" id="tcost"  required  ></td>
			</tr>
			
			
			
          <tr><td></td>
			<td><br> <input type="submit" name="submit" style="margin-right:10px" value="Add to Booking">		
                 		
							<input type="reset" name="reset" style="margin-left:10px" value="reset">
				
			</tr>
			<tr><td></td>
			<td> <br><br><a href="User.php">
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
						}
						?>
						</table>
						<script>
						function selectrow()
						{
						var rIndex,table= document.getElementById("table");
						
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
						<script>
						function calcost(){
						    var cost=document.getElementById("cost").value;
						    var num=document.getElementById("seatnum").value;
							var cal=parseInt(cost)*parseInt(num);
							if(!isNaN(cal)){
						    document.getElementById("tcost").value=cal;
							}
						};
						</script>
						
						
						
		</form>
		
	
	</header>
	
</body>
</html>