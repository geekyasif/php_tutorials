<?php
include '_db_connect.php';

?>
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
   
     if($_SERVER['REQUEST_METHOD'] == "POST"){
       $title = $_POST['title'];
       $description = $_POST['description'];
       $sql = "INSERT INTO `phpnotes`( `title`, `description`) VALUES ('$title','$description')";
       $result = mysqli_query($conn,$sql); 
       if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> Your form has been submit successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong> Error ! </strong> Your form has not been submit successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
     }
    ?>

  
  <div class="container my-4 ">
    <h2 class="text-center">Add a Note to PhpNotes</h2>
    <form action="/learnphp/harrycrud/index.php" method="POST">
      <div class="form-group">
        <label for="title">Note Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="desccription">Note Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-danger">Add Note</button>
    </form>
  </div>

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
