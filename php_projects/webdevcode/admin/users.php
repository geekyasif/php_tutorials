<?php
include_once 'header.php';
?>
<?php
    if(isset($_SESSION["username"]) == 'Normal user'){
        session_start();
          header("location: http://localhost/php_projects/webdevcode/admin/post.php");
    }

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
            <h4 class="ml-4">All Users</h4>
        </div>
        <div class="col-2">
            <a href="add-user.php" class="btn btn-info btn-sm " role="button" aria-pressed="true"><svg id="addSvg"
                    width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
                </svg>ADD USER</a>
        </div>
    </div>

    <?php
   
       require 'db_connect.php';

       $sql = "SELECT * FROM `user` ORDER BY user_id DESC";
       $result = mysqli_query($conn,$sql);
       $num = mysqli_num_rows($result);
       if($num > 0){
                           

    ?>

    <table class="table  table-hover  table-bordered my-4">
        <thead class="thead-dark text-center">
            <tr>
                <th scope="col">S.NO</th>
                <th scope="col">FULL NAME</th>
                <th scope="col">USERNAME</th>
                <th scope="col">ROLE</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sno = 0;
                  while($row = mysqli_fetch_assoc($result)){
                      $sno = $sno+1
                  
            ?>
            <tr>
                <th class="text-center"><?php echo $sno; ?></th>
                <td class="text-center"><?php echo $row['user_fullname']; ?></td>
                <td class="text-center"><?php echo $row['user_name']; ?></td>
                <td class="text-center"><?php echo $row['user_role']; ?></td>
                <td class="text-center">
                    <a href="edit-user.php?id=<?php echo $row['user_id']; ?> ">
                        <svg class="svgAction" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                            <path fill-rule="evenodd"
                                d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                        </svg>
                    </a>
                </td>
                <td class="text-center"><a href="delete-user.php?id=<?php echo $row['user_id']; ?> "><svg class="svgAction" width="1em" height="1em"
                            viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM6 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                        </svg></a></td>
            </tr>

            <?php
                 }    
               }else{
                echo "no data found";
             }
            ?>
        </tbody>
    </table>

 
</div>