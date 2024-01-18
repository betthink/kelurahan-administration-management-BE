<?php
require "../../../config/connect.php";
require "../../utils/getDataJson.php";
$columns = ["total_jumlah_pengeluaran"];
$query = "SELECT SUM(jumlah_transaksi) as total_jumlah_pengeluaran   FROM riwayat_pembayaran WHERE jenis_transaksi= 'pengeluaran'";
// var_dump($conn);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
