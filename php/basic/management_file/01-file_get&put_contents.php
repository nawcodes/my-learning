<?php 

$data = "update data \n";

// buat baru file bila belum ada 
// update file bila ada
// jika mau data tidak mau di timpa tambahkan parameter ke tiga FILE_APPEND
file_put_contents('file/content.txt', $data , FILE_APPEND);

// ambil data
$getData = file_get_contents('file/content.txt');
echo $getData;

?>