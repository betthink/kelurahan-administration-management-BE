<?php
require "../../config/connect.php";
require "../utils/postData.php";

// var_dump($conn);
// $id_vaksin  = $_POST['id_vaksin '];
$jenis_vaksin = $_POST['jenis_vaksin'];
$status = $_POST['status'];

$query = "INSERT INTO data_vaksin VALUES (NULL,'$jenis_vaksin', '$status')";
// var_dump($query); die;
$succes_mes = "Berhasil Melakukan Penambahan Data Vaksin";
$failed_mes = "Gagal Melakukan Penambahan Data Vaksin";

$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
