<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["id_surat", "nama_surat"];
$query = "SELECT * FROM jenis_surat";

$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
