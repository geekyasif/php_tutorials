<?php
include 'header.php';
?>


<?php
require 'db_connect.php';

 $category_id = $_GET['id'];
 $sql = "SELECT * FROM `category` WHERE `category_id` = '$category_id'";
 $result = mysqli_query($conn,$sql);
 $num = mysqli_num_rows($result);
 if($num == 1)
 {
      


?>

<div class="container">
    <h2 class="text-center">Edit Category</h2>
    <div class="jumbotron col-6 mx-auto mt-3">
    <?php
      while($row = mysqli_fetch_assoc($result)){

      
    ?>
        <form action="update-category.php" method="POST">
            <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" id="categoryid" name ="categoryid" value="<?php echo $row['category_id']; ?>" hidden>
                <input type="text" class="form-control" id="categoryName" name="categoryName" value="<?php echo $row['category_name']; ?>">
            </div>
            <input class="btn btn-info" type="submit" name="submit" value="ADD CATEGORY">
        </form>
        <?php
        }
    }
        ?>
    </div>
</div>


<?php
include 'footer.php';
?>