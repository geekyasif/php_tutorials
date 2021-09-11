<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,300&family=Open+Sans:wght@300;400&family=Raleway&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>WebDevCode : Best blog to learn programming</title>
    <style>
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        #logo h1 {
            color: white;
            font-size: 2.5rem;
            text-align: center;
        }

        #navbar {

            text-align: center;

        }

        #navbar li a {
            color: white;
            display: block;
            padding: 9px 8px;
            margin-top: 16pxx;
        }

        .display-4 {
            font-size: 1.7rem;
            font-weight: 500;
            line-height: 1.2;
        }

        .lead {
            font-size: 1rem;
            font-weight: 300;
        }

        img {

            width: 85%;
            height: 95%;
            margin: 0px 13px;
        }

        .inner-content {
            text-align: center;
        }

        .post-information {
            text-align: center;
        }

        .read-more {

            /* font-size: 18px; */

            margin-right: 133px;

        }

        .button {

            margin-left: 15px;

        }

        .form-control {
            width: 60%;
        }

        #blog-footer-ul {
            list-style: none;
            text-align: center;
            padding: 0px;
        }

        .ml-1,
        .mx-1 {
            margin-left: .25rem !important;
            text-align: center;
        }

        .footer-logo {
            margin-top: 15px;
            text-align: center;
        }

        .term-condition {

            margin-right: 59px;
        }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {}

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {}

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {}

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {}
    </style>
</head>

<body>
    <div id="header">
        <div class="container ">
            <div class="row">
                <div class="col-md-4">
                    <div id="logo"><a href="index.php">
                            <h1>WebDevCode</h1>
                        </a></div>
                </div>
                <div class="col-md-8 ">
                    <ul id="navbar" class="float-md-right">
                        <li><a href="index.php">HOME</a></li>
                        <?php
                            include 'admin/db_connect.php';
                            
                            $sql = "SELECT * FROM `category` ORDER BY `category_id` DESC";
                            $result = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($result);
                            if($num > 0){

                            while($row = mysqli_fetch_assoc($result)){
                            
                        
                            ?>
                            <li><a href="category.php?category_name=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></a></li>
                            <?php
                            }
                            }else{
                                echo "no category found";
                            }
                            ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>



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
</body>

</html>