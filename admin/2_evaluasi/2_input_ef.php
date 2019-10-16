<?php 
// LOGIKA PHP PERULANGAN FOR UNTUK KOLOM NILAI FAKTOR
	$sql = "SELECT inisial, nama_kfaktor, atribut_kfaktor, nbf FROM f1_kfaktor;";
	$loop_f1_kfaktor = tampilkan_looping($sql);

// LOGIKA PHP KEAMANAN PADA KOLOM NILAI FAKTOR
// JIKA JUMLAH FAKTOR BELUM DARI 5 MAKA TIDAK BISA MENGINPUT EVALUASI
	$sql1 = "SELECT count(inisial) as jml_faktor FROM f1_kfaktor;";
	$hasil1 = tampilkan_nonlooping($sql1); 
	// var_dump($hasil1);

	if ($hasil1['jml_faktor'] == 5) {
		// FILE INCLUDE INTI DARI INPUT DATA EVALUASI
		include "2_script_input_ef.php";
	} else {
		?> 
		<script>
			alert("Data Faktor tidak Mencukupi Batas Maksimal");
			window.location.href="?hl=ef&op=show";
		</script>
		<?php
	}
?>

