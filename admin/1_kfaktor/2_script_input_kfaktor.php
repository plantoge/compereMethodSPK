<?php 
// INCLUDE DIBAWAH ADALAH KODING UNTUK MENGISI KOLOM INISIAL(HIDDEN) SECARA OTOMATIS
include "2_script_inisial_auto.php";
?>
<hr>
<form method="post" class="col-66">
	<p class="note">pemberian Nilai Bobot yang dibolehkan tinggal, <?= $sisanbf; ?></p>
	<table class="w100">
		<tr>
			<td class="w30">
				<input type="text" name="nama_kfaktor" placeholder="Nama Faktor">
				<input type="hidden" name="inisial" value="<?= $hasilkode; ?>">

			</td>
			<td class="w30">
				<input type="text" name="nbf" placeholder="Nilai Bobot Faktor">
			</td>
			<td class="w20">
				<select name="atribut_kfaktor">
					<option value="C">Cost</option>
					<option value="B">Benefit</option>
				</select>
			</td>
			<td>
				<div class="submit">
					<button name="submit">
						Save
					</button>
				</div>
			</td>
		</tr>
	</table>
</form>
<hr>
<?php 
	if ( isset($_POST["submit"]) ) {
		// echo "Lakukan proses";
		// var_dump($_POST);

		$nbf = @$_POST["nbf"];
		$nbf_sementara = $nbf + $totalnbf;
		// echo $nbf_sementara; die;

		if ($nbf_sementara <= 1) {
			if ( tambah_faktor($_POST) > 0  ) {
				?> 
				<script>
					alert("Berhasil ditambahkan");
					window.location.href="?hl=fktr&op=show";
				</script>
				<?php 
			} else {
				echo mysqli_error($db);
			}
		} else {
			?> 
			<script>
				alert("Nilai Faktor Melebihi Kapasitas");
				// window.location.href="?hl=fktr&op=show";
			</script>
			<?php
		}
	}
?>
