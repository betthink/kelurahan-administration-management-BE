<?php

require "../../config/connect.php";
require "../utils/updateData.php";

// $jenis_vaksin = $_POST['jenis_vaksin'];
$status = $_POST['status'];
$id_vaksin = $_POST['id_vaksin'];


$succes_mes = "Berhasil Melakukan Perubahan Data penduduk";
$failed_mes = "Gagal Melakukan Perubahan Data penduduk";

$insert = "UPDATE data_vaksin SET status = '$status' WHERE id_vaksin = '$id_vaksin'";
// var_dump($insert);
$updateData = new UpdateData($conn, $insert, $succes_mes, $failed_mes);
echo $updateData->handleUpdateData();
