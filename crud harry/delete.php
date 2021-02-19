<?php
include '_db_connect.php';
$id = $_GET['id'];

$sql = "DELETE FROM `phpnotes` WHERE `sno` = '$id'";
$result = mysqli_query($conn,$sql);
if($result){
 
  header("Location: http://localhost/learnphp/harrycrud/index.php");

}
else{
die("Not Deleted");
}
  mysqli_close($conn);

?>
