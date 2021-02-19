<?php
include 'header.php';
?>

<?php
 $sendMail = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include 'db_connect.php';
    $email = $_POST['email'];

    $sql = "SELECT * FROM `email_verification` WHERE `email` = '$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
          $row = mysqli_fetch_assoc($result);
          $token = $row['token'];
          $username = $row['username'];
          $to = $email;
          $subject = "Reset Password";
          $message = "hello $username, \n
                      Email : $email \n
                      Click here to reset your password http://localhost/learnPHP/reset_password.php/update_password.php?token=$token";
          $headers = "from: mdasif08737@gmail.com";

          if(mail($to,$subject,$message,$headers)){
            //   echo "mail sent successfully";
            $sendMail = true;
          }else{
              echo "mail not send";
          }
    }else{
        echo "no mail found register your self";
    }
}

?>


<?php
if ($sendMail) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Mail send :- </strong> Mail sent successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}
?>
<h3 class="text-center my-4">Enter email to reset your password</h3>
<div class="container jumbotron col-6 ">
    <form action="" method="post">
    <div class="form-group ">
                <label for="email">Enter your Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Send mail</button>
    </form>
</div>

