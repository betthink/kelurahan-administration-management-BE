<?php

require "../../config/connect.php";
require "../utils/deleteData.php";

$id_admin = (int)$_POST['id_admin'];
$succes_mes = "Berhasil Melakukan Penghapusan akun admin";
$failed_mes = "Gagal Melakukan Penghapusan akun admin";

$insert = "DELETE FROM user_admin WHERE id_admin=$id_admin AND role = 'admin'";
// var_dump($insert);
$delData = new  DeleteData($conn, $insert, $succes_mes, $failed_mes);

echo $delData->handleDeleteData();
