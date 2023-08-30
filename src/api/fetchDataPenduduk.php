<?php 
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["id_penduduk", "nama", "nik", "tanggal_lahir", "tempat_lahir", "alamat", "nomor_telp","alamat","darah","kepala_keluarga","status_tinggal","status_diri","tanggal_registrasi"];
$query = "SELECT * FROM data_penduduk";

$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;