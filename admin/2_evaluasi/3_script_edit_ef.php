<?php 
	$no = 1;
	$get_nisn = $_GET["nisn"];

	$sql4 = "SELECT f2_evaluasi.* FROM f2_evaluasi WHERE f2_evaluasi.nisn = '$get_nisn';";
	$dt_nilai = tampilkan_looping($sql4);
?>
<div class="show alternatif_edit">
	
	<form method="POST">
		<hr>
		<table class="w100">
			<tr>
				<th>No.</th>
				<th>Nisn</th>
				<th>Nama Siswa</th>
			</tr>
			<tr>
				<td><?= $no++; ?></td>
				<td>
					<input type="text" name="nisn" value="<?= $dt_nilai[0]['nisn']; ?>" readonly>
				</td>
				<td>
					<input type="text" name="nama_siswa" value="<?= $dt_nilai[0]['nama_siswa']; ?>">
				</td>
			</tr>
		</table>
		<hr>
		<table class="w100" style="margin-bottom: 30px;">
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

	