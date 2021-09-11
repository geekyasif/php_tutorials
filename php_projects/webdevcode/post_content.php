
  <?php include'header.php';?> 
 
 <!-- Post Content Column -->
<div class="container my-4 ">
    <div class="row">
    <div class="col-sm-8 border bg-white mb-4">

    <?php
    include 'admin/db_connect.php';
    $post_title = $_GET['post_title'];
    $sql = "SELECT * FROM `post` WHERE `post_title` = '$post_title'";
     $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){

     
    ?>

<!-- Title -->
<h2 class="mt-4"><?php echo $row['post_title'];?> </h2>

<!-- Author -->
<p class="lead">
    by
    <a href="index.php">Webdev Code</a>
</p>

<hr>

<!-- Date/Time -->
<p>Posted on <?php echo $row['post_datetime'];?> </p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="admin/upload/<?php echo $row['post_image'];?> " alt="<?php echo $row['post_title'];?>">

<hr>

<!-- Post Content -->
<p><?php echo $row['post_description'];?> </p>


    <?php
 }
    ?>
</div> 
        <?php include'sidebar.php';?>
    </div>
</div>  


  <?php include'footer.php';?>