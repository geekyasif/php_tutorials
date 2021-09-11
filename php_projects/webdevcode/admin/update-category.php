<?php

if(isset($_POST['submit'])){
    require 'db_connect.php';
        $category_id = $_POST['categoryid'];
        $category_name = $_POST['categoryName'];
    $sql = "UPDATE `category` SET `category_name`= '{$category_name}' WHERE `category_id` = '{$category_id}'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "updated successfully";
        header("location: http://localhost/php_projects/webdevcode/admin/category.php");
    }
    else{
        die("not updated successfully");
    }
}

?>