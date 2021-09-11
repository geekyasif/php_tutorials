<?php
include 'header.php';
?>

<?php

if(isset($_POST['addcategory'])){
    require 'webdevcode/admin/db_connect.php';
    $category_name = $_POST['categoryName'];
    $sql = "INSERT  INTO `category` (`category_name`) VALUES ('$category_name')";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "category added successfully";
    }else{
        die("added unsuccessfully");
    }
}

?>



<div class="container">
    <h2 class="text-center">Add New Category</h2>
    <div class="jumbotron col-6 mx-auto mt-3">
        <form action="<?php echo htmlentities ($_SERVER['PHP_SELF']);?>" method="POST">
            <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Category Name">
            </div>
            <input class="btn btn-info" type="submit" name="addcategory" value="ADD CATEGORY">
        </form>
    </div>
</div>


<?php
include 'footer.php';
?>