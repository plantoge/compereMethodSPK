<?php 
	$no = 1;
	$get_nisn = $_GET["nisn"];
// LOGIKA PHP PERULANGAN W
	$sql4 = "SELECT * FROM f2_evaluasi WHERE nisn = '$get_nisn'";
	$dt_nilai = tampilkan_looping($sql4);
?>
<div class=" show bg_ev_faktor">
	<hr>
	<form method="POST">
		<table class="w100">
			<tr>
				<th>No.</th>
				<th>Nisn</th>
				<th>Nama Siswa</th>
				<?php foreach ($dt_faktor as $nama_faktor) : ?>
					<th><?= $nama_faktor["inisial"]; ?></th>
				<?php endforeach; ?>
			</tr>
			<tr>
				<td><?= $no++; ?></td>
				<td>
					<input type="text" name="nisn" value="<?= $dt_nilai[0]['nisn']; ?>" readonly>
				</td>
				<td>
					<input type="text" name="nama_siswa" value="<?= $dt_nilai[0]['nama_siswa']; ?>" readonly>
				</td>
			<?php 
				$no = 1;
				$noo = 1;
				foreach ($dt_faktor as $nama_faktor) {
			?>
					<td>
						<input type="text" name="ne_f<?= $no++; ?>" required>
						<input type="hidden" name="nb_f<?= $noo++; ?>[]" value="<?= $dt_nilai['nbf']; ?>">
					</td>
			<?php 
				}
			?>
			</tr>
		</table>
		<table class="w100" style="margin-top: 20px;">
			<tr>
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
			if ( edit_ef($_POST) > 0  ) {
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

	