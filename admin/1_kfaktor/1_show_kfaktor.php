<?php 
$sql = "SELECT inisial, nama_kfaktor, atribut_kfaktor, nbf FROM f1_kfaktor;";
$user = tampilkan_looping($sql);

// var_dump($user);

// foreach ($user as $data) {
// 	echo $data["nama_faktor"];
// }
?>
<div class="show">
	<div class="judul">
		<h3>Kriteria</h3>
		<h5 style="font-weight: normal; margin-top: -10px;">
			note : Data faktor atau Kriteria
		</h5>
	</div>
	<div class="button">
		<a href="?hl=fktr&op=show&target=inp">
			<button name="tambah">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</button>
		</a>
		<div class="bg_faktor">
			<?php 
				$target = @$_GET["target"];

				if ($target == "inp") {	include "2_input_kfaktor.php"; } 
				elseif ($target == "edt"){ include "3_edit_kfaktor.php"; }
			?>
		</div>
	</div>

	<div class="form">
		
		<form method="post">
			<table class="w100 border" border="1" style="text-align: center;">
				<tr>
					<th>No.</th>
					<th>Inisial</th>
					<th>Nama Faktor</th>
					<th>Jenis Faktor</th>
					<th>NBF</th>
					<th colspan="2">Opsi</th>
				</tr>
				<?php $no = 1; ?>
				<?php foreach ($user as $data) : ?>
				<?php 
					if ($data["atribut_kfaktor"] == "B") {
						$jenis_faktor = "Benefit";
					} elseif ($data["atribut_kfaktor"] == "C") {
						$jenis_faktor = "Cost";
					}
				?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $data["inisial"]; ?></td>
					<td><?= $data["nama_kfaktor"]; ?></td>
					<td><?= $jenis_faktor; ?></td>
					<td><?= $data["nbf"]; ?></td>
					<td style="border-right: 0px;">
						<a style="color: black;" href="?hl=fktr&op=show&target=edt&in=<?= $data["inisial"]; ?>">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>
					</td>
					<td>
						<a style="color: black;" href="?hl=fktr&op=delete&in=<?= $data["inisial"]; ?>" onclick="return confirm('Yakin Delete Data ? ')">
							<i class="fa fa-trash-o" aria-hidden="true"></i>
						</a>
					</td>
				</tr>
				<?php 
					$total_bobot = 0;
					$total_bobot = $total_bobot + $data["nbf"];
					// echo $total_bobot;
				?>
				<?php endforeach; ?>
			</table>
			<!-- TOMBOL UNTUK MENGKOSONG KAN TABEL ATAU TRUNCATE -->
			<div class="menu_print">
				<ul>
					<li>
						<a href="?hl=fktr&op=trunc" onclick="return confirm('Yakin Kosongkan Data ? ')">
							<i class="fa fa-times" aria-hidden="true"></i> 
							<label style="font-size: 14px; cursor: pointer;"><b>Hancurkan</b></label>
						</a>
					</li>
					<li>
						<a href="../report/report_kfaktor.php" target="_blank">
							<i class="fa fa-print" aria-hidden="true"></i> 
							<label style="font-size: 14px; cursor: pointer;"><b>Cetak</b></label>
						</a>
					</li>
				</ul>
			</div>
		</form>
	</div>
</div>