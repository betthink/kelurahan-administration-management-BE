<?php

require "../../config/connect.php";
require "../utils/updateData.php";

$id_pemohon  = $_POST['id_pemohon'];
$isConfirm = $_POST['isConfirm'];

$succes_mes = "Berhasil Melakukan persetujuan tanda tangan surat";
$failed_mes = "Gagal Melakukan persetujuan tanda tangan surat";

$insert = "UPDATE `permohonan_surat` SET `persetujuan_rw` = '$isConfirm' WHERE (`id_pemohon` = '$id_pemohon')";
// var_dump($insert);
$updateData = new UpdateData($conn, $insert, $succes_mes, $failed_mes);
echo $updateData->handleUpdateData();
