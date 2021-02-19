<?php
include 'header.php';
include 'db_connect.php';
$loginSuccess = false;
$WrongPasswordAlert = false;
$notRegisteredAlert = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = " SELECT * FROM `email_verification` where `email` = '$email' AND `status` = 'active'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($hash_verified_password = password_verify($password, $row['password'])) {
                //   echo "login successfully";
                // $loginSuccess = true;
                session_start();
                // $_SERVER['loggedin'] = true;
                $username = $row['username'];
                $_SESSION['username'] =  $username;
                header("Location: index.php");
            } else {
                //    echo "incorrect password";
                $WrongPasswordAlert = true;
            }
    } else {if($row['status'] == 'inactive'){

        //   echo "No email is found please register yourself first";
        echo "email is not verified";
    }else{
        $notRegisteredAlert = true;
    }
    }
}

?>
<?php
if ($loginSuccess) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Login Successfull :- </strong> You have Logged in successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}
if ($WrongPasswordAlert) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password Error !</strong>Password do not matched, Please enter correct password
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}
if ($notRegisteredAlert) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Unsuccessfull :- </strong> No email is found , Please registered yourself.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}
?>

<div class="container my-4 col-6 ">
    <h1 class="text-center mb-3">Login Here</h1>
    <button type="button" class="btn btn-danger btn-lg btn-block"><i class="fab fa-google"></i>Login via Gmail</button>
    <button type="button" class="btn btn-primary btn-lg btn-block"><i class="fab fa-facebook-f"></i>Login via
        facebook</button>
    <h6 class="text-center mt-3">OR</h6>
    <div class=" jumbotron mt-3">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

            <div class="form-group ">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Login Now</button>
        </form>
        <div class="text-center my-3">
            <p>Not have an account? <a href="register.php">Sign up here</a></p>
        </div>
    </div>
</div>