<?php 
$sql_carikode = "SELECT MAX(inisial) FROM f1_kfaktor";
$carikode = mysqli_query($db, $sql_carikode) or die($db -> error);
$datakode = mysqli_fetch_array($carikode);

	if ($datakode) {
		// substr(data, 1) berfungsi memotong data dari string, maka = ata
		$nilaikode = substr($datakode[0], 1);
		// echo $nilaikode; die;
		$kode = (int) $nilaikode;
		$kode = $kode +1;
		$hasilkode = "F".str_pad($kode, 1, "0", STR_PAD_LEFT);
	}else {
		$hasilkode = "F1";
	}
?>