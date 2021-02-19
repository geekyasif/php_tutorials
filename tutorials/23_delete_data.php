<?php

// creating and connecting database and server

$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);
if($conn){
    echo "successfull connected";
}
else{
    echo " not successfull connected";

}

// deleting data from database

$sql = "DELETE FROM `tourist` WHERE `sno` = 3";
$result = mysqli_query($conn,$sql);
if($result){
    echo "deleted successfully";
}
else{
    echo "deleted unsuccessfully";
}

mysqli_close($conn);

?>