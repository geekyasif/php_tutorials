
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


  <title>PhpNotes - Notes taking made easy</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">PhpNotes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
      </form>
        <button class="btn btn-danger my-2 mx-1 my-sm-0" type="submit">Login</button>
        <button class="btn btn-danger my-2  my-sm-0" type="submit">Sign Up</button>
    </div>
  </nav>


  <?php

$id = $_GET['Id']; 

include '_db_connect.php';
$sql = " SELECT * FROM `phpnotes` WHERE `sno` = '$id'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num > 0){
while($row = mysqli_fetch_assoc($result)){
?>

  <div class="container my-4 ">
    <h2 class="text-center">Update Your Note </h2>
    <form action="/learnphp/harrycrud/edit_update_modal.php" method="POST">
      <div class="form-group">
        <label for="title">Update Note Title</label>
        <input type="hidden" class="form-control" id="editId" name="editId" aria-describedby="emailHelp" value="<?php echo $row['sno'];?>">
        <input type="text" class="form-control" id="editTitle" name="editTitle" aria-describedby="emailHelp" value="<?php echo $row['title'];?>">
      </div>
      <div class="form-group">
        <label for="desccription">Update Note Description</label>
        <textarea class="form-control" id="editDescription" name="editDescription" rows="3"><?php echo $row['description'];?></textarea>
      </div>
      <button type="submit" class="btn btn-danger">Update Note</button>
    </form>
  </div>

  <?php
}
}
 
?>


  <div class="container my-4 ">
    <table class="table " id="myTable">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="d-none">sno</th>
          <th scope="col">S.No</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        <?php 
        include '_db_connect.php';
       
          $sql = "SELECT * FROM `phpnotes`";
          $result = mysqli_query($conn, $sql);
          $sid = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sid = $sid + 1;
          ?>
        
          <tr>
            <th scope='row' class="d-none"><?php echo $row['sno']; ?></th>
            <th scope='row'><?php echo $sid; ?></th>
            <td><?php echo  $row['title'];?> </td>
            <td><?php echo  $row['description'];?> </td>
            <td> 
            <a href="edit_modal.php?Id=<?php echo $row['sno']; ?>" role="button" class="btn btn-danger" >
             Edit
            </a>
            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['sno']; ?>" role="button">Delete</a>  
            </td>
          </tr>
          <?php
          }
        ?>

      </tbody>
    </table>
  </div>
  <hr>

 
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
 
</body>

</html>

 
