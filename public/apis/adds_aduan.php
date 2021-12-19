<?php
require_once 'includes/Constants.php';
class emp{}
$txt_id = $_POST['txt_id'];
$image = $_POST['image'];
$name = $_POST['name'];

	
	$random = random_word(20);
	    $file_ext = ".png";
		$file_name = $random.$file_ext;
		$path = "images/";
		
		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = $path.$file_name;	


$response = array();
$query = mysqli_query($con, "INSERT INTO aduans_file (aduan_id,file_path,file_name,file_ext,name) VALUES ($txt_id,'$path','$file_name','$file_ext','$name')");



if ($query){
			file_put_contents($actualpath,base64_decode($image));
			
			$response = new emp();
			$response->success = 1;
			$response->message = "Successfully Uploaded";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Upload image";
			die(json_encode($response)); 
		}


function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}
echo json_encode($response);
?>
