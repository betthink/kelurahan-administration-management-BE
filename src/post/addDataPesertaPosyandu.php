<?php
require "../../config/connect.php";
require "../utils/postData.php";

// var_dump($conn);
$wali_peserta = $_POST['wali_peserta'];
$tahap_vaksin = $_POST['tahap_vaksin'];
$nama_peserta = $_POST['nama_peserta'];


$query = "INSERT INTO pengguna_layanan_posyandu VALUES ( NULL, '$wali_peserta', '$tahap_vaksin', '$nama_peserta')";
// var_dump($query);
$succes_mes = "Berhasil Melakukan Penambahan Data Peserta posyandu";
$failed_mes = "Gagal Melakukan Penambahan Data Peserta posyandu";

$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
