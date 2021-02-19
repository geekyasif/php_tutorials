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
</head>

<body>
    <div class="container">
        <h1 class="text-center">PHP AJAX READ DATA</h1>
        <h4 class="text-center my-4">STUDENT TABLE</h4>

        <!-- this is the input from where you add data -->
        <form id="form">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="fullname" placeholder="full name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="destination" placeholder="destination">
                </div>
                <button class="btn btn-success btn-md" id="addbtn">Add Data</button>
            </div>
        </form>

        <div class="row my-4">
            <!-- this is response div where it show error or successs massages -->
            <div class="col">
                <div id="response"></div>
            </div>

            <!-- live search in ajax -->
            <div class="col">

                <div class="search-bar form-inline float-right">
                    <label for="Serch">
                        <h4 class="mx-2">Search</h4>
                    </label>
                    <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search">
                </div>
            </div>

        </div>
        <!-- table content start here it show data that are fetched from databased -->
        <table class="table mt-4" id="table">
        </table>


        <!-- and here we are adding pagination -->
        <nav aria-label="...">
            <ul class="pagination justify-content-center my-4" id="pagination">
               
                <li class="page-item active"><a class="page-link" id="page_number" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
               
            </ul>
        </nav>



        <!-- Modal -->
        <div class="modal fade" id="update_modal" tabindex="-1" aria-labelledby="update_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="update_modal">Edit details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="text" class="form-control my-3" id="update_fullname" placeholder="full name">
                        <input type="text" class="form-control" id="update_destination" placeholder="destination">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update_edit_btn">Save changes</button>
                        <!-- hidden user id -->
                        <input type="hidden" id="update_hidden_id">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="jquery/jquery-3.5.1.min.js"></script>
    <script>
    // starting the jquery with making a nonymous function that tells that the jquery is starts from here
    $(document).ready(function() {


        // function for load data from datbase
        function loaddata() {
            //  making ajax call to fetch data from database
            $.ajax({
                url: "load-data.php",
                type: "POST",
                success: function(data) {
                    $("#table").html(data);
                }
            });
        };

        loaddata();


        //  jquery for adding data into the database
        $("#addbtn").on("click", function(e) {
            e.preventDefault();
            let fullname = $("#fullname").val();
            let destination = $("#destination").val();

            if (fullname == "" || destination == "") {
                alert("fill the empty form")
            } else {
                $.ajax({
                    url: "insertdata.php",
                    type: "post",
                    data: {
                        fullname: fullname,
                        destination: destination
                    },
                    success: function(data) {
                        if (data == 1) {
                            loaddata();
                            $("#form").trigger("reset");
                            $("#response").html("data added successfully").fadeOut();

                        } else {
                            alert('data not inaerted');
                        }
                    }
                });
            }
        });


        // function for deleting data from database
        $(document).on("click", ".deleteBtn", function() {

            let id = $(this).data("id");
            let element = this;
            $.ajax({
                url: "delete-data.php",
                type: "post",
                data: {
                    id: id
                },
                success: function(data) {
                    if (data == 1) {
                        $(element).closest("tr").fadeOut();

                        loaddata();
                    } else {
                        alert('data not inaerted');
                    }
                }
            });

        });

        // edit modal
        $(document).on("click", ".editbtn", function() {
            let editid = $(this).data("id");
            // alert(editid)
            $.ajax({
                url: "update-edit.php",
                type: "post",
                data: {
                    editid: editid
                },

                success: function(data) {
                    let user = JSON.parse(data);
                    $("#update_hidden_id").val(user.sno);
                    $("#update_fullname").val(user.name);
                    $("#update_destination").val(user.dest);
                }
            })
            $("#update_modal").modal("show");
        });



        //update edit modal
        $("#update_edit_btn").on("click", function() {
            let update_hidden_id = $("#update_hidden_id").val();
            let update_fullname = $("#update_fullname").val();
            let update_destination = $("#update_destination").val();

            $.ajax({
                url: "update-edit-data.php",
                type: "post",
                data: {
                    update_hidden_id: update_hidden_id,
                    update_fullname: update_fullname,
                    update_destination: update_destination
                },
                success: function(data) {
                    if (data == 1) {
                        $("#update_modal").modal("hide");
                        loaddata();

                    } else {
                        $("#update_modal").modal("hide");
                        alert('data not updated');
                        loaddata();
                    }
                }
            });


        });



        // search bar 

        $("#search").on("keyup", function() {
            let search_term = $(this).val();

            $.ajax({
                url: "search.php",
                type: "post",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table").html(data);

                }
            })
        })


        //pagination






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