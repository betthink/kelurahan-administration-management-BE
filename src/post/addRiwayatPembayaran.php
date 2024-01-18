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
    $jumlah_pembayaran = $_POST["jumlah_pembayaran"];
    $waktu_pembayaran = $_POST["waktu_pembayaran"];
    $id_user = $_POST["id_user"];

    // handle upload
    $file = isset($_FILES["file"]) ? $_FILES["file"] : null;
    $file_name = isset($file) ?  $file["name"] : null;
    $file_tmp_name = isset($file_name) ?  $file["tmp_name"] : null;

    $uploads_dir = "./upload"; // Ganti dengan direktori upload yang sesuai
    // Membuat direktori berdasarkan nama dan waktu_pembayaran
    $subdirectory = "$uploads_dir/$nama/$waktu_pembayaran";
    if (!file_exists($subdirectory)) {
        mkdir($subdirectory, 0777, true);
    }
    // Pindahkan file ke direktori upload
    if ($file_name !== null) {
        move_uploaded_file($file_tmp_name,
            "$subdirectory/$file_name"
        );
    }

    // Insert data into database
    $query = "INSERT INTO riwayat_pembayaran VALUES (NULL, '$nama', '$nik', '$metode', '$verifikator', '$rt', '$jumlah_pembayaran', '$waktu_pembayaran', NOW(), '$id_user', '$file_name')";

    $succes_mes = "Berhasil Melakukan Penambahan Verifikasi Data";
    $failed_mes = "Gagal Melakukan Penambahan Verifikasi Data";

    $postData = new PostData($conn, $query, $succes_mes, $failed_mes);
    echo $postData->handlePostData();
}
