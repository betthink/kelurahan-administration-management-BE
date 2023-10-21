<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["id_penduduk", "nama", "nik", "no_kk", "tanggal_lahir", "tempat_lahir", "agama", "pekerjaan", "rt", "rw", "jenis_kelamin", "nomor_telp", "alamat", "darah", "kepala_keluarga", "status_tinggal", "status_diri", "tanggal_registrasi"];

$rt = $_GET["rt"];
$rw = $_GET["rw"];
$query = "SELECT * FROM data_penduduk where rt ='$rt' && rw='$rw'";

$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
