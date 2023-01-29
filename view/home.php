<?php


?>


<html>


<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Home</title>
<style>
  *{
   margin: 0;
   padding: 0;
   box-sizing: border-box;
  }
  body{
   font-family: sans-serif;
  }
 
  .modal{
   background-color: rgba(0,0,0, .8);
   width:100%;
   height: 100vh;
   position: absolute;
   top: 0;
   left: 0;
   z-index: 10;
   opacity: 0;
   visibility: hidden;
   transition: all .5s;
  }
  .modal__content{
   width: 50%;
   height: 50%;
   background-color: #00008B;
   position: absolute;
   top: 50%;
   left: 50%;
   
   transform: translate(-50%, -50%);
   padding: 2em;
   border-radius: 1em;
   opacity: 0;
   visibility: hidden;
   transition: all .5s;
  }
  #modal:target{
   opacity: 1;
   visibility: visible;
  }
  #modal:target .modal__content{
   opacity: 1;
   visibility: visible;
  }
  .modal__close{
   color: #363636;
   font-size: 2em;
   position: absolute;
   top: .5em;
   right: 1em;
  }
  .modal__heading{
   color: dodgerblue;
   margin-bottom: 1em;
  }
  .modal__paragraph{
   line-height: 1.5em;
  }
.modal-open{
 display: inline-block;
 color: dodgerblue;
 margin: 2em;
}

ul{
	float:right;
	list-style-type: none;
	margin-top:30px;
}
ul li{display: inline-block;}
ul li a{
	text-decoration:none;
	
	color:blue;
	padding:5px 20px;
	border:1px solid white;
}
ul li a:hover{
	background-color: white;
	color:black;
	padding:5px 20px;
	border:1px solid white;
}
</style>


</head>
<body style="background-color:#5f9ea0" >
<header>
<h1 style="color:blue;">HOME </h1>
<div>
<ul>
   
   <li><b><a href="#modal" class="modal_open">Log in</a></b></li>
     <li><b><a href="registration.php">Register</a></b></li>
   <li><b><a href="#">About us</a></b></li>
   <li><b><a href="#">Contact</a></b></li>
 </ul>
 </div>
 
  <div class="modal" id="modal">
    <div class="modal__content">
      <a href="#" class="modal__close">&times;</a>
	  <h2 class="modal__heading">Log in</h2>
	   <form action="verifylogin.php" method="POST" >
      
   <table align="center">

			
			<tr><td style="color:white">User name</td>
				<td><input type="text" name="username" required></td>
			</tr><br><br>
			<tr><td style="color:white" ><br>Password</td>
				<td><input type="password" name="password" required</td>
			</tr>
			
			
			<tr><td></td>
			<td><input type="submit" name="submit" style="margin-left:75px" value="Log in">			
				
			</tr>
			</table><br>
			
				<p style="color:white"> Don't have an account? <a href="registration.php" style="color:red">Sign up now</a>.</p>		
    </div>
 </div>

 </header>
 </body>
 </html>