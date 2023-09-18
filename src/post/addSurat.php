<?php
require "../../config/connect.php";
require "../utils/postData.php";

$nama_surat = $_POST["nama_surat"];
$succes_mes = "Berhasil Melakukan Penambahan jenis surat";
$failed_mes = "Gagal Melakukan Penambahan jenis surat";

$query = "INSERT INTO jenis_surat VALUES (NULL, '$nama_surat', NOW())";
// var_dump($query); 
$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
