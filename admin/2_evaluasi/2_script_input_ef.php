<div class="show alternatif col-66" style="margin : auto;">
	<div class="judul txtcenter">
		<h3>Create Data Evaluasi Siswa</h3>
		<hr>
	</div>
	<form method="POST">
		<table class="w100">
			<tr>
				<th>No.</th>
				<th>Nisn</th>
				<th>Nama Siswa</th>
			</tr>

	<?php 
		$jml_dt = @$_SESSION["jml_dt_ef"];
		for ($i=1; $i <= $jml_dt; $i++) { 
	?>

			<tr>
				<td><?= $i; ?></td>
				<td>
					<input type="hidden" name="jml_dt" value="<?= $jml_dt; ?>">
					<input type="hidden" name="jml_faktor" value="<?= $hasil1['jml_faktor']; ?>">
					<input type="text" name="nisn[]" placeholder="...." required>
				</td>
				<td>
					<input type="text" name="nama_siswa[]" placeholder="...." required>
				</td>
			</tr>
	<?php 
		}
	?>
			</tr>
		</table>
		<hr>
		<table class="w100" style="margin-top: 20px;">
			<tr>
				<td class="left">
					<!-- <table style="text-align: left;">
						<tr>
							<td>Catatan :</td>
						</tr>
						<?php 
							foreach ($loop_f1_kfaktor as $dt_faktor) {
								?> 
								<tr>
									<td><?= $dt_faktor["inisial"]; ?> = <?= $dt_faktor["nama_kfaktor"]; ?></td>
								</tr>
								<?php
							}
						?>
					</table>  -->
				</td>
				<td class="right">
					<!-- <input type="submit" name="submit" value="Save"> -->
					<div class="submit" style="margin-top: 10px;">
						<button name="submit">
							Save
						</button>
					</div>
				</td>
			</tr>
		</table>
	</form>
<?php 
		if ( isset($_POST["submit"]) ) {
			if ( tambah_ef($_POST) > 0  ) {
				?> 
				<script>
					alert("Berhasil ditambahkan");
					window.location.href="?hl=ef&op=show";
				</script>
				<?php 
			} else {
				echo mysqli_error($db);
			}
		}
?>
</div>

