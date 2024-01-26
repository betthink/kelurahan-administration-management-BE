<?php
require "../../config/connect.php";
require "../utils/auth.php";

$columns = ["id_penduduk", "nama", "nik", "no_kk", "tanggal_lahir", "tempat_lahir", "jenis_kelamin", "nomor_telp", "alamat", "darah", "kepala_keluarga", "status_tinggal", "status_diri", "tanggal_registrasi", "valid"];

$nama = $_POST["nama"];
$nik = $_POST["nik"];

$query = "SELECT * FROM data_penduduk WHERE nama = '$nama' && nik = '$nik'";
$authLogin = new AuthLogin($conn, $columns, $query);
$data = $authLogin->handleAuthData();
$responseArray = [
    "data" => [],
    "value" => 0,
    "message" => "Nama atau NIK tidak terdaftar"
];

$dataArray = json_decode($data, true);
if (!empty($dataArray['data'])) {
    if ($dataArray['data'][0]['valid'] == 1) {
        $responseArray['data'] = $dataArray['data'];
        $responseArray['value'] = 1;
        $responseArray['message'] = "Berhasil melakukan login";
    } else {
        $responseArray['value'] =2;
        $responseArray['message'] = "Akun belum diverifikasi";
    }
}

echo json_encode($responseArray);
