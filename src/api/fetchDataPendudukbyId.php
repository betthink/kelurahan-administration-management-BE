<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$id_penduduk = $_GET['id_penduduk'];
$columns = ["id_penduduk", "nama", "nik", "no_kk", "tanggal_lahir", "tempat_lahir", "jenis_kelamin", "nomor_telp", "alamat", "darah", "kepala_keluarga", "status_tinggal", "status_diri", "tanggal_registrasi"];
$query = "SELECT * FROM data_penduduk WHERE id_penduduk = $id_penduduk";
// var_dump($query);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
