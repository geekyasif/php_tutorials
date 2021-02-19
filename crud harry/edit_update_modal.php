<?php
include '_db_connect.php';
$id = $_POST['editId'];
$editTitle = $_POST['editTitle'];
$editDescription = $_POST['editDescription'];

$sql = "UPDATE `phpnotes` SET `title`='$editTitle',`description`='$editDescription' WHERE `sno` = '$id'";

$result = mysqli_query($conn,$sql);

if(!$result){
    die("Error");
}
else{
    header("Location: http://localhost/learnphp/harrycrud/index.php");
}


?>
