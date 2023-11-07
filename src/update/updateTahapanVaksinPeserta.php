<?php

require "../../config/connect.php";
require "../utils/updateData.php";

$tahapanVaksin = $_POST['tahapanVaksin'];
$id_imunisasi = $_POST['id_imunisasi'];


$succes_mes = "Berhasil Melakukan Perubahan Tahapan Vaksin";
$failed_mes = "Gagal Melakukan Perubahan Tahapan Vaksin";

$insert = "UPDATE pengguna_layanan_posyandu SET tahap_vaksin = '$tahapanVaksin' WHERE id_imunisasi = '$id_imunisasi'";
// var_dump($insert);
$updateData = new UpdateData($conn, $insert, $succes_mes, $failed_mes);
echo $updateData->handleUpdateData();
