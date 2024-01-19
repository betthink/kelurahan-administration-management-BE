<?php
require "../../../config/connect.php";
require "../../utils/getDataJson.php";
$columns = ["total_jumlah_pembayaran"];
$query = "SELECT SUM(jumlah_transaksi) as total_jumlah_pembayaran   FROM riwayat_pembayaran WHERE jenis_transaksi= 'pemasukan'";
// var_dump($query);die;
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
