<?php

$conn = mysqli_connect("localhost","root","","learnphp");
if($conn){
    echo "Connection successfull";
}
else{
    die("connection unsuccessfull");
}

$sql = "SELECT * FROM `tourist`";
$result = mysqli_query($conn,$sql);

if($result){
    echo "<br>";
    $num = mysqli_num_rows($result);
    echo $num . " Records found in database";
    
    if($num > 0){
        while($row = mysqli_fetch_assoc($result) ){
            echo "<br>";
            echo $row['sno']. ". " .$row['name'] .$row['dest'];
            echo "<br>";
            
        }
    }
}



?>