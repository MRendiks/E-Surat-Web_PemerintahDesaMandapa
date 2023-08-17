<?php
session_start();
require_once '../helper/connection.php';

$id_penduduk = $_POST['id_penduduk'];
$no_kk = $_POST['no_kk'];
$NIK = $_POST['NIK'];
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
$username = $_POST['username'];
$password = $_POST['password'];



$query = mysqli_query($connection, "UPDATE penduduk SET no_kk = '$no_kk', NIK = '$NIK', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', agama='$agama', pekerjaan='$pekerjaan', pendidikan='$pendidikan',nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', username='$username', password='$password' WHERE id_penduduk = '$id_penduduk'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
}
