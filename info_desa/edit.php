<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_info = $_GET['id_info'];
$query = mysqli_query($connection, "SELECT * FROM info_desa WHERE id_info='$id_info'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Info Desa</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <table cellpadding="8" class="w-100">
              <input type="hidden" name="id_info" value="<?= $row['id_info'] ?>">
                <tr>
                  <td>Judul Informasi</td>
                  <td><input class="form-control" type="text" name="judul_info" required value="<?= $row['judul_info'] ?>"></td>
                </tr>
                <tr>
                  <td>Informasi</td>
                  <td><input class="form-control" type="text" name="informasi" required value="<?= $row['informasi'] ?>"></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>