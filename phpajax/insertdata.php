<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
   die("cant connect");
}

$fullname = $_POST['fullname'];
$destination = $_POST['destination'];

$sql = "INSERT INTO `tourist`(`name`, `dest`) VALUES ('$fullname', '$destination')";
$result = mysqli_query($conn,$sql);
if($result){
     echo 1;
}else{
  echo 0;
}


?>
