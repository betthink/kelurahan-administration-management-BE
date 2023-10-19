<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["id_pemohon",  "nik", "jenis_surat", "tanggal_permohonan", "status_permohonan",  "nama", "nik", "no_kk", "tanggal_lahir", "tempat_lahir", "jenis_kelamin", "nomor_telp", "alamat", "darah", "kepala_keluarga", "status_tinggal", "status_diri", "rt", "rw", "tanggal_registrasi", "id_user"];

$id_pemohon = $_GET["id_pemohon"];
$query = "SELECT * FROM permohonan_surat inner join data_penduduk on permohonan_surat.id_user = data_penduduk.id_penduduk WHERE id_pemohon = $id_pemohon";
// var_dump($conn);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
