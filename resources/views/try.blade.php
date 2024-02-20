<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing Data</title>

    <link rel="stylesheet" href="css/uikit.min.css">
    <link rel="stylesheet" href="css/dataTables.uikit.min.css">
    <link rel="stylesheet" href="css/form.css">





</head>

<body>


    
    <form id="insertfrm" name="insertfrm">

        @csrf

        {{-- modal  starts --}}
        <div class="modal" tabindex="-1" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Warning!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are You Sure To Delete?</p>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            id="btnNo">No</button>
                        <button type="submit" class="btn btn-primary" id="btnyes">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal ends --}}
        <fieldset>
            <legend>Testing Table</legend>
            <div class="mb-3">
                <label for="sid" class="form-label">Sid</label>
             
                <input type="text" class="form-control" id="sid" name="sid" aria-describedby="sidHelp">
            
                <div id="sidHelp" class="form-text">Enter Sid Here . </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label class="form-check-label" for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address">

            </div>


            <button type="button" id="insert" class="btn btn-primary">Insert Data</button>


        </fieldset>

    </form>

&nbsp;
    <div>
        <table id="myTable" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>SID</th>
                    <th>NAME</th>
                    <th>ADDRESS</th>
                    <th>DELETE</th>
                    <th>UPDATE</th>
                </tr>
            </thead>
            <tbody id="result">

            </tbody>

        </table>
    </div>



    <script src="js/jquery-3.7.0.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.uikit.min.js"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {

            getData();

            //show data 
            function getData() {

                $.ajax({

                    "method": "GET",
                    "url": "http://127.0.0.1:8000/api/getData",
                    "success": function(response) {
                        console.log(response);
                        var op = "";
                        $.each(response.data, function(index, row) {
                            op += "<tr>";
                            op += "<td>" + row.sid + "</td>";
                            op += "<td>" + row.name + "</td>";
                            op += "<td>" + row.address + "</td>";
                            op += "<td><button type='button' data-id='" + row.id +
                                "' class='delete btn btn-danger'>Delete</button></td>";
                            op += "<td><button type='button'  data-id='" + row.id +
                                "' data-sid='" + row.sid + "' data-name='" + row.name +
                                "' data-addr='" + row.address +
                                "' class='updatebtn btn btn-success'>Update</button></td>";
                            op += "</tr>";
                        });
                        $("#result").html(op);
                        reload();
                    },
                    "error": function(error) {
                        console.log(error);
                    }

                })


            }

            function reload() {
                var table = new DataTable('#myTable');
            }


            getData();




            //insert data
            $("#insert").click(function() {
                reload();
                $.ajax({
                    "method": "POST",
                    "url": "http://127.0.0.1:8000/api/insertsingleData",
                    "data": {
                        "sid_val": $("#sid").val(),
                        "name_val": $("#name").val(),
                        "add": $("#address").val()
                    },
                    "success": function(response) {
                        // console.log("hello");
                        reload();
                        console.log(response);

                        getData();



                    },
                    "error": function(error) {
                        console.log(error);
                    }

                })
            })



            // delete code
            $(document).on("click", ".delete", function() 
            {

                var id = $(this).attr('data-id');
                $("#myModal").modal('show');


                $("#btnyes").click(function() {

                    $.ajax({
                        "method": "GET",
                        url: "http://127.0.0.1:8000/api/deleteDataparam/" +
                        id, // Concatenate id with the URL

                        "success": function(reaspose) {
                            console.log("deleted");
                           
                            $("#myModal").modal('hide');
                            getData();

                        },
                        "error": function(error) {
                            console.log(error);
                        }

                    });
                });
                // Close the modal on "No" button click
                $("#btnNo").on("click", function() {
                    $("#myModal").modal('hide');
                });

            });

            //update code

            $(document).on("click", ".updatebtn", function()

                {
                    var id = $(this).attr('data-id');
                    var sid = $(this).attr('data-sid');
                    var name = $(this).attr('data-name');
                    var add = $(this).attr('data-addr');


                    $("#sid").val(sid);
                    $("#name").val(name);
                    $("#address").val(add);

                    // Change the button text and ID to "Update" and "update" respectively
                    $("#insert").text("Update Data").attr("id", "update");

                    // Disable all other update buttons except for the current one
                    $(".updatebtn").prop('disabled', true);


                    $(document).off("click", "#update");

                    var cancelButton = $("<button/>", 
                    {
                        type: "button",
                        class: "btn btn-warning cancel",
                        text: "Cancel"
                    });

                    $(this).parent().append(cancelButton); //to add cancel button beside update button

                    cancelButton.on("click", function() {
                        $("#update").text("Insert Data").attr("id", "insert");
                        $(".updatebtn").prop('disabled', false);
                        cancelButton.remove(); // Remove the Cancel button
                        $("#sid").val("");
                        $("#name").val("");
                        $("#address").val("");
                    });

                    /*Handle the click event for the "Update" button
                    This structure ensures that the update button's click event is bound only once 
                    and will correctly handle the update action without duplicating or adding new records unintentionally. */

                    $("#update").unbind("click").on("click", function() {

                        $.ajax({
                            "method": "POST",
                            "url": "http://127.0.0.1:8000/api/updateData",
                            "data": {
                                "id": id,
                                "sid1": $("#sid").val(),
                                "name1": $("#name").val(),
                                "address1": $("#address").val()
                            },
                            "success": function(response) {
                                console.log(response);
                                getData();

                            },
                            "error": function(error) {
                                console.log(error);
                            }

                        })

                        $("#update").text("Insert Data").attr("id", "insert");
                        $(".updatebtn").prop('disabled', false);
                        cancelButton.remove(); // Remove the Cancel button
                        $("#sid").val("");
                        $("#name").val("");
                        $("#address").val("");
                    })




                });

        });
    </script>
</body>

</html>
