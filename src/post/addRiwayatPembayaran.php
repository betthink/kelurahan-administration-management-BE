<?php
require "../../config/connect.php";
require "../utils/postData.php";

// var_dump($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Fetch data from POST request
    $nama = $_POST["nama"];
    $nik = $_POST["nik"];
    $metode = $_POST["metode"];
    $verifikator = $_POST["verifikator"];
    $rt = $_POST["rt"];
    $jumlah_transaksi = $_POST["jumlah_transaksi"];
    $waktu_pembayaran = $_POST["waktu_pembayaran"];
    $waktu_pembayaran_obj = new DateTime($waktu_pembayaran);
    $formatted_waktu_pembayaran = $waktu_pembayaran_obj->format('Y-m-d');
    // $jenis_transaksi = $_POST["jenis_transaksi"];
    $id_user = $_POST["id_user"];

    // handle upload
    $file = isset($_FILES["file"]) ? $_FILES["file"] : null;
    $file_name = isset($file) ?  $file["name"] : null;
    $file_tmp_name = isset($file_name) ?  $file["tmp_name"] : null;

    $uploads_dir = "../upload"; // Ganti dengan direktori upload yang sesuai
    // Membuat direktori berdasarkan nama dan waktu_pembayaran
    $subdirectory = "$uploads_dir/$nama/$formatted_waktu_pembayaran";
    if (!file_exists($subdirectory)) {
        mkdir($subdirectory, 0777, true);
    }
    // Pindahkan file ke direktori upload
    if ($file_name !== null) {
        move_uploaded_file(
            $file_tmp_name,
            "$subdirectory/$file_name"
        );
    }

    // Insert data into database
    $query = "INSERT INTO riwayat_pembayaran VALUES (NULL, '$nama', '$nik', '$metode', '$verifikator', '$rt', '$jumlah_transaksi', 'pemasukan', '$formatted_waktu_pembayaran', NOW(), '$id_user', '$file_name')";
    // var_dump($query);
    // die;
    $succes_mes = "Berhasil Melakukan Penambahan Verifikasi Data";
    $failed_mes = "Gagal Melakukan Penambahan Verifikasi Data";

    $postData = new PostData($conn, $query, $succes_mes, $failed_mes);
    echo $postData->handlePostData();
}
