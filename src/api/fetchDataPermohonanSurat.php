<?php 
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["id_pemohon", "nama_pemohon", "nik", "jenis_surat", "tanggal_permohonan", "status_permohonan"];
$query = "SELECT * FROM permohonan_surat";
// var_dump($conn);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;