<?php
include 'header.php';
?>
<style>
.svgAction {
    color: black;
}

#addSvg {
    margin-right: 4px;
    margin-bottom: 3px;
}
</style>
<div class="container my-3">

    <div class="row">
        <div class="col-10">
            <h4 class="ml-4">All Posts</h4>
        </div>
        <div class="col-2">
            <a href="add-post.php" class="btn btn-info btn-sm " role="button" aria-pressed="true"><svg id="addSvg"
                    width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
                </svg>ADD POST</a>
        </div>
    </div>

    <?php
     include 'db_connect.php';
    
     if(isset($_GET['page'])){
        $page = $_GET['page'];
     }else{
         $page=1;
     }
     
     $limit = 7;
     $offset  = ($page - 1 ) * $limit;
    //  session_start();
    $author_name = $_SESSION['user_fullname'];
    $author_role = $_SESSION['user_role'];
   
   
    if($author_role == 'Admin'){

    $sql = "SELECT * FROM `POST` ORDER BY `post_id` DESC LIMIT {$offset} , $limit";
    }else{
        $sql = "SELECT * FROM `POST` WHERE `post_author` = '$author_name'  DESC LIMIT {$offset} , $limit";
    }
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {

    ?>

    <table class="table  table-hover  table-bordered my-4">
        <thead class="thead-dark text-center">
            <tr>
                <th scope="col">S.NO</th>
                <th scope="col">TITLE</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">AUTHOR NAME</th>
                <th scope="col">DATE</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $sno = $offset + 1;

                while ($row = mysqli_fetch_assoc($result)) {
                  
                ?>
            <tr>
                <td class="text-center"><?php echo $sno; ?></td>
                <td><?php echo $row['post_title']; ?></td>
                <td class="text-center"><?php echo $row['post_category']; ?></td>
                <td class="text-center"><?php echo  $row['post_author']; ?></td>
                <td class="text-center"><?php echo $row['post_datetime']; ?></td>
                <td class="text-center">
                    <a
                        href="edit-post.php?id=<?php echo $row['post_id'];?>&category=<?php echo $row['post_category'];?>">
                        <svg class="svgAction" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                            <path fill-rule="evenodd"
                                d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                        </svg>
                    </a>
                </td>
                <td class="text-center">
                    <a
                        href="delete-post.php?id=<?php echo $row['post_id'];?>&category=<?php echo $row['post_category'];?>"><svg
                            class="svgAction" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM6 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                        </svg>
                    </a>
                </td>
            </tr>
            <?php
                $sno++; }
            }else{
                echo "no post found";
            }
            ?>

        </tbody>
    </table>
      
    <nav aria-label="...">
            <ul class="pagination pagination-md justify-content-center">
                <?php
                 include 'db_connect.php';

                 $sql1 = "SELECT * FROM `post`";
                 $result1 = mysqli_query($conn,$sql1);
                 $total_records = mysqli_num_rows($result1);
                //  echo $total_records .'<br>';
                 $limit_show_records = 7;
                //  echo $limit_show_records .'<br>';
                 $total_pages = ceil($total_records/$limit_show_records);

               if($page > 1){

                   echo '<li class="page-item "><a class="page-link" href="post.php?page='.($page - 1).'">Prev</a></li>';
               }
                 for($i = 1 ; $i <= $total_pages; $i++){
                    if($page == $i){
                        $active = 'active';
                    }else{
                        $active ="";
                    }
                     echo '<li class="page-item '.$active.'"><a class="page-link" href="post.php?page='.$i.'">'.$i.'</a></li>';
                 }
                 if($page < $total_pages){

                    echo '<li class="page-item "><a class="page-link" href="post.php?page='.($page + 1).'">Next</a></li>';
                }
                 
                ?>
            </ul>
        </nav>
</div>