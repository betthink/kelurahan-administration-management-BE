<?php
require "../../../config/connect.php";
require "../../utils/getDataJson.php";
$rt = $_GET['rt'];
$columns = ["metode", "verifikator", "rt", "jumlah_transaksi", "jenis_transaksi", "waktu_verifikasi", "nama"];
$query = "SELECT *  FROM riwayat_pembayaran WHERE rt = '$rt'";
// var_dump($conn);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
