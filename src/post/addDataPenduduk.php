<?php
require "../../config/connect.php";
require "../utils/postData.php";

// var_dump($conn);
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$no_kk = $_POST['no_kk'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$tempat_lahir = $_POST['tempat_lahir'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_telp = $_POST['nomor_telp'];
$darah = $_POST['darah'];
$kepala_keluarga = $_POST['kepala_keluarga'];
$status_tinggal = $_POST['status_tinggal'];
$status_diri = $_POST['status_diri'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];

$query = "INSERT INTO data_penduduk VALUES (NULL,'$nama', '$nik','$no_kk',  '$tanggal_lahir', '$tempat_lahir','$jenis_kelamin',  '$alamat','$nomor_telp', '$darah', '$kepala_keluarga', '$status_tinggal', '$status_diri', NOW() , '$rt', '$rw')";
// var_dump($query);
$succes_mes = "Berhasil Melakukan Penambahan Data Penduduk";
$failed_mes = "Gagal Melakukan Penambahan Data Penduduk";

$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
