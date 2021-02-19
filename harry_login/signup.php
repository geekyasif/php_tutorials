<?php
include 'index.php';
include 'db_connect.php';
$usernameAlert = false;
$passwordAlert = false;
$signupAlert = false;


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $sql = "SELECT * FROM `harrylogin` WHERE `username` = '$username'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num > 0){
    //   echo "username is already exist";
      $usernameAlert = true;
    }
    else{
     if($password === $cpassword){
         $sql = "INSERT INTO `harrylogin` (`username`, `password`, `cpassword`) VALUES ('$username','$password','$cpassword')";
         $result = mysqli_query($conn,$sql);
         $signupAlert = true;
     }
     else{
        //  echo "password do not match";
         $passwordAlert = true;
     }
       
    }
}else{
    // echo "errror occcoures";
}

?>
<?php
if($usernameAlert){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Username Error !</strong> Username is already exist. Please choose another username.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($passwordAlert){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Password Error !</strong>Password do not matched, Please enter correct password
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if($signupAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Signup Successfull</strong>You have signup successfully now you can login.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
<div class="container  my-4  col-4">
    <h2 class="text-center mb-4 border-bottom py-2">Please Sign Up Here</h2>
    <div class="jumbotron">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
                <small id="emailHelp" class="form-text text-muted">Your unique username must be less than 10 characters (only lowecase letters, numbers & underscores allowed)with no spaces</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
            </div>
            <button type="submit" class="btn btn-danger" name="submit">Create My Account</button>
        </form>
    </div>
</div>

