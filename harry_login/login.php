<?php
include 'index.php';
?>
<?php
         $loginAlert = false;

include 'db_connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql  = "SELECT * FROM `harrylogin` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn,$sql);
     $num = mysqli_num_rows($result);
     if($num == 1){
         session_start();
         $_SESSION['loggedin'] = true;
         $_SESSION['username'] = $username;
         header('location: index.php');
     }
     else{
            //  echo "invalid creditantial";
             $loginAlert = true;  
       }
}


?>
<?php
if($loginAlert){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Login Error !</strong> Invalid input.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>

<div class="container  my-4  col-4">
    <h2 class="text-center mb-4 border-bottom py-2">Login Here</h2>
    <div class="jumbotron">
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
                <small id="emailHelp" class="form-text text-muted">Enter your unique username</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-danger ">Login</button>
        </form>
    </div>
</div>
