
<?php
require 'db_connect.php';
session_start();
if(!$_SESSION['user_name']){

    header("location: http://localhost/php_projects/webdevcode/admin");
}
?>

<!doctype html>
<html lang="en">



<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

      

    <style>
    .navbar2 a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent;
        padding: 24px 11px;
        font-weight: 600;
    }

    .navbar2 a:hover {
        text-decoration: none;
        background-color: #61686f;
    }

    #svgLogout {
        margin-right: 6px;
        margin-bottom: 4px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow p-3 mb-5  rounded">
        <a class="navbar-brand mb-0 h1 ml-5" href="#">WEBDEV ASIF</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="list-inline-item  ml-5 navbar2"><a href="post.php" class="text-white">POST</a></li>
                <li class="list-inline-item mx-5 navbar2"><a href="category.php" class="text-white">CATEGORY</a></li>
                <?php
                if($_SESSION['user_role'] == 'Admin'){

                 echo   '
                    <li class="list-inline-item  navbar2"><a href="users.php" class="text-white">USERS</a></li>';
                }
                ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active text-white mr-2">Hello <?php echo $_SESSION["user_fullname"]; ?>,</li>
            </ul>
            <a href="logout.php" class="btn btn-info btn-md ml-3 mr-4 " role="button" type="submit" name="submit">
                <svg id="svgLogout" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg> LOGOUT</a>
        </div>
    </nav>





 


</body>
   <!-- Optional JavaScript -->
 
  
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</html>

