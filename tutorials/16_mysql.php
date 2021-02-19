<?php
//connecting to the database
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username,$password);

if(!$conn){

    // die if connecion is not successful
    die("Sorry connection unsuccessful!" . mysqli_connect_error());
}   
else{
   
    echo "Connection successful";
}



?>