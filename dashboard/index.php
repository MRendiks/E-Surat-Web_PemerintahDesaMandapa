<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$penduduk = mysqli_query($connection, "SELECT COUNT(*) FROM penduduk");
$surat_selesai = mysqli_query($connection, "SELECT COUNT(*) FROM surat WHERE status='Selesai'");
$surat_belum_selesai = mysqli_query($connection, "SELECT COUNT(*) FROM surat WHERE status='Belum Selesai'");
$info_desa = mysqli_query($connection, "SELECT COUNT(*) FROM info_desa");
$komplain = mysqli_query($connection, "SELECT COUNT(*) FROM komplain");
$kategori = mysqli_query($connection, "SELECT COUNT(*) FROM kategori");


$total_penduduk = mysqli_fetch_array($penduduk)[0];
$total_surat_selesai = mysqli_fetch_array($surat_selesai)[0];
$total_surat_belum_selesai = mysqli_fetch_array($surat_belum_selesai)[0];
$total_info_desa = mysqli_fetch_array($info_desa)[0];
$total_komplain = mysqli_fetch_array($komplain)[0];
$total_kategori = mysqli_fetch_array($kategori)[0];
?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="column">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total surat Selesai</h4>
            </div>
            <div class="card-body">
              <?= $total_surat_selesai ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total surat Belum Selesai</h4>
            </div>
            <div class="card-body">
              <?= $total_surat_belum_selesai ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total penduduk</h4>
              </div>
              <div class="card-body">
                <?= $total_penduduk ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Info Desa</h4>
              </div>
              <div class="card-body">
                <?= $total_info_desa ?>
              </div>
            </div>
          </div>
        </div>
      
    </div>
      
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total komplain Masuk</h4>
              </div>
              <div class="card-body">
                <?= $total_komplain ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-secondary">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Kategori Surat</h4>
              </div>
              <div class="card-body">
                <?= $total_kategori ?>
              </div>
            </div>
          </div>
        </div>
    </div>
    
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>