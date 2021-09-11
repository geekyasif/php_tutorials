<?php

// creating server and connected to database

$servername = "localhost";
$username = "root";
$password = "";
$database = "webdevasif";

$conn = mysqli_connect($servername,$username,$password,$database);
if($conn){
//    echo "Connected successfully to the database";
}
else{
    die("Unsuccessfully connected to the database");
}


?>