<?php
include 'connection.php';
include 'header.php';

?>
<div class="container my-3">
<h2 class="text-center mb-3">Update Records</h2>
<div class="jumbotron">
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
  <div class="form-group">
    <label for="id">Id</label>
    <input type="text" class="form-control" id="id" name="id">
  </div>
  <button type="submit" name="show" class="btn btn-primary my-3">Show</button>

    <?php
     if(isset($_POST['show'])){ 

       $id = $_POST['id'];
     $sql = " SELECT * FROM student WHERE `sid` = $id";
     $result = mysqli_query($conn,$sql);
      $num =  mysqli_num_rows($result);
     if($num> 0){
       while($row = mysqli_fetch_assoc($result)){
    ?>
        <div class="form-group">       
          <label for="name">Name</label>
          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['sid'];?>" >
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['sname'];?>" >
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['saddress'];?>">
        </div>
        <div class="form-group ">
            <label for="class">Class</label>
            <input type="text" class="form-control" id="class" name="class" value="<?php echo $row['sclass'];?>">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['sphone'];?>" >
       </div>
       <button type="submit" name="update" class="btn btn-primary my-3">Update</button>
  </form>

  <?php
  }
  }
}
?>

<?php
if(isset($_POST['update'])){

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$class = $_POST['class'];
$phone = $_POST['phone'];



$sql  = "UPDATE `student` SET `sname` = '{$name}' , `saddress` = '{$address}' ,`sclass` = '{$class}', `sphone` = '{$phone}' WHERE `sid` ='{$id}'";

$result = mysqli_query($conn,$sql);

if($result){
    header("Location: http://localhost/learnphp/crud_app/index.php");
}
else{
    die("Error");
}


}
?>
