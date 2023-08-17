<?php
session_start();
require_once '../helper/connection.php';

$nama_kategori = $_POST['nama_kategori'];
$id_admin = $_SESSION['id_admin'];

$query = mysqli_query($connection, "INSERT INTO kategori values('', '$id_admin' ,'$nama_kategori')");
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
