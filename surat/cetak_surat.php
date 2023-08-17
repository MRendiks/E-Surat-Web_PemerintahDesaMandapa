<?php
session_start();
require_once '../helper/connection.php';
$id_surat = $_GET['id_surat'];

$surat = mysqli_query($connection, "SELECT * FROM surat");

while($data = mysqli_fetch_array($surat)):
	$no[] = $data['nomor_surat'];	
endwhile;

$nomor_surat = max($no);

if ($nomor_surat == "") {
	$nomor_surat++;
	$surat = mysqli_query($connection, "UPDATE surat SET nomor_surat='$nomor_surat', status='Selesai' WHERE id_surat='$id_surat'");
}else{
	$nomor_surat++;
	$surat = mysqli_query($connection, "UPDATE surat SET nomor_surat='$nomor_surat',status='Selesai' WHERE id_surat='$id_surat'");
}

$result = mysqli_query($connection, "SELECT id_surat, kategori.id_kategori, penduduk.id_penduduk, penduduk.nama, penduduk.tempat_lahir,penduduk.jenis_kelamin, penduduk.status_perkawinan, penduduk.pekerjaan, penduduk.agama, penduduk.pendidikan, penduduk.alamat, penduduk.tanggal_lahir, penduduk.nama_ayah, penduduk.nama_ibu, nama_kategori, NIK, nama, tgl_pengajuan, status, surat.nomor_surat FROM surat 
INNER JOIN kategori ON surat.id_kategori = kategori.id_kategori
INNER JOIN penduduk ON surat.id_penduduk = penduduk.id_penduduk WHERE id_surat='$id_surat'");

$data = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Cetak Surat</title>

	<link href="../assets/img/logo.jpg" rel="icon" type="images/x-icon">

	<link href="../libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<link href="../dist/css/custom-report.css" rel="stylesheet">

	<!-- jQuery -->
	<script src="../libs/jquery/dist/jquery.min.js"></script>


</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td class="text-center" width="10%">
							<img src="../assets/img/logo.jpg" alt="logo-dkm" width="100" />
						</td>
						<td class="text-center" width="90%">
						<b style="font-size: 20px;">PEMERINTAH KABUPATEN MAJALENGKA</b> <br>
						<b style="font-size: 20px;">KECAMATAN DAWUAN</b> <br>
						<b style="font-size: 25px;">KANTOR KEPALA DESA MANDAPA</b> <br>
						<i>Alamat : Jln. Protokol No. 01 Desa Mandapa Kec. Dawuan Kab.Majalengka Kode Pos 45453</i><br>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<?php 
		
		if (strtoupper($data['nama_kategori']) == "SURAT KETERANGAN USAHA") {
			?>
			<div class="container-fluid">
				<h4 class="text-center" style="text-decoration: underline; font-weight: bold; text-transform: uppercase;"><?= $data['nama_kategori']; ?></h4>
				<h5 class="text-center">Nomor : <?= $data['id_kategori']; ?> / <?= $data['nomor_surat']; ?> / Pemdes</h5>
				<br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Yang bertandatangan di bawah ini Kepala Desa Mandapa Kecamatan Dawuan Kabupaten Majalengka, menerangkan bahwa :</p>
				<br>
				<center><table style="border: none; width: 500px;" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td width="30%" style="font-size: 15px;">Nama</td>
							<td style="font-size: 15px;">:</td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['nama']; ?> </td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Tempat Tanggal Lahir</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['tempat_lahir'];?> / <?= $data['tanggal_lahir'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Agama</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['agama'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Jenis Kelamin</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['jenis_kelamin'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Status Perkawinan</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['status_perkawinan'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Alamat</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['alamat'];?></td>	
						</tr>
	
					</tbody>
				</table>
				</center>
				<br><br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Surat keterangan dan jenis usaha ini dibuat atas permintaan yang bersangkutan, adapun jenis usahanya di bidang :</p>
				<br>
				<h4 class="text-center" style="font-weight: bold; text-transform: uppercase;">---------"<?= $data['nama_kategori']; ?>"---------</h4>
				<br><br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Demikian surat keterangan usaha ini dibuat kepada yang berkepentingan agar menjadi maklum serta dapat dipergunakan sebagaimana perlunya.</p>
				<br>
				
				<div style="width: 180px; justify-content: right; float: right;">
					<p style="text-align: center;">Mandapa, <?= date('d')?> <?= date('M')?> <?= date('Y')?> 
					</p>
					<p style="text-align: center;">
					An. Kepala Desa Mandapa</p>
					<p style="text-align: center;">
					Sekretaris Desa
					</p>
					<br><br>
					<h5 style="text-decoration: underline; font-weight: bold; text-transform: uppercase; text-align: center;">LUQMAN NULHAKIM</h5>
				</div>
			</div>

		<?php
		}elseif (strtoupper($data['nama_kategori']) == "SURAT PENGANTAR KETERANGAN BERKELAKUAN BAIK") {
			?>
			<div class="container-fluid">
				<h4 class="text-center" style="text-decoration: underline; font-weight: bold; text-transform: uppercase;"><?= $data['nama_kategori']; ?></h4>
				<h5 class="text-center">Nomor : <?= $data['id_kategori']; ?> / <?= $data['nomor_surat']; ?> / Pemdes</h5>
				<br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Yang bertandatangan di bawah ini Kepala Desa Mandapa Kecamatan Dawuan Kabupaten Majalengka, menerangkan bahwa :</p>
				<br>
				<center><table style="border: none; width: 500px;" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td width="30%" style="font-size: 15px;">Nama</td>
							<td style="font-size: 15px;">:</td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['nama']; ?> </td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Tempat Tanggal Lahir</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['tempat_lahir'];?> / <?= $data['tanggal_lahir'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Status Perkawinan</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['status_perkawinan'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Pendidikan</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['pendidikan'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Alamat</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['alamat'];?></td>	
						</tr>
	
					</tbody>
				</table>
				</center>
				<br><br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Berdasarkan data dan catatan yang ada serta sepanjang pengetahuan kami bahwa orang tersebut di atas adalah :</p>
				<p style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. &nbsp;&nbsp; Penduduk/Warga Desa Mandapa Kec. Dawuan Kab. Majalengka.</p>
				<p style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. &nbsp;&nbsp; Berkelakuan baik dalam kehidupan bermasyarakat.</p>
				<p style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. &nbsp;&nbsp; Tidak pernah tersangkut perkara kriminalitas dengan Kepolisian.</p>
				<p style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. &nbsp;&nbsp; Tidak sedang dalam status tahanan yang berwajib.</p>
				<p style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. &nbsp;&nbsp; Tidak pernah terlibat dengan obat-obatan terlarang.</p>
				
				<br>
				<p style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surat keterangan ini diberikan untuk : <b><u>Melamar Pekerjaan</u></b></p>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Demikian surat keterangan ini dibuat dengan sebenarnya, kepada yang berkepentingan  agar menjadi maklum serta untuk dijadikan bahan seperlunya.</p>
				<br>
				
				<div style="width: 180px; justify-content: right; float: right;">
					<p style="text-align: center;">Mandapa, <?= date('d')?> <?= date('M')?> <?= date('Y')?> 
					</p>
					<p style="text-align: center;">
					An. Kepala Desa Mandapa</p>
					<br><br>
					<h6 style="text-decoration: underline; font-weight: bold; text-transform: uppercase; text-align: center;">CUCU HASAN NUGRAHA, ST</h6>
				</div>
			</div>
		<?php
		}elseif(strtoupper($data['nama_kategori']) == "SURAT KETERANGAN DOMISILI") {
			?>
			<div class="container-fluid">
				<h4 class="text-center" style="text-decoration: underline; font-weight: bold; text-transform: uppercase;"><?= $data['nama_kategori']; ?></h4>
				<h5 class="text-center">Nomor : <?= $data['id_kategori']; ?> / <?= $data['nomor_surat']; ?> / Pemdes</h5>
				<br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Yang bertandatangan di bawah ini Kepala Desa Mandapa Kecamatan Dawuan Kabupaten Majalengka, menerangkan bahwa :</p>
				<br>
				<center><table style="border: none; width: 500px;" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td width="30%" style="font-size: 15px;">Nama</td>
							<td style="font-size: 15px;">:</td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['nama']; ?> </td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Tempat Tanggal Lahir</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['tempat_lahir'];?> / <?= $data['tanggal_lahir'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">NIK</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['NIK'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Pekerjaan</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['pekerjaan'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Alamat</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['alamat'];?></td>	
						</tr>
	
					</tbody>
				</table>
				</center>
				<br><br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Berdasarkan data yang ada pada kami dan keterangan Ketua RT/RW setempat, bahwa orang tersebut  berdomisili sesuai alamat di atas.</p>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Demikian surat keterangan ini dibuat dengan sebenarnya, kepada yang berkepentingan agar  maklum serta untuk dijadikan bahan seperlunya.</p>
				<br>
				
				<div style="width: 180px; justify-content: right; float: right;">
					<p style="text-align: center;">Mandapa, <?= date('d')?> <?= date('M')?> <?= date('Y')?> 
					</p>
					<p style="text-align: center;">
					An. Kepala Desa Mandapa</p>
					<p style="text-align: center;">
					Sekretaris Desa</p>
					<br><br>
					<h6 style="text-decoration: underline; font-weight: bold; text-transform: uppercase; text-align: center;">LUQMAN NULHAKIM</h6>
				</div>
			</div>
		<?php
		}elseif (strtoupper($data['nama_kategori']) == "SURAT KETERANGAN") {
			?>
			<div class="container-fluid">
				<h4 class="text-center" style="text-decoration: underline; font-weight: bold; text-transform: uppercase;"><?= $data['nama_kategori']; ?></h4>
				<h5 class="text-center">Nomor : <?= $data['id_kategori']; ?> / <?= $data['nomor_surat']; ?> / Pemdes</h5>
				<br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Yang bertandatangan di bawah ini Kepala Desa Mandapa Kecamatan Dawuan Kabupaten Majalengka, menerangkan bahwa :</p>
				<br>
				<center><table style="border: none; width: 500px;" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td width="30%" style="font-size: 15px;">Nama</td>
							<td style="font-size: 15px;">:</td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['nama']; ?> </td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Tempat Tanggal Lahir</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['tempat_lahir'];?> / <?= $data['tanggal_lahir'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Jenis Kelamin</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['jenis_kelamin'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Status</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['status'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Pekerjaan</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['pekerjaan'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Alamat</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['alamat'];?></td>	
						</tr>
	
					</tbody>
				</table>
				</center>
				<br><br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Berdasarkan ketererangan Ketua RT bahwa orang tersebut di atas adalah benar warga kami sesuai dengan alamat tersebut di atas, yang keberadaanya sekarang sedang bekerja diluar kota <b><i>(bekerja di Bangka).</i></b></p>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Demikianlah surat keterangan ini kami buat dengan sebenarnya, kepada yang berkepentingan agar menjadi maklum, serta untuk dapat dipergunakan sebagaimana perlunya.</p>
				<br>
				
				<div style="width: 180px; justify-content: right; float: right;">
					<p style="text-align: center;">Mandapa, <?= date('d')?> <?= date('M')?> <?= date('Y')?> 
					</p>
					<p style="text-align: center;">
					An. Kepala Desa Mandapa</p>
					
					<br><br>
					<h6 style="text-decoration: underline; font-weight: bold; text-transform: uppercase; text-align: center;">CUCU HASAN NUGRAHA, ST</h6>
				</div>
			</div>

		<?php
		}elseif (strtoupper($data['nama_kategori']) == "SURAT KETERANGAN KELAHIRAN") {
			?>
			<div class="container-fluid">
				<h4 class="text-center" style="text-decoration: underline; font-weight: bold; text-transform: uppercase;"><?= $data['nama_kategori']; ?></h4>
				<h5 class="text-center">Nomor : <?= $data['id_kategori']; ?> / <?= $data['nomor_surat']; ?> / Pemdes</h5>
				<br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Yang bertandatangan di bawah ini Kepala Desa Mandapa Kecamatan Dawuan Kabupaten Majalengka, menerangkan bahwa :</p>
				<br>
				<center><table style="border: none; width: 500px;" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td width="30%" style="font-size: 15px;">Nama</td>
							<td style="font-size: 15px;">:</td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['nama']; ?> </td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Tempat Tanggal Lahir</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['tempat_lahir'];?> / <?= $data['tanggal_lahir'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Jenis Kelamin</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['jenis_kelamin'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Dari Pasangan Suami istri</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['nama_ayah'];?> dan <?= $data['nama_ibu'];?></td>	
						</tr>
						<tr>
							<td width="30%" style="font-size: 15px;">Alamat</td>
							<td style="font-size: 15px;">: </td>
							<td width="70%" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;<?= $data['alamat'];?></td>	
						</tr>
	
					</tbody>
				</table>
				</center>
				<br><br>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Berdarkan keterangan Ketua RT bahwa anak tersebut di atas lahir di Desa Mandapa Kecamatan Dawuan kabupaten Majalengka yang  ditolong oleh paraji/penolong kelahiran yang bernama MIMI SUMARNI. yang bertempat tinggal di Desa Mandapa.</p>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Surat Keterangan Kelahiran ini dibuat atas permintaan yang bersangkutan untuk keperluan pembuatan AKTA LAHIR.</p>
				<p style="font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Demikianlah surat keterangan ini kami buat dengan sebenarnya, kepada yang berkepentingan agar menjadi tahu serta untuk dapat dipergunakan sebagaimana perlunya.</p>
				<br>
				
				<div style="width: 180px; justify-content: right; float: right;">
					<p style="text-align: center;">Mandapa, <?= date('d')?> <?= date('M')?> <?= date('Y')?> 
					</p>
					<p style="text-align: center;">
					An. Kepala Desa Mandapa</p>
					<p style="text-align: center;">
					Kasipem Desa</p>
					<br><br>
					<h6 style="text-decoration: underline; font-weight: bold; text-transform: uppercase; text-align: center;">YAYAT SUPRIYATNA</h6>
				</div>
			</div>
		<?php
		}
		?>

		


	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="libs/jTerbilang/jTerbilang.js"></script>

</body>
</html>