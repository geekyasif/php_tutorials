<?php  include 'header.php'; ?>
<div class="container" id="container">
    <div class="row my-4">

        <div class="col-md-8 border bg-white mb-5">

            <div class="col-md-12 mt-3">
                <div class="latest-post">
                    <h3 id="post-heading">Search : <?php echo $_GET['search_term']; ?> </h3>
                    <hr id="post-heading-hr" width="35%" class="float-md-left">
                    <br>
                </div>
            </div>
            <?php 
          
          require 'admin/db_connect.php'; 
        if(isset($_GET['submit'])){

          $search_term = $_GET['search_term'];
          $sql = "SELECT * FROM `post` WHERE `post_title` LIKE  '%$search_term%' OR `post_category` LIKE '%$search_term%' ";
          $result = mysqli_query($conn,$sql);
          $num = mysqli_num_rows($result);
          if($num > 0){
              while($row = mysqli_fetch_assoc($result)){

          ?>

            <div class="col-md-12 ">
                <div class="post-content mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <a class="post-img"
                                href="post_content.php?post_title=<?php echo $row['post_title']; ?>"><img
                                    src="admin/upload/<?php echo $row['post_image']; ?>" alt="" / width="200"
                                    height="160"></a>
                        </div>
                        <div class="col-md-8 px-0">
                            <div class="inner-content ">
                                <h4><a
                                        href='post_content.php?post_title=<?php echo $row['post_title']; ?>'><?php echo $row['post_title']; ?></a>
                                </h4>
                                <div class="post-information">
                                    <span>
                                        <i class="fa fa-tags " aria-hidden="true"></i>
                                        <a
                                            href='category.php?category_name=<?php echo $row['post_category']; ?>'><?php echo $row['post_category']; ?></a>
                                    </span>
                                    <!-- <span>
                                <i class="fa fa-user ml-2" aria-hidden="true"></i>
                                <a href='author.php'>Admin</a>
                            </span> -->
                                    <span>
                                        <i class="fa fa-calendar ml-2" aria-hidden="true"></i>
                                        <?php echo $row['post_datetime']; ?>
                                    </span>
                                </div>
                                <p class="description">
                                    <?php echo substr($row['post_description'],0,150); ?>
                                </p>
                                <a class='read-more  float-right'
                                    href='post_content.php?post_title=<?php echo $row['post_title']; ?>'>Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <?php
                     }
                    
                    }else{
                        echo "<h3 class='text-center my-2'>Sorry! No Result found.</h3>";
                    }
                }
                ?>

        </div>

        <?php   include 'sidebar.php'; ?> 

    </div>
</div>
<?php include 'footer.php'; ?>