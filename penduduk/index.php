<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM penduduk");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Penduduk</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>No KK</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Status Perkawinan</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Pekerjaan</th>
                  <th>Pendidikan</th>
                  <th>Nama Ayah</th>
                  <th>Nama Ibu</th>
                  <th>Alamat</th>
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data['no_kk'] ?></td>
                    <td><?= $data['NIK'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['tempat_lahir'] ?></td>
                    <td><?= $data['tanggal_lahir'] ?></td>
                    <td><?= $data['status_perkawinan'] ?></td>
                    <td><?= $data['jenis_kelamin'] ?></td>
                    <td><?= $data['agama'] ?></td>
                    <td><?= $data['pekerjaan'] ?></td>
                    <td><?= $data['pendidikan'] ?></td>
                    <td><?= $data['nama_ayah'] ?></td>
                    <td><?= $data['nama_ibu'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id_penduduk=<?= $data['id_penduduk'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?id_penduduk=<?= $data['id_penduduk'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td>
                  </tr>

                <?php
                $no++;
                endwhile;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>