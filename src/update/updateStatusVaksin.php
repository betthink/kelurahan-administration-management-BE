<?php

require "../../config/connect.php";
require "../utils/updateData.php";

$id_vaksin  = $_POST['id_vaksin'];
$status = $_POST['status'];

$succes_mes = "Berhasil Melakukan Perubahan Status Vaksin";
$failed_mes = "Gagal Melakukan Perubahan Status Vaksin";

$insert = "UPDATE data_vaksin SET status = '$status' WHERE id_vaksin = '$id_vaksin'";
// var_dump($insert); die;
$updateData = new UpdateData($conn, $insert, $succes_mes, $failed_mes);
echo $updateData->handleUpdateData();
