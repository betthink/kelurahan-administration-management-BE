<?php

require "../../config/connect.php";
require "../utils/deleteData.php";

$id_vaksin= (int)$_POST['id_vaksin'];
$succes_mes = "Berhasil Melakukan Penghapusan data vaksin";
$failed_mes = "Gagal Melakukan Penghapusan data vaksin";

$insert = "DELETE FROM data_vaksin WHERE id_vaksin=$id_vaksin";
;
$delData = new  DeleteData ($conn, $insert, $succes_mes, $failed_mes);

echo $delData ->handleDeleteData();
