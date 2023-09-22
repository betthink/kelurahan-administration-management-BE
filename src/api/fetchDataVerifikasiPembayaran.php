<?php 
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["id_ipl","nama_kepala_keluarga", "tanggal_pembayaran", "waktu_verifikasi", "jumlah_pembayaran", "nik", "metode", "status_ipl", "status_tinggal"];
$query = "SELECT * FROM verifikasi_pembayaran";
// var_dump($conn);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;