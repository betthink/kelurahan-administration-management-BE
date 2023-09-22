<?php
require "../../config/connect.php";
require "../utils/auth.php";
$columns = ["id_admin", "nik", "username", "password"];
$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM user_admin WHERE username = '$username' && password = '$password'";
$authLogin = new AuthLogin($conn, $columns, $query);
$data = $authLogin->handleAuthData();
$responseArray = array(
    "data" => [],
    "value" => 0,
    "message" => "Nama atau NIK tidak terdaftar"
);

$dataArray = json_decode($data, true); // U
if (!empty($dataArray['data'])) {
    $responseArray['data'] = $dataArray['data'];
    $responseArray['value'] = 1;
    $responseArray['message'] = "Berhasil melakukan login";
}

echo json_encode($responseArray);
