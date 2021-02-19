<?php

// connnecting to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);

?>

<?php
if($conn){
?>
        <!-- <script>
            alert("connected successfully to database");
        </script> -->
<?php } 
else{
    ?>


   <!-- <script>
        alert("connected successfully to database");
    </script> -->

<?php } ?>
