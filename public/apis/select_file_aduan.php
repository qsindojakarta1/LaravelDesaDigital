<?php
require_once 'includes/Constants.php';
//$v_aduan_id = $_POST['txt_aduan_id'];
$v_aduan_id = 75;
$query = mysqli_query($con, "select * from aduans_file where aduan_id=$v_aduan_id");
$data = array();
$qry_array = array();
$i = 0;
$total = mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query)) {
  $data['id'] = $row['id'];
  $data['aduan_id'] = $row['aduan_id'];
  $data['name'] = $row['name'];
  $data['file_name'] = $row['file_name']; 
  $data['file_path'] = $row['file_path'];
  $data['file_ext'] = $row['file_ext'];
  $data['created_at'] = $row['created_at'];
  $data['updated_at'] = $row['updated_at'];
  $qry_array[$i] = $data;
  $i++;
}

if($query){
  $response['success'] = 'true';
  $response['message'] = 'Data Loaded Successfully';
  $response['total'] = $total;
  $response['data'] = $qry_array;
}else{
  $response['success'] = 'false';
  $response['message'] = 'Data Loading Failed';
}

echo json_encode($response);
?>
