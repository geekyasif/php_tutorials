<?php

// including header file 
include 'header.php';
include 'connection.php';
?>

<div class="container my-3">
 <h2 class="text-center mb-3 ">All Records</h2>

 <?php
    ;
    if(isset($_GET['page']) ){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }
    $limit = 3;
    $offset =  ($page - 1 ) * $limit ;
  // reading data from database
   $sql = "SELECT * FROM `student` LIMIT {$offset} , $limit";
   $result = mysqli_query($conn,$sql);
      if($result){
            $num = mysqli_num_rows($result);
      if($num > 0){

  ?>

 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">ADDRESS</th>
      <th scope="col">CLASS</th>
      <th scope="col">PHONE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>

      <?php
       
       //fetching data from database
        while ($row = mysqli_fetch_assoc($result)){
        
      ?>
     <tr>
      <td><?php echo $row['sid']; ?></td>
      <td><?php echo $row['sname']; ?> </td>
      <td><?php echo $row['saddress']; ?> </td>
      <td><?php echo $row['sclass']; ?> </td>
      <td><?php echo $row['sphone']; ?> </td>
      <td>
      <a href="edit.php?id=<?php echo $row['sid']; ?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true">EDIT</a>
      <a href="deleteatindex.php?id=<?php echo $row['sid']; ?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true">DELETE</a>
      </td>
    </tr>
        <?php } ?>
  </tbody>
</table>

<?php }
else{
  echo '<p class="text-center"> No data found !</p>';
} 
?>
<?php } ?>
</div>



<?php
include 'connection.php';
$sql = "SELECT * FROM `student`";
$result = mysqli_query($conn,$sql);
$num =  mysqli_num_rows($result);

$total_records = $num;
$limit_per_page = 3;
$total_pages = ceil($total_records/$limit_per_page);


?>

   <!-- and here we are adding pagination -->
   <nav aria-label="...">
       <ul class="pagination justify-content-center my-4 " id="pagination">
            

        <?php
        if($page > 1){
          echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page - 1).'">Prev</a></li>';
        }
           for($i = 1; $i <= $total_pages; $i++){
              if($i == $page){
                $active = "active";
              }else{
                $active = "";
              }
              echo '<li class="page-item '.$active.'"><a class="page-link"  href="index.php?page='.$i.'">'.$i.'</a></li>';

            }
            
            if( $page < $total_pages ){
              echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page + 1).'">Next</a></li>';
            }
            

           ?>

    </ul>
</nav>




