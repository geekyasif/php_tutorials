<?php
include 'header.php';
?>


<div class="container">
    <h2 class="text-center">Edit Post</h2>
    <div class="jumbotron col-10 mx-auto mt-3">


        <?php
        include 'db_connect.php';
        $post_id = $_GET['id'];
        $post_category = $_GET['category'];
        $sql = "SELECT * FROM `post` WHERE `post_id` = '$post_id'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {

        ?>
        <form action="update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <?php
                while ($row = mysqli_fetch_assoc($result)) {

                ?>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['post_id']; ?>"
                    hidden>
                <input type="text" class="form-control" id="title" name="title"
                    value="<?php echo $row['post_title']; ?>">
                   
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" name="description"><?php echo $row['post_description']; ?></textarea>
            </div>
           
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                    <?php
                   
                            include 'db_connect.php';
                            $sql1 = "SELECT * FROM `category`";
                            $result1 = mysqli_query($conn, $sql1);
                            $num1 = mysqli_num_rows($result1);
                            echo $row1['category_name'];
                            if ($num1 > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    if ($post_category == $row1['category_name'] ) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                            ?>
                    <option <?php echo $selected; ?> value="<?php echo $row1['category_name']; ?>"> <?php echo $row1['category_name']; ?></option>


                          <?php

                                }
                            }
                           
                            ?>
                </select>
                <input type="hidden" name="old_category" value="<?php echo $post_category; ?>">
              
            </div>
            <div class=" form-group">
                        <label for="file">Post image</label>
                        <input type="file" class="form-control-file" id="file" name="new-image">
                        <img src="upload/<?php echo $row['post_image']; ?>" height="150px" width="200px">
                        <input type="hidden" class="form-control-file" id="file" name="old-image" value="<?php echo $row['post_image']; ?>">
                        
            </div>
            <input class="btn btn-info" type="submit" name="updatePost" value="UPDATE POST">
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