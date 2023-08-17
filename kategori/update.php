<?php
session_start();
require_once '../helper/connection.php';

$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];

$query = mysqli_query($connection, "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'");
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
