<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["id_pembayaran", "nama", "nik", "metode", "verifikator", "rt", "waktu_pembayaran", "waktu_verifikasi", "jumlah_pembayaran", "id_user"];
$query = "SELECT * FROM db_administrasi_kel.list_pembayar_iuran
inner join riwayat_pembayaran  on riwayat_pembayaran.id_user = list_pembayar_iuran.id_user";
// var_dump($conn);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
