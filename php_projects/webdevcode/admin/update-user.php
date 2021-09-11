<?php

if(isset($_POST['submit'])){

    require 'db_connect.php';
    $user_id = mysqli_real_escape_string($conn,$_POST['userid']);
    $user_fullName = mysqli_real_escape_string($conn,$_POST['fullName']);
    $user_name = mysqli_real_escape_string($conn,$_POST['username']);
    $user_role = mysqli_real_escape_string($conn,$_POST['userrole']);
    
    $sql = "UPDATE `user` SET `user_fullname` = '$user_fullName' , `user_name` = '$user_name' ,
        `user_role` = '$user_role' WHERE `user_id` ='$user_id'";
$result = mysqli_query($conn,$sql);
if($result){
    echo "data updated Successfullly";
    header("location: http://localhost/php_projects/webdevcode/admin/users.php");
}else{
    die("data not inserted");
}

}


?>