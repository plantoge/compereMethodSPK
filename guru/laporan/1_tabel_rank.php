<?php 
$sql_alternatif = " SELECT nisn, nama_siswa FROM f2_evaluasi; ";
$dt_alternatif = tampilkan_looping($sql_alternatif);
?>

<div class="tabel_rank">
	<h3>Data Penilaian</h3>
	<h5 style="font-weight: normal; margin-top: -10px;">
		note : Merupakan tabel penilaian siswa yang di proses terhadap kriteria - kriteria yang di pertimbangkan. 
	</h5>
	<table class="w100 border" style="text-align: center;">
		<tr>
			<th rowspan="2">No.</th>
			<th rowspan="2">Alternatif</th>
			<th colspan="5">Nilai Setiap Kriteria</th>
		</tr>
		<tr>
			<?php 
			$nama_kfaktor = "SELECT nama_kfaktor FROM f1_kfaktor";
			$kfaktor = tampilkan_looping($nama_kfaktor);
			foreach ($kfaktor as $dt_kfaktor) :
			?>
			<th><?= $dt_kfaktor["nama_kfaktor"]; ?></th>
			<?php 
			endforeach;
			?>
		</tr>

		<?php $no=1; ?>
		<?php foreach ($dt_alternatif as $data) :?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $data["nama_siswa"]; ?></td>
				<?php 
					$nisn = $data["nisn"];
					$sql_nilai = "SELECT nilai_rank FROM f3_rank_mfep WHERE nisn = '$nisn'";
					$loop_nilai = tampilkan_looping($sql_nilai);
					foreach ($loop_nilai as $data) :
				?>
						<td><?= $data["nilai_rank"]; ?></td>
				<?php 
					endforeach;
				?>
			</tr>
		<?php endforeach; ?>

	</table>

	<div class="menu_print">
		<ul>
			<li>
				<a href="../report/report_penilaian.php" target="blank_">
					<i class="fa fa-print" aria-hidden="true"></i> 
					<label style="font-size: 14px; cursor: pointer;"><b>Cetak</b></label>
				</a>
			</li>
		</ul>
	</div>

	<?php 
	// include "1_tabel_rank_mfep.php";
	include "1_tabel_rank_saw.php";
	?>
</div>