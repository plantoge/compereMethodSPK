<?php 
	$sql1 = "SELECT count(inisial) as jml_faktor FROM f1_kfaktor;";
	$hasil1 = tampilkan_nonlooping($sql1); 
	//var_dump($hasil1);

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

	// SCRIP UNTUK LOGIKA PEMBATASAN INPUT DATA FAKTOR
	if ($hasil1["jml_faktor"] < 5) {
		if ($totalnbf < 1) {
			// FILE INCLUDE INTI DARI INPUT DATA FAKTOR
			include "2_script_input_kfaktor.php";
			// ----------------------------------------
		} else {
			?> 
			<script>
				alert("Total Nilai Bobot Faktor/Kriteria Melebihi Kapasitas");
				window.location.href="?hl=fktr&op=show";
			</script>
			<?php
			die; 
		}

	} elseif($hasil1["jml_faktor"] >= 5) {
		?> 
		<script>
			alert("Data Faktor Melebihi Kapasitas");
			window.location.href="?hl=fktr&op=show";
		</script>
		<?php 
	}
?>