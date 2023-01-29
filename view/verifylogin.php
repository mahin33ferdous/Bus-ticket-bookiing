<?php  

include_once('../controller/logincontroller.php');

if (isset($_POST['username']) and isset($_POST['password'])){
	
	 $data = array(
		'username' =>$_POST['username'],
		'password' =>$_POST['password'],
		
		);
		$controller = new Controller();
		$result=$controller->CheckLog($data);
		if($result=='user')
		{
			 header("Location: User.php");
			
		}
		else if($result=='admin')
		{
			header("Location: Admin.php");
			
		}else {
			   
			echo "<script type='text/javascript'>alert('Invalid username and password');
			     window.location.replace('home.php');
			</script>";
			
			
		            
		}
}

 
?>
