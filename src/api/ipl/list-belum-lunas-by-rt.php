<?php

header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Origin: https://appfordev.com");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Izinkan metode HTTP tertentu
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Izinkan header kustom yang mungkin digunakan dalam permintaan Anda
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");
require "../../../config/connect.php";

// 1. Ambil semua pengguna dari tabel user
$rt = $_GET['rt'];
$usersQuery = "SELECT lpi.id_user, dp.nama, dp.rt 
               FROM list_pembayar_iuran AS lpi
               INNER JOIN data_penduduk AS dp ON lpi.id_user = dp.id_penduduk
               WHERE dp.rt = '$rt'";
$usersResult = mysqli_query($conn, $usersQuery);
// var_dump($usersResult['rt']);die;
$response = [];

// 2. Untuk setiap pengguna
while ($user = mysqli_fetch_assoc($usersResult)) {
    $userId = $user['id_user'];
    $userName = $user['nama'];

    // 3. Periksa entri pembayaran untuk bulan dan tahun saat ini
    $currentMonth = date('m');
    $currentYear = date('Y');
    $paymentQuery = "SELECT COUNT(*) as total FROM riwayat_pembayaran
                     WHERE id_user = $userId
                     AND MONTH(waktu_verifikasi) = $currentMonth
                     AND YEAR(waktu_verifikasi) = $currentYear";

    $paymentResult = mysqli_query($conn, $paymentQuery);
    $paymentData = mysqli_fetch_assoc($paymentResult);
    $totalPayments = $paymentData['total'];

    // 4. Tandai sebagai "lunas" atau "belum lunas" dan tambahkan ke respons
    $status = ($totalPayments > 0) ? 'lunas' : 'belum lunas';

    $response[] = [
        'id_user' => $userId,
        'user_name' => $userName,
        'status' => $status,
    ];
}

// Kembalikan data dalam bentuk JSON
echo json_encode($response);
