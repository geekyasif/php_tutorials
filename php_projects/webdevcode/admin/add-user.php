<?php
include_once 'header.php';

?>

<?php
 if(isset($_POST['adduser'])){
    require 'db_connect.php';
    
     $fullName = mysqli_real_escape_string($conn,$_POST['fullName']);
     $username = mysqli_real_escape_string($conn,$_POST['username']);
     $password = mysqli_real_escape_string($conn,$_POST['password']);
     $userrole = mysqli_real_escape_string($conn,$_POST['userrole']);
     
     $hash_password = password_hash($password,PASSWORD_DEFAULT);

     $sql = "SELECT * FROM `user` WHERE `user_name` = '$username'";
     $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);
     if($num > 0){
         echo "username is already taken";
     }else{
         $sql1 = "INSERT INTO `user` (`user_fullname`, `user_name`, `user_password`, `user_role`) VALUES ('$fullName','$username','$hash_password','$userrole')";
         $result1 = mysqli_query($conn,$sql1);
         if($result1){
             echo "data inserted successfully";
         }else{
             die("data inserted unsuccessfully");
         }
     }

 }


?>
<div class="container">
    <h2 class="text-center">Add New User</h2>

    <div class="jumbotron col-6 mx-auto mt-3">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="full Name" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="password"
                    required>
            </div>
            <div class="form-group">
                <label for="userrole">User Role</label>
                <select class="form-control" id="userrole" name="userrole" required>
                    <option selected>Select User Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Normal User">Normal User</option>
                </select>
            </div>
            <input class="btn btn-info" type="submit" name="adduser" value="ADD USER">
        </form>
    </div>
</div>


<?php
include 'footer.php';
?>