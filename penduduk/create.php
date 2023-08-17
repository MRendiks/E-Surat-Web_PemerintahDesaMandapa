<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$prodi = mysqli_query($connection, "SELECT * FROM prodi");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Penduduk</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>No KK</td>
                <td><input class="form-control" type="number" name="no_kk" required></td>
              </tr>
              <tr>
                <td>NIK</td>
                <td><input class="form-control" type="number" name="nik" required></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td><input class="form-control" type="text" name="nama" required></td>
              </tr>
              <tr>
                <td>Kota Kelahiran</td>
                <td><input class="form-control" type="text" name="tempat_lahir" size="20" required></td>
              </tr>
              <tr>
                <td>Tanggal Kelahiran</td>
                <td><input class="form-control" type="date" id="datepicker" name="tanggal_lahir" required></td>
              </tr>
              <tr>
                <td>Status Perkawinan</td>
                <td>
                  <select class="form-control" name="status_perkawinan" id="jenkel" required>
                    <option value="">--Pilih Status Perkawinan--</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>
                  <select class="form-control" name="jenis_kelamin" id="jenkel" required>
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Agama</td>
                <td><input class="form-control" type="text" name="agama" required></td>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <td><input class="form-control" type="text" name="pekerjaan" required></td>
              </tr>
              <tr>
                <td>Pendidikan</td>
                <td><input class="form-control" type="text" name="pendidikan" required></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><textarea class="form-control"name="alamat" required></textarea></td>
              </tr>
              <tr>
                <td>Nama Ayah</td>
                <td><input class="form-control" type="text" name="nama_ayah" required></td>
              </tr>
              <tr>
                <td>Nama Ibu</td>
                <td><input class="form-control" type="text" name="nama_ibu" required></td>
              </tr>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>