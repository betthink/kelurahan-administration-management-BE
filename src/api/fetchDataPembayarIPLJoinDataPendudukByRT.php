<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$rt = $_GET["rt"];
$rw = $_GET["rw"];
$columns = ["id", "nama", "nik", "id_user", "rt", "rw", "status_tinggal", "kepala_keluarga", "valid"];
$query = "SELECT * FROM list_pembayar_iuran inner join data_penduduk on list_pembayar_iuran.id_user = data_penduduk.id_penduduk WHERE rt = '$rt' AND rw = '$rw' AND valid=1";
// var_dump($query);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
