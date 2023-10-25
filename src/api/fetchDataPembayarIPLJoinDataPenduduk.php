<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["id", "nama", "nik", "id_user", "rt", "status_tinggal"];
$query = "SELECT * FROM list_pembayar_iuran inner join data_penduduk on list_pembayar_iuran.id_user = data_penduduk.id_penduduk";
// var_dump($conn);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
