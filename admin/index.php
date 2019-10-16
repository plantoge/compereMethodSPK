<?php
session_start();
include "../function/function.php";

if (!isset($_SESSION["admin"])) {
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
	<link rel="stylesheet" type="text/css" href="../style/3_style_admin.css">
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
						<a href="?hl=user&op=show">
							<i class="fa fa-home" aria-hidden="true"></i> Data User
						</a>
					</li>
					<li>
						<a href="?hl=fktr&op=show">
							<i class="fa fa-home" aria-hidden="true"></i>Kriteria
						</a>
					</li>
					<li>
						<a href="?hl=ef&op=show">
							<i class="fa fa-home" aria-hidden="true"></i>Alternatif
						</a>
					</li>
					<li>
						<a href="?hl=method&op=show&target=data">
							<i class="fa fa-home" aria-hidden="true"></i>Penilaian
						</a>
					</li>
					<li>
						<a href="logout.php" class="logout" onclick="return confirm('Yakin ingin keluar ? ')" >
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

					if ($hl == "fktr") {
						if ($op == "show") {include "1_kfaktor/1_show_kfaktor.php";}
						elseif ($op == "input") {include "1_kfaktor/2_input_kfaktor.php";} 
						elseif ($op == "edit") {include "1_kfaktor/3_edit_kfaktor.php";} 
						elseif ($op == "delete") {include "1_kfaktor/4_delete_kfaktor.php";}
						elseif ($op == "trunc") {include "1_kfaktor/4_truncate_kfaktor.php";}
					}elseif ($hl == "ef") {
						if ($op == "show") {include "2_evaluasi/1_show_ef.php";}
						elseif ($op == "input") {include "2_evaluasi/2_input_ef.php";} 
						elseif ($op == "edit") {include "2_evaluasi/3_edit_ef.php";} 
						elseif ($op == "delete") {include "2_evaluasi/4_delete_ef.php";}
						elseif ($op == "trunc") {include "2_evaluasi/4_truncate_evaluasi.php";}
					}elseif ($hl == "method") {
						if ($op == "show") {include "3_penilaian/1_show_data.php";}
						elseif ($op == "trunc") {include "3_penilaian/6_truncate_penilaian.php";}
						// elseif ($op == "input") {include "";} 
						// elseif ($op == "edit") {include "";} 
						// elseif ($op == "delete") {include "";}
					}elseif ($hl == "user") {
						if ($op == "show") {include "4_user/1_show_user.php";}
						elseif ($op == "input") {include "4_user/2_input_user.php";} 
						elseif ($op == "edit") {include "4_user/3_edit_user.php";} 
						elseif ($op == "delete") {include "4_user/4_delete_user.php";}
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