<?php
require "../../config/connect.php";
require "../utils/postData.php";

$nama_pemohon = $_POST["nama_pemohon"];
$nik = $_POST["nik"];
$jenis_surat = $_POST["jenis_surat"];
// $tanggal_permohonan = $_POST["tanggal_permohonan"];
// $status_permohonan = $_POST["status_permohonan"];
$succes_mes = "Berhasil Melakukan Penambahan Permohonan surat";
$failed_mes = "Gagal Melakukan Penambahan Permohonan surat";

$query = "INSERT INTO permohonan_surat VALUES (NULL, '$nama_pemohon','$nik' ,'$jenis_surat', NOW(), 0)";

// var_dump($query); die;

$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
