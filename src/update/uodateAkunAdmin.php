<?php

require "../../config/connect.php";
require "../utils/updateData.php";

$id_admin = $_POST['id_admin'];
$nik = $_POST['nik'];
$username = $_POST['username'];
$password = $_POST['password'];
$nomor_telp = $_POST['nomor_telp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];


$succes_mes = "Berhasil Melakukan Perubahan Akun admin";
$failed_mes = "Gagal Melakukan Perubahan Akun admin";

$insert = "UPDATE `db_administrasi_kel`.`user_admin` SET `nik` = '$nik', `username` = '$username', `password` = '$password', `nomor_telp` = '$nomor_telp', `jenis_kelamin` = '$jenis_kelamin', `rt` = '$rt', `rw` = '$rw' WHERE (`id_admin` = '$id_admin')";
// var_dump($insert);
$updateData = new UpdateData($conn, $insert, $succes_mes, $failed_mes);
echo $updateData->handleUpdateData();
