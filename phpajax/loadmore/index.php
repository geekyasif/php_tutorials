<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>php ajax read data</title>
    <style>
    .loadBtn{
        margin-left: 516px !important;

     }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">PHP AJAX READ DATA</h1>
        <h4 class="text-center my-4">STUDENT TABLE</h4>


     <!-- table content start here it show data that are fetched from databased -->
     <table class="table mt-4"  id="table">
    <thead>
       <tr>
           <th scope="col">S.no</th>
           <th scope="col">Name</th>
           <th scope="col">Destination</th>
           <th scope="col">edit</th>
           <th scope="col">delete</th>
       </tr>
   </thead>
        
    </div>
    <!-- Optional JavaScript -->
    <script src="jquery/jquery-3.5.1.min.js"></script>
    <script>
    // starting the jquery with making a nonymous function that tells that the jquery is starts from here
     $(document).ready(function(){
         function onload(page_no){
             $.ajax({
                 url:"loadpagination.php",
                 type: "post",
                 data: {page_no : page_no},
                 success: function(data){
                   if(data){
                       $("#pagination").remove();
                       $("#table").append(data);
                   }else{
                    //    $("#loadBtn").html("finished");
                       $("#loadBtn").prop("disabled",true);
                   }
                 }

             })
         };
         onload();

         $(document).on("click","#loadBtn",function(){
             $("#loadBtn").html("loading data..");
             let page_id = $(this).data("id");
             onload(page_id);
         })
     });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>