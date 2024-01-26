<?php

require "../../config/connect.php";
require "../utils/updateData.php";

$id_peduduk  = $_POST['id_peduduk'];
$isConfirm = $_POST['isConfirm'];

$succes_mes = "Berhasil Melakukan Verifikasi pendaftaran penduduk";
$failed_mes = "Gagal Melakukan Verifikasi pendaftaran penduduk";

$insert = "UPDATE `data_penduduk` SET `valid` = '$isConfirm' WHERE (`id_penduduk` = '$id_peduduk')";
$updateData = new UpdateData($conn, $insert, $succes_mes, $failed_mes);
echo $updateData->handleUpdateData();
