<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_penduduk = $_GET['id_penduduk'];
$query = mysqli_query($connection, "SELECT * FROM penduduk WHERE id_penduduk='$id_penduduk'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Penduduk</h1>
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
              <input type="hidden" name="id_penduduk" value="<?= $row['id_penduduk'] ?>">
                <tr>
                  <td>NO KK</td>
                  <td><input class="form-control" type="number" name="no_kk" required value="<?= $row['no_kk'] ?>"></td>
                </tr>
                <tr>
                  <td>NIK</td>
                  <td><input class="form-control" type="number" name="NIK" required value="<?= $row['NIK'] ?>"></td>
                </tr>
                <tr>
                  <td>Nama Penduduk</td>
                  <td><input class="form-control" type="text" name="nama" required value="<?= $row['nama'] ?>"></td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><input class="form-control" type="text" name="tempat_lahir" required value="<?= $row['tempat_lahir'] ?>"></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td><input class="form-control" type="date" name="tanggal_lahir" required value="<?= $row['tanggal_lahir'] ?>"></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>
                    <select class="form-control" name="jenis_kelamin" id="jenkel" required>
                      <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == "Laki-laki") {
                                              echo "selected";
                                            } ?>>Laki-laki</option>
                      <option value="Perempuan" <?php if ($row['jenis_kelamin'] == "Perempuan") {
                                                echo "selected";
                                              } ?>>Perempuan</option>
                    </select>
                  </td>
                </tr>
                <tr>
                <td>Agama</td>
                <td><input class="form-control" type="text" name="agama" value="<?= $row['agama']; ?>" required></td>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <td><input class="form-control" type="text" name="pekerjaan" value="<?= $row['pekerjaan']; ?>" required></td>
              </tr>
              <tr>
                <td>Pendidikan</td>
                <td><input class="form-control" type="text" name="pendidikan" value="<?= $row['pendidikan']; ?>" required></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><textarea class="form-control"name="alamat" required><?= $row['alamat']; ?></textarea></td>
              </tr>
              <tr>
                <td>Nama Ayah</td>
                <td><input class="form-control" type="text" name="nama_ayah" value="<?= $row['nama_ayah']; ?>" required></td>
              </tr>
              <tr>
                <td>Nama Ibu</td>
                <td><input class="form-control" type="text" name="nama_ibu" value="<?= $row['nama_ibu']; ?>" required></td>
              </tr>
              <tr>
                <td>Username</td>
                <td><input class="form-control" type="text" name="username" value="<?= $row['username']; ?>" required></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input class="form-control" type="text" name="password" value="<?= $row['password']; ?>" required></td>
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