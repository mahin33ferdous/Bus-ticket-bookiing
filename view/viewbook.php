<?php
require('../model/dbconnect.php');


?>
<html>
<style>
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

          <h2 style="color:white" >See Booking History</h2>
		<form action="" method="POST" enctype="multipart/form-data">
		<table>
		<tr><td style="color:white"></td>
				<td><input type="text" name="username"  placeholder="Enter username" required  >
				<input type="submit" name="see" style="margin-right:10px" value="See ">	
				</td>
			</tr>
		 		
				
			</tr>
			<tr><td></td>
			<td> <a href="User.php">
			<input  type="button" style="margin-left:75px" value="Back">	
            </a>			
				
			</tr>
			</table><br><br>
				
                 			<table  id="table" class="t1" align="center">
					<tr class="t1">
					<th class="t1">Bus Model</th>
					<th class="t1">Bus Name</th>
					<th class="t1">Platform</th>
					<th class="t1" >Destination</th>
					<th class="t1" >Due Date</th>
					<th class="t1" >Start Time</th>
					<th class="t1" >Arrival Time</th>
					<th class="t1">Username</th>
					<th class="t1"> Seat Booked</th>
					<th class="t1">Cost</th>
					
						</tr>
							
					
					
						<?php 
						
						if(isset($_POST['see']))
                     {  
				            $username=$_POST['username'];
						$qry=mysqli_query($connection, "SELECT * FROM `busbook` where username='$username'");
						while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){	
						echo'<tr class="t1">
						<td class="t1">'.$row['bmodel'].'</td>';
						echo'<td class="t1">'.$row['bname'].'</td>';
						echo'<td class="t1">'.$row['platform'].'</td>';
						echo'<td class="t1">'.$row['destination'].'</td>';
						echo'<td class="t1">'.$row['duedate'].'</td>';
						echo'<td class="t1">'.$row['dtime'].'</td>';
						echo'<td class="t1">'.$row['atime'].'</td>';
						echo'<td class="t1">'.$row['username'].'</td>';
						echo'<td class="t1">'.$row['seatnum'].'</td>';
						echo'<td class="t1">'.$row['cost'].'</td>';
						
						} 
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