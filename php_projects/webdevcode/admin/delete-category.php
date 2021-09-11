<?php
require 'db_connect.php';

$category_id = $_GET['id'];
$sql = "DELETE FROM `category` WHERE `category_id` = '$category_id'";
$result = mysqli_query($conn,$sql);
if($result){
    echo "deleted successfully";
    header("location: http://localhost/php_projects/webdevcode/admin/category.php");
}
else{
    die("not deleted successfully");
}

?>
