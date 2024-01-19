<?php
require "../../../config/connect.php";
require "../../utils/getDataJson.php";
$columns = ["total_jumlah_pengeluaran"];
$rt = $_GET['rt'];
$query = "SELECT SUM(jumlah_transaksi) as total_jumlah_pengeluaran   FROM riwayat_pembayaran WHERE jenis_transaksi= 'pengeluaran' AND rt = '$rt'";
// var_dump($query);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
