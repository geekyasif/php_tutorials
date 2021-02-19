<?php
include 'connection.php';
$id = $_GET['id'];

$sql = " DELETE FROM `student` WHERE `student`.`sid` = '$id' ";
$result = mysqli_query($conn, $sql);
if($result){    
    
  header("Location: http://localhost/learnphp/crud_app/index.php");
} 




mysqli_close($conn);

?>