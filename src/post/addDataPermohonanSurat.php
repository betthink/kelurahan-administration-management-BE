<?php
require "../../config/connect.php";
require "../utils/postData.php";

$nik = $_POST["nik"];
$id_penduduk = $_POST["id_penduduk"];
$jenis_surat = $_POST["jenis_surat"];
$succes_mes = "Berhasil Melakukan pengajuan Permohonan surat";
$failed_mes = "Gagal Melakukan pengajuan Permohonan surat";

$query = "INSERT INTO permohonan_surat VALUES (NULL, '$nik' ,'$jenis_surat',0, NOW(), $id_penduduk)";
// var_dump($query);
$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
