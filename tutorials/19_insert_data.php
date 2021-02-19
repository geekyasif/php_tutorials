<?php

//connecting to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);

if($conn){
    echo "Connection was successfull";
}
else{
    die("Connection was not successfull");
}

// inserting data into table
// $sql = "INSERT INTO `tourist` (`name`, `dest`) VALUES ('Ironman', 'Dubai')";
// $result = mysqli_query($conn,$sql);


$sql = "INSERT INTO `formdata` (`name`, `email`, `descrb`, `dt`) VALUES ('hayuiiris', 'mdhfjjaris@gmail.com', 'hello', current_timestamp())";
$result = mysqli_query($conn,$sql);

if($result){
    echo "Data inserted secccessfully";
}
else{
    die("Data was not inserted successfully");
}

mysqli_close($conn);

?>