<?php 
	$sql1 = "SELECT nama_faktor, inisial FROM f1_faktor;";
	$sql2 = "SELECT nisn, nama_siswa, ne_f1, ne_f2, ne_f3, ne_f4, ne_f5 FROM f2_evaluasi;";

	$dt_faktor = tampilkan_looping($sql1);
	$dt_evaluasi = tampilkan_looping($sql2);

?>
<div class="show">
	<div class="judul">
		<h3>Hasil Proses MFEP SAW</h3>
		<h5 style="font-weight: normal; margin-top: -10px;">
			note : Data ...
		</h5>
	</div>
	<div class="button">
		<a href="?hl=method&op=show&target=proses">
			<button>
				<i class="fa fa-gavel" aria-hidden="true"></i>
			</button>
		</a>
	</div>

	<div class="form" style="margin-bottom: 20px;">
		<table class="w100 border" border="1">
			<tr>
				<th colspan="3">Evaluasi Data</th>
				<th colspan="5">Point Penilaian</th>
			</tr>
			<tr>
				<th>No.</th>
				<th>Nisn</th>
				<th>Nama Siswa</th>
				<?php foreach ($dt_faktor as $nama_faktor) : ?>
					<th><?= $nama_faktor["inisial"]; ?></th>
				<?php endforeach; ?>
			</tr>
			<?php $no=1; ?>
			<?php foreach ($dt_evaluasi as $data_ev) :?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $data_ev["nisn"]; ?></td>
				<td><?= $data_ev["nama_siswa"]; ?></td>
				<td><?= $data_ev["ne_f1"]; ?></td>
				<td><?= $data_ev["ne_f2"]; ?></td>
				<td><?= $data_ev["ne_f3"]; ?></td>
				<td><?= $data_ev["ne_f4"]; ?></td>
				<td><?= $data_ev["ne_f5"]; ?></td>
			</tr>
			<?php endforeach;?>
		</table>
	</div>

	<!-- HASIL PROSES DARI MFEP DAN SAW -->
	<div>
		<?php 
			$target = @$_GET["target"];

			if ($target == "proses") {
				include "2_proses_mfep.php"; //MFEP CLEAR
				include "3_proses_saw.php";
			}
		?>
	</div>
</div>