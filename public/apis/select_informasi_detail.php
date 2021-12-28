<?php

$kd="";
require_once 'includes/Constants.php';

//$kd = $_GET['idberita'];
if(isset($_GET['id_informasi'])){
 $kd=$_GET['id_informasi'];
}

$query = mysqli_query($con,"select
informasis.*,
desas.id as desas_id ,desas.kecamatan_id,desas.nama_desa,desas.background,
kecamatans.id as kecamatans_id,kecamatans.kabupaten_id,kecamatans.nama_kecamatan,
kabupatens.id as kabupatens_id,kabupatens.provinsi_id,kabupatens.nama_kabupaten,
kategori_informasis.nama as nama_kategori
from
informasis
left join kategori_informasis 
on
kategori_informasis.id = informasis.kategori_informasi_id 

left join desas 
on
informasis.desa_id = desas.id
left join kecamatans
on
desas.kecamatan_id = kecamatans.id		
left join kabupatens
on
kecamatans.kabupaten_id = kabupatens.id where informasis.id= $kd ");
$json  = '{"informasi": [';

while($row=mysqli_fetch_array($query))
{

$char = '"';

$json .= '{"id":"'.$row['id'].'",
  "judul":"'.str_replace($char,'`',strip_tags($row['judul'])).'",
  "nama_desa":"'.str_replace($char,'`',strip_tags($row['nama_desa'])).'",
  "isi":"'.str_replace($char,'`',strip_tags($row['deskripsi'])).'",
  "gambar":"images/'.$row['images'].'",
  "created_at":"'.str_replace($char,'`',strip_tags($row['created_at'])).'",
  "nama_kategori":"'.str_replace($char,'`',strip_tags($row['nama_kategori'])).'"
  },';

}
// buat menghilangkan koma diakhir array
$json = substr($json,0,strlen($json)-1);

$json .= ']}';
// print json
echo $json;
?>
