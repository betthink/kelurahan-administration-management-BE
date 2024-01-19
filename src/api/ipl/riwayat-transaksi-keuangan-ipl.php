<?php
require "../../../config/connect.php";
require "../../utils/getDataJson.php";
$columns = ["metode", "verifikator", "rt", "jumlah_transaksi", "jenis_transaksi", "waktu_verifikasi"];
$query = "SELECT *  FROM riwayat_pembayaran";
// var_dump($conn);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
