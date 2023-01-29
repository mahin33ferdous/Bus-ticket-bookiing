<?php

 include_once('../model/loginmodel.php');
 

Class Controller{
 
  public function Controller()
  {
   $this->model=new model();

  }
  
  public function CheckLog($data)
  {
	  $result=$this->model->check_login($data);
 //return $this->model->check_login($data);
if($result=='userlogin')
   {
	   return 'user';
	   //header("Location:view/User.php");
   }else if($result=='adminlogin')
   {
	   return 'admin';
	    //header("Location: view/Admin.php");
   }
   else {
	   return 'invalid';
	   //header("Location: view/home.php");
   }
		
}
 
}


?>