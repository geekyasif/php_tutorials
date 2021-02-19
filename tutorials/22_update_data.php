<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);
if($conn){
    echo "Connection was successfull";
}
else{
    
    die("Connection was successfull");
}

// updating the data 
$name = "Shabaj ansari";
$dest = "lucknow";
$sno = 3;
$sql = "UPDATE `tourist` SET `name` = '$name' , `dest` = '$dest' WHERE `sno` = $sno";
$result = mysqli_query($conn, $sql);

if($result){

    echo "<br>";
    echo "updated successfully";

}
else{
    
    echo "updated not successfully";
}

// cheackinig affected data
$aff = mysqli_affected_rows($conn);
echo "<br>";
echo $aff;

// traversing all the datafrom database and print into the webpage
$sql = "SELECT * FROM `tourist` ";
$result = mysqli_query($conn,$sql);

if($result){
    echo "<br>";
    $num = mysqli_num_rows($result);
    echo $num . " Records found in database";
    
    if($num > 0){
        $sno = 1;
        while($row = mysqli_fetch_assoc($result) ){
            echo "<br>";
            echo $sno . " " . $row['name'] . " " . $row['dest'];
            $sno++;
            echo "<br>";
            
        }
    }
}



?>