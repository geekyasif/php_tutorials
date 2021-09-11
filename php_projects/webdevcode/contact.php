<?php include 'header.php'; ?>

<style>
#contact-container {
    height: 80vh;
    margin-top: 100px;
}

.form {
    border-radius: 6px;
    background: white;
    width: 550px;
    margin: auto;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 1rem;
    padding: 3px 44px;
}

.form h3 {
    color: #17a2b8;
    text-align: center;
    padding: 18px;
    font-weight: 700;
}
</style>
<?php
$showAlertSuccess = false; 
$showAlertError = false; 

             include 'admin/db_connect.php';
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    include 'admin/db_connect.php';
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];
                    $sql = "INSERT INTO `contact`( `name`, `email`, `message`) VALUES ('$name','$email','$message')";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                     $showAlertSuccess = true;
                    }else{
                        $showAlertError = true;
                        
                    }
                }
            ?>

<?php

if($showAlertSuccess){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Mail Sent! </strong> You mail has been sent successfully,We will reply soon.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

}
if($showAlertError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Mail Not Sent! </strong> You mail has not been sent successfuly,Please try again.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>

<div class="container" id="contact-container">
    <div class="form" id="form">
        <h3>Get In Touch</h3>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF'] ); ?>" method="post">
            <div class="form-group ">
                <input type="text" class="form-control bg-light" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="NAME" name="name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control bg-light" id="exampleInputEmail1" placeholder="EMAIL" name="email" required>
            </div>
            <div class="form-group">
                <textarea class="form-control bg-light" id="exampleFormControlTextarea1" rows="3"
                    placeholder="MESSAGE" name="message" required></textarea>
            </div>
            <button type="submit" class="btn btn-info btn-lg btn-block" name="submit">SUBMIT HERE</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>