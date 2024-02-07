
<?php
$allowed_domains = array("http://localhost:3000", "https://management-administrasi-kelurahan.vercel.app", "https://appfordev.com", "http://localhost");
$origin = $_SERVER['HTTP_ORIGIN'];
if (in_array($origin, $allowed_domains)) {
    header("Access-Control-Allow-Origin: " . $origin);
}
// Izinkan metode HTTP tertentu
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Izinkan header kustom yang mungkin digunakan dalam permintaan Anda
?>