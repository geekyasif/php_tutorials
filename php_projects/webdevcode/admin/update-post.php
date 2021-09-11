<?php
include 'db_connect.php';

if(isset($_POST['updatePost'])){

    if(empty($_FILES['new-image']['name'])){
        $file_name = $_POST['old-image'];
      }else{
        $errors = array();
        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
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
    
      }
    
     
    $post_id = $_POST['id'];
    $post_title = $_POST['title'];
    $post_description = $_POST['description'];
    $post_category = $_POST['category'];
   
    $sql = "UPDATE `post` SET `post_title`='{$post_title}', `post_description`= '{$post_description}', `post_category`='{$post_category}', `post_image`= trim('{$file_name}') WHERE `post_id`= {$post_id};";
     $old_category = $_POST['old_category'];
    if($old_category != $post_category){
        $sql .= "UPDATE `category` SET no_of_post = no_of_post - 1 WHERE `category_name` = '{$old_category}';";
        $sql .= "UPDATE `category` SET no_of_post = no_of_post + 1 WHERE `category_name` = '{$post_category}'";
        } 

    $result = mysqli_multi_query($conn,$sql);
    if($result){
        echo "updated successfull";
       header("location: http://localhost/php_projects/webdevcode/admin/post.php");
    }
    else{
        echo "problem in editing post";
    }


}
