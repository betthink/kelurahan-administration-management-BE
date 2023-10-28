<?php

require "../../config/connect.php";
require "../utils/deleteData.php";

$id_imunisasi = $_POST['id_imunisasi'];
$succes_mes = "Berhasil Melakukan Penghapusan Peserta Posyandu";
$failed_mes = "Gagal Melakukan Penghapusan Peserta Posyandu";

$insert = "DELETE FROM pengguna_layanan_posyandu WHERE id_imunisasi=$id_imunisasi";
// var_dump($insert);
$delData = new  DeleteData($conn, $insert, $succes_mes, $failed_mes);
echo $delData->handleDeleteData();
