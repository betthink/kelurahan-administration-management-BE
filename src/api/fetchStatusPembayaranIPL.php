<?php

require "../../config/connect.php";
require "../utils/getDataJson.php";
$iduser = $_GET['iduser'];
$columns = [ "nama", "waktu_pembayaran", "id_user", "status_pembayaran"];
$query = "SELECT
   riwayat_pembayaran.nama,
    riwayat_pembayaran.waktu_pembayaran,
     riwayat_pembayaran.id_user,
    CASE
        WHEN riwayat_pembayaran.waktu_pembayaran = CURDATE() THEN 1
        ELSE 0
    END AS status_pembayaran
FROM
    riwayat_pembayaran
JOIN
    list_pembayar_iuran t2 ON riwayat_pembayaran.id_user = t2.id_user where t2.id_user = $iduser ;
";

$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
