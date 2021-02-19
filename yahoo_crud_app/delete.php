<?php

include 'header.php';
include 'connection.php';

if(isset($_POST['submit'])){
$id = $_POST['id'];
$sql = " DELETE FROM `student` WHERE `student`.`sid` = '$id' ";
$result = mysqli_query($conn, $sql);
if($result){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> Success! </strong> Your data has been deleted successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
else{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Error! </strong> Your data has been not deleted successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
}
mysqli_close($conn);

?>
<div class="container my-3">
<h2 class="text-center mb-3">Delete Records</h2>
<div class="jumbotron">
<form action="" method='POST'>
  <div class="form-group">
    <label for="id">Id</label>
    <input type="text" class="form-control" id="id" name="id">
  </div>
  <button type="submit" name="submit" class="btn btn-primary ">Delete</button>
</form>
</div>
</div>