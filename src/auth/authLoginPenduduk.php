<?php
require "../../config/connect.php";
require "../utils/auth.php";
$columns = ["id_penduduk", "nama", "nik", "no_kk", "tanggal_lahir", "tempat_lahir", "jenis_kelamin", "nomor_telp", "alamat", "darah", "kepala_keluarga", "status_tinggal", "status_diri", "tanggal_registrasi"];


$nama = $_POST["nama"];
$nik = $_POST["nik"];

$query = "SELECT * FROM data_penduduk WHERE nama = '$nama' && nik = '$nik'";
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
