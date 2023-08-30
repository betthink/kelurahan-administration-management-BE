<?php
require "../../config/connect.php";
require "../utils/postData.php";

// var_dump($conn);

$nama_kepala_keluarga = $_POST["nama_kepala_keluarga"];
$tanggal_pembayaran = $_POST["tanggal_pembayaran"];
$jumlah_pembayaran = $_POST["jumlah_pembayaran"];
$nik = $_POST["nik"];
$metode = $_POST["metode"];

$query = "INSERT INTO verifikasi_pembayaran VALUES (NULL, '$nama_kepala_keluarga','$tanggal_pembayaran' , NOW(),'$jumlah_pembayaran', '$nik', '$metode')";

// var_dump($query); die;
$succes_mes = "Berhasil Melakukan Penambahan Verifikasi Data";
$failed_mes = "Gagal Melakukan Penambahan Verifikasi Data";

$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
