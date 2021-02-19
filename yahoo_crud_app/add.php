<?php

include 'header.php';
include 'connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
  $name = $_POST['name'];
  $address = $_POST['address'];
  $class = $_POST['class'];
  $phone = $_POST['phone'];
 
  $sql = "INSERT INTO `student` (`sname`, `saddress`, `sclass`, `sphone`) VALUES ( '$name', '$address', '$class', '$phone')";

  $result = mysqli_query($conn,$sql);
  if($result){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success! </strong> Your form has been submit successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong> Error ! </strong> Your form has not been submit successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  
  
}

?>


<div class="container my-3">
<h2 class="text-center mb-3">Add New Records</h2>
<div class="jumbotron">

<form action="" method="POST">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" >
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" >
  </div>
  <div class="form-group ">
      <label for="class">Class</label>
      <input type="text" class="form-control" id="class" name="class" >
    </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>