<?php
require_once 'includes/Constants.php';

$password = md5($_POST['txt_password']);
$username = $_POST['txt_username'];


$query = mysqli_query($con, "UPDATE users_b SET password = '$password' WHERE username = '$username' ");

if($query){
  $response['success'] = 'true';
  $response['message'] = 'Data Updated Successfully';
}else{
  $response['success'] = 'false';
  $response['message'] = 'Data Updation Failed';
}

echo json_encode($response);
?>
