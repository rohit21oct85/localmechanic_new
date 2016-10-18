<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "localmechanics";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
//print_r($_REQUEST);
//$requestData['search']['value'] = "b";

$columns = array( 
// datatable column index  => database column name
   
    0 => 'fstr_mechanic_company_name',
    1 => 'fstr_mechanic_name',
    2 => 'fstr_mechanic_address',
    3 => 'fstr_mechanic_city',
    4 => 'fstr_mechanic_state',
    5 => 'fnum_mechanic_zipCode',
    6 => 'fnum_mechanic_mobPhone'
);

// getting total number records without any search
$sql = "SELECT fstr_rand_tocken,fstr_mechanic_company_name,fstr_mechanic_name,fstr_mechanic_address,
        fstr_mechanic_city,fstr_mechanic_state,fstr_mechanic_country,fnum_mechanic_zipCode,
        fnum_mechanic_mobPhone FROM mechanic";

$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get mechanic");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT fnum_mechanic_id,fstr_rand_tocken,fstr_mechanic_company_name,fstr_mechanic_name,fstr_mechanic_address,
        fstr_mechanic_city,fstr_mechanic_state,fstr_mechanic_country,fnum_mechanic_zipCode,
        fnum_mechanic_mobPhone";
$sql.=" FROM mechanic WHERE 1=1 ";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND (fstr_mechanic_company_name LIKE '".$requestData['search']['value']."%' ";    
        $sql.=" OR fstr_mechanic_name LIKE '".$requestData['search']['value']."%'  ";
        $sql.=" OR fnum_mechanic_mobPhone LIKE '".$requestData['search']['value']."%'  ";
        $sql.=" OR fstr_mechanic_city LIKE '".$requestData['search']['value']."%'  ";
        $sql.=" OR fstr_mechanic_state LIKE '".$requestData['search']['value']."%'  ";
        $sql.=" OR fnum_mechanic_zipCode LIKE '".$requestData['search']['value']."%' )  ";
}
//echo $sql; 
//print_r($requestData);
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query_res=mysqli_query($conn, $sql) or die("employee-grid-data.php: get mechanic");

$data = array();
while( $results=mysqli_fetch_array($query_res) ) {  // preparing an array
	$data_array=array(); 
        $data_array[] = $results["fstr_mechanic_company_name"];               
        $data_array[] = $results['fstr_mechanic_name'];
        $data_array[] = $results['fnum_mechanic_mobPhone'];
        $data_array[] = $results['fstr_mechanic_address'];
        $data_array[] = $results['fstr_mechanic_city'];
        $data_array[] = $results['fstr_mechanic_state'];
        $data_array[] = $results['fnum_mechanic_zipCode'];
        $token = $results['fnum_mechanic_id'];
        $data_array[] = "<a href='add_mechanic.php?id=$token' class='btn btn-sm btn-success'><span class='fa fa-edit'></span></a>";
        $data_array[] = "<a class='btn btn-sm btn-danger'><span class='fa fa-trash'></span></a>";
        
	
	$data[] = $data_array;
}



$json_data = array(
"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
"recordsTotal"    => intval( $totalData ),  // total number of records
"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
"data"            => $data   // total data array
);

echo json_encode($json_data);  // send data as json format

?>
