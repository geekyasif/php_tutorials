<?php
include 'header.php';
include 'connection.php';

?>
<div class="container my-3">
 <h2 class="text-center mb-3 ">Edit Records</h2>
 <div class="jumbotron">


<?php
  $id = $_GET['id'];
 $sql = " SELECT * FROM `student` WHERE `sid` = '$id'";
 $result = mysqli_query($conn,$sql);
 $num = mysqli_num_rows($result);
 if($num > 0){

     while($row = mysqli_fetch_assoc($result)){
         
   
 ?>
<form action="editupdate.php" method="POST">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['sid'];?>" >
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['sname'];?>" >
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['saddress'];?>" >
  </div>
  <div class="form-group ">
      <label for="class">Class</label>
      <input type="text" class="form-control" id="class" name="class" value="<?php echo $row['sclass'];?>">
    </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['sphone'];?>" >
  </div>
  <button type="submit" class="btn btn-primary" value="update">Update</button>
</form>

 <?php 
    }
 } 
?>
</div>

 </div>


