<?php

require "../../config/connect.php";
require "../utils/updateData.php";

$id_pemohon  = $_POST['id_pemohon'];
$isConfirm = $_POST['isConfirm'];

$succes_mes = "Berhasil Melakukan Perubahan Status Vaksin";
$failed_mes = "Gagal Melakukan Perubahan Status Vaksin";

$insert = "UPDATE `permohonan_surat` SET `status_permohonan` = '$isConfirm' WHERE (`id_pemohon` = '$id_pemohon')";
// var_dump($insert);
$updateData = new UpdateData($conn, $insert, $succes_mes, $failed_mes);
echo $updateData->handleUpdateData();
