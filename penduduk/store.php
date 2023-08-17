<?php
session_start();
require_once '../helper/connection.php';

$no_kk = $_POST['no_kk'];
$NIK = $_POST['nik'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$status_perkawinan = $_POST['status_perkawinan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$pekerjaan = $_POST['pekerjaan'];
$pendidikan = $_POST['pendidikan'];
$alamat = $_POST['alamat'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$id_admin = $_SESSION['id_admin'];

$query = mysqli_query($connection, "INSERT INTO penduduk values('', '$id_admin' ,'$no_kk', '$NIK', '$nama', '$tempat_lahir', '$tanggal_lahir', '$status_perkawinan', '$jenis_kelamin', '$agama', '$pekerjaan', '$pendidikan', '$alamat', '$nama_ayah', '$nama_ibu', '$NIK', '$nama')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  // header('Location: ./index.php');
}
