<?php
require 'db_connect.php';

$post_id = $_GET['id'];
$post_category = $_GET['category'];

$sql1 = "SELECT * FROM `post` WHERE `post_id` = $post_id";
$result1 = mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result1);
unlink("upload/" . $row['post_image']);

$sql = "DELETE FROM `post` WHERE `post_id` = '$post_id';";
$sql .= "UPDATE `category` SET no_of_post = no_of_post - 1 WHERE `category_name` = '$post_category'";
if(mysqli_multi_query($conn, $sql)){
    echo "deleted successfully";
    header("location: http://localhost/php_projects/webdevcode/admin/post.php");
}
else{
    die("not deleted successfully");
}

?>
