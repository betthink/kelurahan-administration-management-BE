<?php

require "../../config/connect.php";
require "../utils/updateData.php";

$id_penduduk = $_POST['id_penduduk'];
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$no_kk = $_POST['no_kk'];
// $tanggal_lahir = $_POST['tanggal_lahir'];
$tempat_lahir = $_POST['tempat_lahir'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$pekerjaan = $_POST['pekerjaan'];
$nomor_telp = $_POST['nomor_telp'];
$darah = $_POST['darah'];
$kepala_keluarga = $_POST['kepala_keluarga'];
$status_tinggal = $_POST['status_tinggal'];
$status_diri = $_POST['status_diri'];

$succes_mes = "Berhasil Melakukan Perubahan Data penduduk";
$failed_mes = "Gagal Melakukan Perubahan Data penduduk";

$insert = "UPDATE data_penduduk SET nama = '$nama',  nik = '$nik',no_kk = '$no_kk', pekerjaan = '$pekerjaan',  agama = '$agama',  tempat_lahir = '$tempat_lahir',  alamat = '$alamat',  nomor_telp = '$nomor_telp',  darah = '$darah', kepala_keluarga = '$kepala_keluarga',  status_tinggal = '$status_tinggal',   status_diri = '$status_diri' WHERE id_penduduk = '$id_penduduk'";
// var_dump($insert);die;
$updateData = new UpdateData($conn, $insert, $succes_mes, $failed_mes);
echo $updateData->handleUpdateData();
