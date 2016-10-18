<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Local Mechanic </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/BootSideMenu.css">
        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/BootSideMenu.js"></script>
       <!-- data table -->
       
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" language="javascript" >
        $(document).ready(function() {
                var dataTable = $('#employee-grid').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax":{
                        url :"employee-grid-data.php", // json datasource
                        type: "get",  // method  , by default get
                        error: function(){  // error handling
                                $(".employee-grid-error").html("");
                                $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                                $("#employee-grid_processing").css("display","none");

                        }
                }
                });
        } );
        </script>
       
        <script>
            $(document).ready(function() {
               
                
                $('#adminMenu').BootSideMenu({side: "left", autoClose: true});
                $('#side_menu').click(function() {
                    $('#adminMenu').BootSideMenu({side: "left", autoClose: true});
                });
            });
        </script>
    </head>
     <body>
        <div class="top-nav">
            <a class="navbar-brand no-pad" href="admin.php"><img src="img/4507.jpg" class="logo_header"> Local Mechanic</a>
        </div>
<nav class="navbar navbar-inverse navbar-fixed-top" style="margin-top:65px;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="margin-left:0px;">
            <li class="active"><a href="add_mechanic.php"> <span class="fa fa-tachometer"></span> Home</a></li>
            <li class="active"><a href="add_mechanic.php"> <span class="fa fa-car"></span> Add Mechanic</a></li>
            <li class="active"><a href="update_mechanic.php"> <span class="fa fa-edit"></span> Update Mechanic</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</nav> 

    