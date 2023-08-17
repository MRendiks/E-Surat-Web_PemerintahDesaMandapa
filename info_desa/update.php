<?php
session_start();
require_once '../helper/connection.php';

$id_info = $_POST['id_info'];
$judul_info = $_POST['judul_info'];
$informasi = $_POST['informasi'];
$username = $_POST['username'];

$query = mysqli_query($connection, "UPDATE info_desa SET judul_info = '$judul_info', informasi = '$informasi' WHERE id_info = '$id_info'");
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
