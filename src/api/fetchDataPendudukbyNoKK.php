<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$no_kk = $_GET['no_kk'];
$columns = ["id_penduduk", "nama", "nik", "no_kk", "tanggal_lahir", "tempat_lahir", "agama", "pekerjaan", "jenis_kelamin", "nomor_telp", "alamat", "darah", "kepala_keluarga", "status_tinggal", "status_diri", "rt", "rw", "tanggal_registrasi"];
$query = "SELECT * FROM data_penduduk WHERE no_kk = $no_kk AND kepala_keluarga = 0";
// var_dump($query);die;
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
