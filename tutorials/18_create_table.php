<?php

// connnecting to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);

if($conn){
    echo "connected successfully to database";
}
else{
    die("Can't connect to database");
}

// creating table in database
$sql = "CREATE TABLE `employee3` ( `sno` INT(100) NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `age` INT(12) NOT NULL , `gender` VARCHAR(11) NOT NULL , PRIMARY KEY (`sno`))";

$result = mysqli_query($conn, $sql);

if($result){
    echo "<br>";
    echo "table created successfully";
}
else{
    echo "<br>";
    echo "Table created unccessfully";
}

?>