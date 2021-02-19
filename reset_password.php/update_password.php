<?php
include 'header.php';
?>

<?php
 $passwordSucccess = false;
 include 'db_connect.php';
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     

     if($_GET['token']){
         $token = $_GET['token'];
         $password = $_POST['password'];
         $cpassword = $_POST['cpassword'];

    // $sql = "SELECT * FROM `email_verification` WHERE `token` = '$token'";
    // $result = mysqli_query($conn,$sql);
    if($password == $cpassword){
        
        $hash_password = password_hash("$password", PASSWORD_DEFAULT);
        $sql = "UPDATE `email_verification` SET `password`= '$hash_password' WHERE `token` = '$token'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $passwordSucccess = true;
        }else{
            die("error");
        }

        
    } 
    
    
}

}
?>


<?php
if ($passwordSucccess) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Password Update :- </strong> Password Update successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}
?>
<h3 class="text-center my-4">Update Forgot Password</h3>
<div class="container jumbotron col-6 ">
    <form action="" method="post">
        <div class="form-group ">
            <label for="password">Enter new password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group ">
            <label for="cpassword">Confirm new password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Update Password</button>
    </form>
</div>