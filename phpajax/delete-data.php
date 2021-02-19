<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
   die("cant connect");
}

$id = $_POST['id'];
$sql = "DELETE FROM `tourist` WHERE `sno` = '$id'";
$result = mysqli_query($conn,$sql);
if($result){
    echo 1;
}else{
    echo 0;
}

?>