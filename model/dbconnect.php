<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'busbooking');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
 $mysqli=new mysqli('localhost','root','','busbooking');
?>