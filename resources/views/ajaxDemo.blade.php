<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
    <link rel="stylesheet" href="css/cdn.datatables.net_1.13.5_css_jquery.dataTables.min.css">
</head>
<body>
    <div class="table-responsive">
    <table id="myTable" class="display">
        <thead >
            <tr >
                <th>SID</th>
                <th>NAME</th>
                <th>ADDRESS</th>
            </tr>
        </thead>
        <tbody  id="result" >

        </tbody>
    </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/cdn.datatables.net_1.13.5_js_jquery.dataTables.min.js"></script>

    <script>
 $(document).ready(function () {
    
    function reload(){
        var table = new DataTable('#myTable');
        }
    $.ajax({
        "method": "GET",
        "url": "http://127.0.0.1:8000/api/getData",
        "success": function (response) {

            console.log(response);
            var op = "";
            $.each(response.data, function (index, row) {
                op += "<tr>";
                op += "<td>" + row.sid + "</td>";
                op += "<td>" + row.name + "</td>";
                op += "<td>" + row.address + "</td>";
                op += "</tr>";
            });
            $("#result").html(op);
            reload();
        },
        "error": function (error) {
            console.log(error);
        }
        
    });
});


       
        </script>
</body>
</html>