<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["id_imunisasi", "wali_peserta", "tahap_vaksin", "nama_peserta"];
$query = "SELECT * FROM pengguna_layanan_posyandu";

$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
