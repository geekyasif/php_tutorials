<div class="col-md-4">
    <div class="col-md-12 border bg-white">

        <div class="search my-3">
            <h3 id="search-heading">Search</h3>
            <hr width="35%" class="float-md-left sidebar-heading-hr">
        </div>
                  
        <form class="form-inline my-4" action="search.php" method="get">
            <input class="form-control mr-sm-2" type="search" name="search_term" placeholder="Search" aria-label="Search">
            <button class='button' type="submit" name="submit">Search</button>
        </form>
    </div>


    <div class="col-md-12 border my-4 bg-white">
        <div class="category my-3">
            <h3 id="category-heading">Recent Post</h3>
            <hr width="56%" class="float-md-left sidebar-heading-hr ">
        </div>

        <?php
            include 'admin/db_connect.php';
            $limit = 5;
            $sql = "SELECT * FROM `post` ORDER BY `post_id` DESC LIMIT $limit";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if($num > 0){
            
               while($row = mysqli_fetch_assoc($result)){

               
         ?>

        <ul class="recent-post  mt-3">
            <li class="recent-post-list">
                <a href="post_content.php?post_title=<?php echo $row['post_title']; ?>"><?php echo $row['post_title']; ?></a> <br>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?category_name=<?php echo $row['post_category']; ?>'><?php echo $row['post_category']; ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar ml-3" aria-hidden="true"></i>
                    <?php echo $row['post_datetime']; ?>
                </span>
            </li>
            <hr class="recent-post-hr">
        </ul>
  

        <?php
        }
    }else{
        echo "no post found !";
    }
    ?>
      </div>

    <div class="col-md-12 border my-4 bg-white">
            <div class="category my-3">
                <h3 id="category-heading">Categories</h3>
                <hr width="48%" class="float-md-left sidebar-heading-hr">
            </div>
            <ul id="list-category">

            <?php
            include 'admin/db_connect.php';
            
            $sql1 = "SELECT * FROM `category` ORDER BY `category_id` DESC";
            $result1 = mysqli_query($conn,$sql1);
            $num1 = mysqli_num_rows($result1);
            if($num1 > 0){

            while($row1 = mysqli_fetch_assoc($result1)){
                
                ?>

    <li><a href="category.php?category_name=<?php echo $row1['category_name']; ?>"><?php  echo $row1['category_name'] ?></a></li>
           
           <?php
            }
            }else{
                echo "no category found";
            }
            ?>

         </ul>
    </div>

</div>