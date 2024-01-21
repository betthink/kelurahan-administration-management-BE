<?php
require "../../../config/connect.php";
require "../../utils/getDataJson.php";
$columns = ["id_vaksin","jenis_vaksin", "status"];
$query = "SELECT * FROM data_vaksin";

$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
