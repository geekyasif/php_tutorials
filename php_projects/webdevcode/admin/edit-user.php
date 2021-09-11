<?php
include 'header.php';
?>

<?php

require 'db_connect.php';
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM `user` WHERE `user_id` = '$user_id'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){

  
?>


<div class="container">
    <h2 class="text-center">Edit User</h2>

    <div class="jumbotron col-6 mx-auto mt-3">
        <?php
         while($row= mysqli_fetch_assoc($result)){
        
        ?>
        <form action="update-user.php" method="POST">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="userid" name="userid" value="<?php echo $row['user_id']; ?>" hidden>
                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="full Name"
                    value="<?php echo $row['user_fullname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                    value="<?php echo $row['user_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="userrole">User Role</label>
                <select class="form-control" id="userrole"  name="userrole"  value="<?php echo $user_role = $row['user_role']; ?>">
                <?php
                     if($user_role == 'Admin'){
                                echo  '<option value="Admin" selected>Admin</option>';
                                echo  '<option value="Normal User">Normal User</option>';
                            }else{
                                echo  '<option value="Admin">Admin</option>';
                                echo '<option value="Normal User" selected>Normal User</option>';
                    }
                ?> 
                </select>
            </div>
            <input class="btn btn-info" type="submit" name="submit" value="UPDATE USER">
        </form>

        <?php
        }
        }else{
            echo "user not found";
        }
    
    ?>

    </div>
</div>


<?php
include 'footer.php';
?>