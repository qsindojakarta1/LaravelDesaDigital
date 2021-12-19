<?php

require_once 'includes/Constants.php';
$query = mysqli_query($con, "SELECT id, warga_id, desa_id, aduan, respon, created_at, updated_at
FROM aduans
order by id desc
limit 1");
$data = array();
$qry_array = array();
$i = 0;
$total = mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query)) {
  $data['id'] = $row['id'];
  $data['warga_id'] = $row['warga_id'];
  $data['desa_id'] = $row['desa_id'];
  $data['aduan'] = $row['aduan'];
  $data['respon'] = $row['respon'];
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
