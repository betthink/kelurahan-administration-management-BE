<?php
require "../../config/connect.php";
require "../utils/postData.php";

// Ambil data dari POST
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$no_kk = $_POST['no_kk'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$tempat_lahir = $_POST['tempat_lahir'];
$agama = $_POST['agama'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_telp = $_POST['nomor_telp'];
$darah = $_POST['darah'];
$kepala_keluarga = $_POST['kepala_keluarga'];
$status_tinggal = $_POST['status_tinggal'];
$status_diri = $_POST['status_diri'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];

// Cek apakah nik sudah terdaftar
$checkNikQuery = "SELECT COUNT(*) as count FROM data_penduduk WHERE nik = '$nik'";
$checkNikResult = mysqli_query($conn, $checkNikQuery);
$checkNikData = mysqli_fetch_assoc($checkNikResult);

if ($checkNikData['count'] > 0) {
    $response = array();
    $failed_mes = "NIK sudah terdaftar";
    $response['value'] = 2;
    $response['message'] = $failed_mes;
    echo json_encode($response);
} else {
    // Cek apakah kepala_keluarga sudah ada yang bernilai 1 atau true
    $checkKepalaKeluargaQuery = "SELECT COUNT(*) as count FROM data_penduduk WHERE kepala_keluarga = 1";
    $checkKepalaKeluargaResult = mysqli_query($conn, $checkKepalaKeluargaQuery);
    $checkKepalaKeluargaData = mysqli_fetch_assoc($checkKepalaKeluargaResult);

    if ($checkKepalaKeluargaData['count'] > 0 && ($kepala_keluarga === '1' || $kepala_keluarga === true)) {
        $response = array();
        $failed_mes = "Kepala keluarga sudah ada";
        $response['value'] = 2;
        $response['message'] = $failed_mes;
        echo json_encode($response);
    } else {
        // Jika NIK belum terdaftar dan kepala keluarga tidak ada yang bernilai 1 atau true, lakukan operasi INSERT
        $query = "INSERT INTO data_penduduk VALUES (NULL,'$nama', '$nik','$no_kk',  '$tanggal_lahir', '$tempat_lahir','$jenis_kelamin', '$pekerjaan', '$agama', '$alamat','$nomor_telp', '$darah', '$kepala_keluarga', '$status_tinggal', '$status_diri', NOW() , '$rt', '$rw' , 0)";
        $success_mes = "Berhasil Melakukan Penambahan Data Penduduk";
        $succes_mes = "Berhasil Melakukan registrasi penduduk";
        $failed_mes = "Gagal Melakukan registrasi penduduk";
        $postData = new PostData($conn, $query, $succes_mes, $failed_mes);
        echo $postData->handlePostData();
    }
}
