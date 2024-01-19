<?php
require "../../../config/connect.php";
require "../../utils/getDataJson.php";
$id_user = $_GET["id_user"];
$columns = ["id_pembayaran", "nama", "nik", "metode", "verifikator", "rt",  "waktu_pembayaran", "waktu_verifikasi", "jumlah_transaksi", "id_user", "foto"];
$query = "SELECT * FROM db_administrasi_kel.list_pembayar_iuran
inner join riwayat_pembayaran  on riwayat_pembayaran.id_user = list_pembayar_iuran.id_user where riwayat_pembayaran.id_user = '$id_user'";
// var_dump($query);die;
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
