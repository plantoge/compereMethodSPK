<?php 
// JIKA JUMLAH FAKTOR BELUM DARI 5 MAKA TIDAK BISA MENGINPUT EVALUASI
	$sql1 = "SELECT count(inisial) as jml_faktor FROM f1_kfaktor;";
	$hasil1 = tampilkan_nonlooping($sql1); 
	// var_dump($hasil1);

	if ($hasil1['jml_faktor'] == 5) {
?>
		<form method="post">
			<table>
				<tr>
					<td>
						<input type="text" name="jml_dt" placeholder="Jumlah Data">
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
	<?php 
			if (isset($_POST["submit"])) {
				$_SESSION["jml_dt_ef"] = @$_POST["jml_dt"];
				// echo $_SESSION["jml_dt_ef"];
				?> 
				<script type="text/javascript">
					window.location.href="?hl=ef&op=input";
				</script>
				<?php 
			}
	} else {
		?> 
		<script>
			alert("Data Faktor tidak Mencukupi Batas Maksimal");
			window.location.href="?hl=ef&op=show";
		</script>
		<?php
	}
	?>