

<?php

$kd="";
require_once 'includes/Constants.php';

//$kd = $_GET['idberita'];
if(isset($_GET['id_berita'])){
 $kd=$_GET['id_berita'];

}

$query = mysqli_query($con,"SELECT * FROM aduans_file where id= $kd ");
$json  = '{"berita": [';

while($row=mysqli_fetch_array($query))
{

//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
//strip_tag berfungsi untuk menghilangkan tag-tag html pada string  

$char = '"';

$json .='{"id":"'.$row['id'].'",
  "judul":"'.str_replace($char,'`',strip_tags($row['name'])).'",
  "isi":"'.str_replace($char,'`',strip_tags($row['contents'])).'",
  "gambar":"images/'.$row['file_name'].'"},';


}
// buat menghilangkan koma diakhir array
$json = substr($json,0,strlen($json)-1);

$json .= ']}';
// print json
echo $json;
?>
