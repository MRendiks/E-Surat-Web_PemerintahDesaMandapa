<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT id_surat,kategori.id_kategori,penduduk.id_penduduk,nama_kategori, NIK, nama, tgl_pengajuan, status FROM surat 
INNER JOIN kategori ON surat.id_kategori = kategori.id_kategori
INNER JOIN penduduk ON surat.id_penduduk = penduduk.id_penduduk WHERE status = 'Belum Selesai'");

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Surat</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Surat</th>
                  <th>NIK</th>
                  <th>Nama Penduduk</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Status</th>
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
                    <td><?= $data['nama_kategori'] ?></td>
                    <td><?= $data['NIK'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['tgl_pengajuan'] ?></td>
                    <td>
                    <?php if ($data['status'] == "Belum Selesai") {
                      ?>
                      <span class="badge badge-danger mb-md-0 mb-1"><?= $data['status'] ?></span>
                      <?php
                    }else{
                      ?>
                      <p class="badge badge-success mb-md-0 mb-1"><?= $data['status'] ?></p>
                      <?php
                    } ?>  
                    </td>
                    <td>
                    <a class="btn btn-sm btn-primary mb-md-1 mb-1" style="width: 70px;" href="cetak_surat.php?id_surat=<?= $data['id_surat'] ?>">
                        <i class="fas fa-print fa-fw"></i>
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