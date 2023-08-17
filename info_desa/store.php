<?php
session_start();
require_once '../helper/connection.php';

$judul_info = $_POST['judul_info'];
$informasi = $_POST['informasi'];
$id_admin = $_SESSION['id_admin'];

$query = mysqli_query($connection, "INSERT INTO info_desa values('', '$id_admin' ,'$judul_info', '$informasi' )");
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
