<?php
require "../../config/connect.php";
require "../utils/getDataJson.php";
$columns = ["id_pemohon", "nik", "jenis_surat", "tanggal_permohonan", "status_permohonan",  "nama", "no_kk", "tanggal_lahir", "tempat_lahir", "agama", "pekerjaan","jenis_kelamin", "nomor_telp", "alamat", "darah", "kepala_keluarga", "status_tinggal", "status_diri", "rt", "rw", "tanggal_registrasi", "id_user", "persetujuan_rw"];
$rt = $_GET["rt"];
$query = "SELECT * FROM permohonan_surat inner join data_penduduk on permohonan_surat.id_user = data_penduduk.id_penduduk WHERE rt = $rt";
// var_dump($query);
$getData = new GetData($conn, $columns, $query);
$data = $getData->handleFetchData();
echo $data;
