<?php
include 'header.php';
include 'db_connect.php';
$emailAlert = false;
$usernameAlert = false;
$passwordAlert = false;
$registerAlert = false;

if (isset($_POST['submit'])) {

    

    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    $sql = "select * from thapalogin where (username='$username' or email='$email');";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {

        $row = mysqli_fetch_assoc($result);
        if ($email == $row['email']) {
            // echo "email already exists";
            $emailAlert = true;
        } else {
            if ($username == $row['username']) {
                // echo "username  already exists";
                $usernameAlert = true;
            }
        }
    } else {
        if ($password == $cpassword) {
            $hash_password = password_hash("$password", PASSWORD_DEFAULT);
            $sql = " INSERT INTO `thapalogin` (`username` , `phone` , `email` , `password`) VALUES ('$username', '$phone' ,'$email' ,'$hash_password')";
            $result = mysqli_query($conn, $sql);
            $registerAlert = true;
        } else {
            // echo "password is incorrect";
            $passwordAlert = true;
        }
    }
}

?>
<?php
if ($usernameAlert) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Username Error !</strong> Username is already exist. Please choose another username.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if ($emailAlert) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Email Error !</strong> Email address is already exist. Please choose another email address.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if ($passwordAlert) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Password Error !</strong>Password do not matched, Please enter correct password
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if ($registerAlert) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Register Successfull :- </strong> You have registered successfully now you can login.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
}
?>
<div class="container my-4 col-4 ">
    <h1 class="text-center">Create An Account</h1>
    <p class="text-center pb-2">Get started with your free account</p>
    <button type="button" class="btn btn-danger btn-lg btn-block"><i class="fab fa-google"></i>Login via
        Gmail</button>
    <button type="button" class="btn btn-primary btn-lg btn-block"><i class="fab fa-facebook-f"></i>Login via
        facebook</button>
    <h6 class="text-center mt-3">OR</h6>
    <div class=" jumbotron mt-3">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone Number</label>
                    <input type="phone" class="form-control" name="phone" id="phone">
                </div>
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Create My Account</button>
        </form>
        <div class="text-center my-3">
            <p>Have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
</div>

<?php
/*
 $sql = "select * from thapalogin where (username='$username' or email='$email');";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {

        $row = mysqli_fetch_assoc($result);
        if ($email == $row['email']) {
            echo "email already exists";
        } else {
            if ($username == $row['username']) {
                echo "username  already exists";
            }
        }
    } else {
        if ($password == $cpassword) {
            $hash_password = password_hash("$password", PASSWORD_DEFAULT);
            $sql = " INSERT INTO `thapalogin` (`username` , `phone` , `email` , `password`) VALUES ('$username', '$phone' ,'$email' ,'$hash_password')";
            $result = mysqli_query($conn, $sql);
            echo "register successfull";
        } else {
            echo "password is incorrect";
        }
    }
*/

?>