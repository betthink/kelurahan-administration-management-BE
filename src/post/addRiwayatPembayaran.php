<?php
require "../../config/connect.php";
require "../utils/postData.php";

// var_dump($conn);

$nama = $_POST["nama"];
$waktu_pembayaran = $_POST["waktu_pembayaran"];
$jumlah_pembayaran = $_POST["jumlah_pembayaran"];
$nik = $_POST["nik"];
$rt = $_POST["rt"];
$metode = $_POST["metode"];
$id_user = $_POST["id_user"];
$verifikator = $_POST["verifikator"];

$query = "INSERT INTO riwayat_pembayaran VALUES (NULL, '$nama', '$nik','$metode','$verifikator','$rt','$jumlah_pembayaran','$waktu_pembayaran',NOW(),'$id_user')";
// var_dump($query); 
$succes_mes = "Berhasil Melakukan Penambahan Verifikasi Data";
$failed_mes = "Gagal Melakukan Penambahan Verifikasi Data";

$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
