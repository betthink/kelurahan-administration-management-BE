<?php
require "../../../config/connect.php";
require "../../utils/getDataJson.php";
$columns = ["rt", "rw"];

$query = "SELECT * FROM lembaga";
// var_dump($query);die;
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
