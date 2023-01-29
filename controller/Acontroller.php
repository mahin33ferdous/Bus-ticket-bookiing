<?php

 include_once('../model/Amodel.php');
 

Class Controller{
 
  public function Controller()
  {
   $this->model=new model();

  }
 // public function AddUser($data){
  public function AddUser($name,$username,$password,$email,$contact,$address,$avatar_path)
  {
	  $result=$this->model->add_user($name,$username,$password,$email,$contact,$address,$avatar_path);
	   //$result=$this->model->add_user($data);

if($result=='userexists')
   {
	   return 'user';
	   
   }else if($result=='adminexists')
   {
	   return 'admin';
	  
   }
   else if($result=='inserted'){
	   return 'insert';
	   
   }else { 
    return 'notinsert';
       }
		
}

public function AddBus($bname,$bmodel,$platform,$destination,$duedate,$dt,$at,$seat,$aseat,$cost)
  {
	  $result=$this->model->add_bus($bname,$bmodel,$platform,$destination,$duedate,$dt,$at,$seat,$aseat,$cost);
 
if($result=='modelexists')
   {
	   return 'modelexisting';
	  
   }else if($result=='inserted')
   {
	   return 'insert';
	   
   }
   else if($result=='inserted'){
	   return 'insert';
	  
   }else { 
    return 'dontinsert';
       }
		
}
public function AddBook($bname,$bmodel,$platform,$destination,$duedate,$dt,$at,$username,$seatnum,$cost)
  {
	  $result=$this->model->add_book($bname,$bmodel,$platform,$destination,$duedate,$dt,$at,$username,$seatnum,$cost);
 
if($result=='nonExsistingUser')
   {
	   return 'invaliduser';
	  
   }else if($result=='notEnoughSit')
   {
	   return 'notAvaiableSit';
	   
   }
   else if($result=='booked'){
	   return 'book';
	  
   }else { 
    return 'dontBook';
       }
		
}
 
 public function DeletUser($username)
  {
	  $result=$this->model->delete_user($username);
 
if($result=='delete')
   {
	 return 'deleted';
 }
	 
  else { 
    return 'dontdelete';
     }
public function DeleteBus($bmodel)
  {
	  $result=$this->model->delete_bus($bmodel);
 
if($result=='delete')
   {
	 return 'deleted';
 }
	 
  else { 
    return 'dontdelete';
     }
	 
		
}
public function CancelBook($bookid)
  {
	  $result=$this->model->cancel_book($bookid);
 
if($result=='delete')
   { 
      if($result=='updateseat')
	  {return 'seatupdated';}
  
	 return 'deleted';
 }
	 
  else { 
    return 'dontdelete';
     }
	 
		
}

}


?>