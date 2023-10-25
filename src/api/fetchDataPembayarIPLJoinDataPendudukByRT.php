<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$rt = $_GET["rt"];
$columns = ["id", "nama", "nik", "id_user", "rt", "status_tinggal"];
$query = "SELECT * FROM list_pembayar_iuran inner join data_penduduk on list_pembayar_iuran.id_user = data_penduduk.id_penduduk WHERE rt = '$rt'";
// var_dump($query);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
