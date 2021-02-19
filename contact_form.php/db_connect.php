<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "userlogin";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    echo "not connected successfully";
}
else{
    // echo "connected successfully";
}


?>