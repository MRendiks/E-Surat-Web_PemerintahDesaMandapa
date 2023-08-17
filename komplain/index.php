<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT penduduk.nama, komplain.isi_komplain, komplain.jenis_komplain FROM komplain 
INNER JOIN penduduk ON komplain.id_penduduk = penduduk.id_penduduk");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Komplain</h1>
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
                  <th>Nama Penduduk</th>
                  <th>Jenis Komplain</th>
                  <th>Isi Komplain</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <tr class="text-center">
                    <td width="10%"><?= $no ?></td>
                    <td width="20%"><?= $data['nama'] ?></td>
                    <td width="20%"><?= $data['jenis_komplain'] ?></td>
                    <td width="50%"><?= $data['isi_komplain'] ?></td>
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