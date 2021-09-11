<?php
require 'db_connect.php';

$user_id = $_GET['id'];
$sql = "DELETE FROM `user` WHERE `user_id` = '$user_id'";
$result = mysqli_query($conn,$sql);
if($result){
    echo "deleted successfully";
    header("location: http://localhost/php_projects/webdevcode/admin/users.php");
}
else{
    die("not deleted successfully");
}

?>
