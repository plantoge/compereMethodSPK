<?php
session_start();
include "../function/function.php";

if (!isset($_SESSION["guru"])) {
	header("location: ../");
	exit;
}

$sesi_username = $_SESSION["username"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>SMK Negeri 6 Padang</title>
	<link rel="stylesheet" type="text/css" href="../style/responsif.css">
	<link rel="stylesheet" type="text/css" href="../style/2_style_dekor.css">
	<link rel="stylesheet" type="text/css" href="../style/4_style_guru.css">
	<link rel="stylesheet" type="text/css" href="../icon/css/font-awesome.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="halaman">
		<div class="bg_menu col-16 left">
			<div class="img">
				<img src="../gambar/twh.png">
			</div>
			<div class="user">
				<p>Welcome</p>
				<p><b><?= $sesi_username; ?></b></p>
			</div>
			<hr>
			<div class="isi_menu">
				<ul>
					<li>
						<a href="?hl=lprn&op=show">
							<i class="fa fa-home" aria-hidden="true"></i>Laporan
						</a>
					</li>
					<li>
						<a href="logout.php" class="logout" onclick="return confirm('Yakin ingin keluar ? ')">
							<i class="fa fa-power-off" aria-hidden="true"></i>Logout
						</a>
					</li>
				</ul>
			</div> <!-- div close isi menu -->
		</div>

		<div class="bg_konten col-83 right">
			<div class="header">
				<h3 class="right">Sistem Penunjang Keputusan</h3>
			</div>

			<div class="isi_konten w95">
				<?php
				
					// PROSES HALAMAN RESPONSIF
					$hl = @$_GET['hl'];
					$op = @$_GET['op'];

					if ($hl == "lprn") {
						if ($op == "show") {include "laporan/1_tabel_rank.php";}
						// elseif ($op == "cetak") {include "laporan/2_cetak_penilaian.php";}
					}
				?>
			</div>
			<div class="footer">
				<h6 class="right">CopyRight - Fauzi</h6>
			</div>

		</div>
	</div>
</body>
</html>