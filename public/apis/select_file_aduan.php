<?php
require_once 'includes/Constants.php';

if(isset($_GET['id_aduan'])){
  $kd=$_GET['id_aduan'];
 }

$query = mysqli_query($con,"SELECT * FROM aduans_file where aduan_id = $kd ORDER BY id desc");
$json  = '{"aduans_file": [';

while ($row = mysqli_fetch_array ($query)) {

$char = '"';
$json .= '{"id":"'.$row['id'].'",
"judul":"'.str_replace($char,'`',strip_tags($row['name'])).'",
"isi":"'.str_replace($char,'`',strip_tags($row['contents'])).'",
"gambar":"images/'.$row['file_name'].'"},';
}

$json = substr($json,0,strlen($json)-1);
$json .= ']}';
echo $json;

?>
