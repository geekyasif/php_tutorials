<?php

include 'connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$class = $_POST['class'];
$phone = $_POST['phone'];



$sql  = "UPDATE `student` SET `sname` = '{$name}' , `saddress` = '{$address}' ,`sclass` = '{$class}', `sphone` = '{$phone}' WHERE `sid` ='{$id}'";

$result = mysqli_query($conn,$sql);

if($result){
    header("Location: http://localhost/learnphp/yahoo_crud_app/index.php");
}
else{
    die("Error");
}
   

?>
