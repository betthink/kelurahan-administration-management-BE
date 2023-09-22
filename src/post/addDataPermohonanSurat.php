<?php
require "../../config/connect.php";
require "../utils/postData.php";

$nama_pemohon = $_POST["nama_pemohon"];
$nik = $_POST["nik"];
$jenis_surat = $_POST["jenis_surat"];
$succes_mes = "Berhasil Melakukan pengajuan Permohonan surat";
$failed_mes = "Gagal Melakukan pengajuan Permohonan surat";

$query = "INSERT INTO permohonan_surat VALUES (NULL, '$nama_pemohon','$nik' ,'$jenis_surat',0, NOW())";
// var_dump($query);
$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
