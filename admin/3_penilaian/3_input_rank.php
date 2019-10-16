<?php 
$sql_kriteria = "SELECT * FROM f1_kfaktor"; 
$sql_alternatif = "SELECT * FROM f2_evaluasi";
$sql_info = "SELECT nama_kfaktor, nbf FROM f1_kfaktor";

$query_kriteria = tampilkan_looping($sql_kriteria);
$query_alternatif = tampilkan_looping($sql_alternatif);
$query_info = tampilkan_looping($sql_info);

?>
<div class="info_rank col-25 border">
	<p>Informasi Bobot Kriteria</p>
	<hr>
	<table class="w100">
		<?php foreach ($query_info as $info) : ?>
		<tr>
			<td class="border_kanan"><?= $info["nama_kfaktor"]; ?></td>
			<td><?= $info["nbf"]; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<hr>
</div>
<div class="input_rank col-41">
	<h3>Tambah Penilaian</h3>
	<h5 style="font-weight: normal; margin-top: -10px;">
		note : -	
	</h5>
	<form method="POST">
		<table class="w100">
			<tr>
				<td>Alternatif Siswa</td>
			</tr>
				<tr>
					<td>
						<select name="nisn">
							<?php foreach ($query_alternatif as $altf) : ?>
								<option value="<?= $altf['nisn']; ?>"><?= $altf["nama_siswa"]; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>

			<tr>
				<td>Kriteria</td>
			</tr>
				<tr>
					<td>
						<select name="inisial">
							<?php foreach ($query_kriteria as $kriteria) : ?>
								<option value="<?= $kriteria['inisial']; ?>"><?= $kriteria["nama_kfaktor"]; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>

			<tr>
				<td>Penilaian</td>
			</tr>
				<tr>
					<td>
						<input type="text" name="nilai_rank" placeholder="Bobot Nilai">
					</td>
				</tr>
			<tr>
				<td style="float: right;">
					<table>
						<tr>
							<td>
								<input type="submit" name="kembali_rank" value="Kembali">
							</td>
							<td>
								<input type="submit" name="simpan_rank" value="Simpan">
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
<?php 
	if ( isset($_POST["simpan_rank"]) ) {
		if ( tambah_penilaian($_POST) > 0  ) {
			?> 
			<script>
				alert("Berhasil ditambahkan");
				// window.location.href="?hl=method&op=show&target=inp";
			</script>
			<?php 
		} else {
			echo mysqli_error($db);
		}
	}
?>
</div>


<!-- 
	select * from f1_kfaktor WHERE inisial NOT IN (select inisial from f3_rank_mfep);
 -->