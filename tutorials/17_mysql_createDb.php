<?php

// conneting to database;
$servername = "localhost";
$username = "root";
$password = "";

// create a connection to database
$conn = mysqli_connect($servername,$username,$password);

if(!$conn){
    die("Can't connect to database");
}
else{
  echo "connection is successfull";
}


// Creating a database by php 
$sql = "CREATE DATABASE learnphp ";
// running the sql query to create database 
$result = mysqli_query($conn, $sql);
 
echo "<br>";

if(!$result){
    echo "Database is not created successdully";
}
else{
    echo "Database if created successfullly";
  
}


?>
