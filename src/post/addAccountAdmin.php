<?php
require "../../config/connect.php";
require "../utils/postData.php";

// var_dump($conn);
$username = $_POST['username'];
$password = $_POST['password'];
$nik = $_POST['nik'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];

$query = "INSERT INTO user_admin VALUES (NULL,'$nik' ,'$username', '$password','$rt',  '$rw', NOW(), 'admin')";
// var_dump($query);
$succes_mes = "Berhasil Melakukan Penambahan Akun admin";
$failed_mes = "Gagal Melakukan Penambahan Akun admin";

$postData = new PostData($conn, $query, $succes_mes, $failed_mes);
echo $postData->handlePostData();
