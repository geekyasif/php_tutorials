<?php
include 'index.php';
include 'db_connect.php';

?>
<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    $to = "mdasif08737@gmail.com";
    $subject = "comment";
    $message = $description;
    $headers = "from: $email";
    if(!mail($to,$subject,$message,$headers)){
        echo"not sent";
    }

    $sql = "INSERT INTO `contact_form`( `name`, `email`, `description`) VALUES ('$name','$email','$description')";
    $result = mysqli_query($conn,$sql);
    if($result){
       
        echo "thank you for your comment";
    }else{
        die("fail");
    }

}


?>
<div class="container col-6 my-4 mx-auto">
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Full Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>