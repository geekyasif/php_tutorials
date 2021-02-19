<?php
session_start();
include 'db_connect.php';
if(isset($_GET['token'])){
     $token = $_GET['token'];
    $sql = "UPDATE `email_verification` SET `status`= 'active' WHERE `token` = '$token'";
    $result = mysqli_query($conn,$sql);
    if($result){
        
        header("Location: login.php");
        echo "update done";
       
    }else{
        die("account updated");
    }
}

?>