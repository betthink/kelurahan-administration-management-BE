<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["jenis_vaksin"];
$query = "SELECT jenis_vaksin FROM data_vaksin";

$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
