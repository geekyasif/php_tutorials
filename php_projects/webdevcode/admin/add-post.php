<?php
include_once 'header.php';
require 'db_connect.php';
?>

<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $text = explode('.',$file_name);
        $file_ext = end($text);
        
        $extensions = array("jpeg", "jpg", "png");
    
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
    
        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }
    
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp,"upload/".$file_name);
            echo "image upload Success";
        } else {
            print_r($errors);
            die("error uplosad image");
        }
        $post_title = mysqli_real_escape_string($conn, $_POST['title']);
        $post_description = mysqli_real_escape_string($conn, $_POST['description']);
        $post_category = mysqli_real_escape_string($conn, $_POST['category']);
        $post_author = $_SESSION['user_fullname'];

        $sql = "INSERT INTO `post` ( `post_title`, `post_description`, `post_category`,`post_image`, `post_author`) VALUES ('$post_title','$post_description','$post_category','$file_name','$post_author');";

        $sql .= "UPDATE `category` SET no_of_post = no_of_post + 1 WHERE `category_name` = '$post_category'";

        if (mysqli_multi_query($conn, $sql)) {
            echo "successfully added post";
        } else {
            echo "erroorr last";
        }
  
}

?>


<div class="container">
    <h2 class="text-center">Add New Post</h2>
    <div class="jumbotron col-10 mx-auto mt-3">

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description"  class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class='form-control' id='category' name='category'>
                    <option selected>Select Category</option>
                    <?php

                    include 'db_connect.php';
                    $sql = "SELECT * FROM `category`";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                            <option> <?php echo $row['category_name']; ?></option>


                    <?php
                        }
                    } else {
                        echo "no category found";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Post image</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <input class="btn btn-info" type="submit" name="submit" value="ADD POST">
        </form>
    </div>
</div>


<?php
include 'footer.php';
?>
