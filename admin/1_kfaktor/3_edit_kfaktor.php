<?php 
$get_in = $_GET["in"];
// echo $get_in;

$sql = "SELECT * FROM f1_kfaktor WHERE inisial = '$get_in'";
$query = mysqli_query($db, $sql) or die($db -> error);
$data = mysqli_fetch_array($query);
	if ($data["atribut_kfaktor"] == "B") {
		$atribut_kfaktor = "Benefit";
	} elseif ($data["atribut_kfaktor"] == "C") {
		$atribut_kfaktor = "Cost";
	}

			// LOGIKA PEMBATASAN PEMBERIAN NILAI BOBOT FAKTOR
			$sql2 = "SELECT nbf FROM f1_kfaktor;";
			$hasil2 = tampilkan_looping($sql2); 
			//var_dump($hasil2);

			$totalnbf = 0;
			$sisanbf = 0;
			foreach ($hasil2 as $data2) {
				$totalnbf = $totalnbf + $data2["nbf"];
			} 
			// echo $totalnbf;
			$sisanbf = 1 - $totalnbf;
			// echo $sisanbf;
?>
<div class="bg_faktor">
	<hr>
	<form method="post" class="col-66">
		<p class="note">Penambahan Nilai Bobot yang dibolehkan tinggal, <?= $sisanbf; ?></p>
		<table class="w100">
			<tr>
				<td class="w30">
					<input type="hidden" name="inisial" value="<?= $get_in; ?>">
					<input type="text" name="nama_kfaktor" value="<?= $data["nama_kfaktor"]; ?>">
				</td>
				<td class="w30">
					<input type="text" name="nbf" value="<?= $data["nbf"]; ?>">
				</td>
				<td class="w20">
					<select name="atribut_kfaktor">
						<option value="<?= $data["atribut_kfaktor"]; ?>">- <?= $atribut_kfaktor; ?> -</option>
						<option value="C">Cost</option>
						<option value="B">Benefit</option>
					</select>
				</td>
				<td>
					<div class="submit">
						<button name="submit">
							<!-- <i class="fa fa-plus" aria-hidden="true"></i>  -->Save
						</button>
					</div>
				</td>
			</tr>
		</table>
		<table class="w100">
			<tr>
				
			</tr>
		</table>
	</form>
	<hr>
	<?php 
		if ( isset($_POST["submit"]) ) {
			// echo "Lakukan proses";
			// var_dump($_POST);
				if ( edit_faktor($_POST) > 0  ) {
					?> 
					<script>
						alert("Berhasil");
						window.location.href="?hl=fktr&op=show";
					</script>
					<?php 
				} else {
					echo mysqli_error($db);
				}
		}
	?>
</div>