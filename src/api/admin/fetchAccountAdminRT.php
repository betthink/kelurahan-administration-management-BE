
<?php
require "../../../config/connect.php";
require "../../utils/getDataJson.php";
$columns = ["id_admin", "nik", "username", "password", "rw", "nomor_telp", "jenis_kelamin", "waktu_registrasi", "role"];
$query = "SELECT * FROM user_admin where role = 'adminRW'";

$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;

