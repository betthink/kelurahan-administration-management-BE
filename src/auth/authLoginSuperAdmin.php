<?php
require "../../config/connect.php";
require "../utils/auth.php";
$columns = ["id_super_admin", "username"];

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM super_admin WHERE username = '$username' && password = '$password'";
$authLogin = new AuthLogin($conn, $columns, $query);
$data = $authLogin->handleAuthData();
$responseArray = array(
    "data" => [],
    "value" => 0,
    "message" => "username atau password tidak terdaftar"
);

$dataArray = json_decode($data, true); 
if (!empty($dataArray['data'])) {
    $responseArray['data'] = $dataArray['data'];
    $responseArray['value'] = 1;
    $responseArray['role'] = "Super_Admin";
    $responseArray['message'] = "Berhasil melakukan login";
}

echo json_encode($responseArray);
