<?php
session_start();
require_once '../helper/connection.php';

$id_kategori = $_GET['id_kategori'];

$result = mysqli_query($connection, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");

if (mysqli_affected_rows($connection) > 0) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
