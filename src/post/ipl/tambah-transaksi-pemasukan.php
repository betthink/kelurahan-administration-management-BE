<?php
require "../../../config/connect.php";
require "../../utils/postData.php";

// var_dump($conn);
$verifikator = $_POST['verifikator'];
$jumlah_transaksi = $_POST['jumlah_transaksi'];

$query = "INSERT INTO riwayat_pembayaran (`verifikator`, `jumlah_transaksi`, `jenis_transaksi`, `waktu_pembayaran`) VALUES ('$verifikator', '$jumlah_transaksi', 'pengeluaran', NOW())";

// var_dump($query);
// die;
$succes_mes = "Berhasil Melakukan input uang pengeluaran";
$failed_mes = "Gagal Melakukan input uang pengeluaran";

$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
