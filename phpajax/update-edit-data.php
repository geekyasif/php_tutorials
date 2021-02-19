<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
   die("cant connect");
}

$update_hidden_id = $_POST["update_hidden_id"];
$update_fullname = $_POST["update_fullname"];
$update_destination = $_POST["update_destination"];

$sql = "UPDATE `tourist` SET `name` = '{$update_fullname}', `dest` = '{$update_destination}' WHERE `sno` = '{$update_hidden_id}'";

$result = mysqli_query($conn,$sql);

if($result){
    echo 1;
}else{
  echo 0;
}
