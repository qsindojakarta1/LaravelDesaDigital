<?php
require_once 'includes/Constants.php';
$warga_id = $_POST['txt_Warga_Ids'];
$desa_id = $_POST['txt_Desa_Ids'];
$aduan = $_POST['txt_Aduans'];
$respon = "";


$response = array();
$query = mysqli_query($con, "INSERT INTO aduans (warga_id, desa_id, aduan, respon, created_at, updated_at) VALUES ($warga_id,$desa_id,'$aduan','$respon',now(),now())");
if($query){
  $response['success'] = 'true';
  $response['message'] = 'Data Inserted Successfully';
}else{
  $response['success'] = 'false';
  $response['message'] = 'Data Insertion Failed';
}

echo json_encode($response);
?>
