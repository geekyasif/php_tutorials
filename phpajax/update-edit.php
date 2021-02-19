<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
   die("cant connect");
}

$id = $_POST["editid"];

$sql = "SELECT * FROM `tourist` WHERE `sno` = '$id'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if($num > 0){

    while($row = mysqli_fetch_assoc($result) ){
      $data = $row;

}
echo json_encode($data);
}else{
    echo "<h4 class='text-center mt-3'>No Data found !</h5> ";
}

