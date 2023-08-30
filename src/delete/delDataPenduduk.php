<?php

require "../../config/connect.php";
require "../utils/deleteData.php";

$id_penduduk= (int)$_POST['id_penduduk'];
$succes_mes = "Berhasil Melakukan Penghapusan data penduduk";
$failed_mes = "Gagal Melakukan Penghapusan data penduduk";

$insert = "DELETE FROM data_penduduk WHERE id_penduduk=$id_penduduk";
;
$delData = new  DeleteData ($conn, $insert, $succes_mes, $failed_mes);

echo $delData ->handleDeleteData();
