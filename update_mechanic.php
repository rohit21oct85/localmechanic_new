<?php include 'top_head.php'; ?>       
<nav class="no-curve" style="padding:0px 0px 0px 100px;background:#034a67; color:#fff; height:35px; line-height:35px;margin-top:116px;position: fixed;width: 100%;z-index:9;">
    <div class="container-fluid">
        <span style="margin-left: 15px;"> Home > Update Mechanic </span>
    </div>	
</nav>	

<div class="container" style="padding-top:60px;">
    <div class="container" style="margin-top:30px;">
<div style="height:35px;"></div>
<hr>
<h3> 
 <span class="fa fa-edit"></span> Mechanic Details 
 <a href="add_mechanic.php" class="btn btn-success btn-sm pull-right"> <span class="fa fa-user-plus"></span> Add Mechanic</a>
</h3>
    <hr>
    <table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
    <thead>
        <tr>
            <th>Company Name</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip code</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    </table>
   

<?php include 'footer.php';?>