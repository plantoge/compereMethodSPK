<?php 
// LOGIKA PHP PERULANGAN FOR UNTUK KOLOM NILAI FAKTOR
	$sql = "SELECT nama_faktor, inisial, nbf FROM f1_faktor;";
	$data = tampilkan_looping($sql);
	
// LOGIKA PHP KEAMANAN PADA KOLOM NILAI FAKTOR
// JIKA JUMLAH FAKTOR BELUM DARI 5 MAKA TIDAK BISA MENGINPUT EVALUASI
	$sql3 = "SELECT count(id_faktor) as jml_faktor FROM f1_faktor;";
	$hasil3 = tampilkan_nonlooping($sql3); 
	// var_dump($hasil1);

	if ($hasil3['jml_faktor'] == 5) {
		// FILE INCLUDE INTI DARI INPUT DATA EVALUASI
		include "3_script_edit_ef.php";
	} else {
		?> 
		<script>
			alert("Data Faktor tidak Mencukupi Batas Maksimal");
			window.location.href="?hl=ef&op=show";
		</script>
		<?php
	}
?>

