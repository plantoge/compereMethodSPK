<?php 
$sql1 = "SELECT nama_faktor, inisial FROM f1_faktor;";
$dt_faktor = tampilkan_looping($sql1);
?>
<div class="proses_mfep">
	<span>
		<h3>Penilaian Menggunakan Metode SAW</h3>
	</span>
	<table class="w100" border="1" style="border-collapse: collapse; border : 1px solid grey;">
		<!-- HEADER TABEL SAW -->
		<tr>
			<th rowspan="2">Nama Alternatif</th>
			<th colspan="5">Kriteria</th>
			<th rowspan="2">V-n</th>
		</tr>
		<tr>
			<?php foreach ($dt_faktor as $nama_faktor) : ?>
				<th><?= $nama_faktor["inisial"]; ?></th>
			<?php endforeach; ?>
		</tr>
		<!-- HEADER TABEL SAW -->
		<?php 
		
		?>
		<tr></tr>

	</table>
</div>