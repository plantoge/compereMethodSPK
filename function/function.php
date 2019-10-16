<?php 
/*==============================================================================================*/
/*|											KONEKSI DATABASE 									*/
/*==============================================================================================*/ 
// KONEKSI
// $localhost = "localhost";
// $username = "skrj3885_fauzi";
// $password = "Skripfauzi14";
// $nmdb = "skrj3885_db_spk";

// $db = mysqli_connect($localhost , $username , $password, $nmdb);
$db = mysqli_connect("localhost","root","","db_spk");

/*==============================================================================================*/
/*|										FUNCTION ALL IN ONE										*/
/*==============================================================================================*/ 
//FUNGSI TAMPIL DATA / SHOW DATA
function tampilkan_looping($sql) {
	global $db;
	$result = mysqli_query($db, $sql);
	$rows = [];

	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tampilkan_nonlooping($sql){
	global $db;
	$hasilsql = mysqli_query($db, $sql) or die($db -> error);
	$result = mysqli_fetch_assoc($hasilsql);
	return $result;
}

/*==============================================================================================*/
/*|												  USER											*/
/*==============================================================================================*/ 
//--------------------PROSES INPUT USER
function tambah_user($dtpost){
	global $db;
	$username = $dtpost["username"];
	$password1 = mysqli_real_escape_string($db, $dtpost["password1"] );
	$password2 = mysqli_real_escape_string($db, $dtpost["password2"] );
	$level = $dtpost["level"];
	// fungsi mysqli_real_escape_string = user bisa masukkan passwd dengan karakter kutip 1 dengan aman.

	// var_dump($dtpost);

	//koding cek password apa sama dengan password konfirmasi
	if ($password1 !== $password2) {
		?> 
		<script>
			alert("Konfirmasi Password Tidak Sesuai! Mohon Diulang.");
		</script>
		<?php 
		return 0;
	}

	//ENKRIPSI PASSWORD DENGAN PASSWORD_DEFAULT
	//PASSWORD_DEFAULT MERUPAKAN TEKNIK ALGORITMA UNTUK ENKRIPSI PASSWORD DI PHP5
	//TIAP PHP UPDATE MAKA TEKNIK ALGORITMA ENKRIPSI JUGA AKAN DI UPDATE YG TERBARU
	$password_enkripsi = password_hash($password1, PASSWORD_DEFAULT);
	// echo $password_enkripsi;
	// die;
	//TAMBAHKAN DATA REGISTRASI KE TABLE USER
	$sqlregistrasi = "INSERT INTO user (username,password,level) VALUES('$username','$password_enkripsi','$level')";
	mysqli_query($db, $sqlregistrasi) or die($db -> error);
	return mysqli_affected_rows($db);
}	

//--------------------PROSES EDIT USER
function edit_user($dtpost){
	global $db;
	$get_id = $dtpost["get_id"];
	$username = $dtpost["username"];
	$password1 = mysqli_real_escape_string($db, $dtpost["password1"] );
	$password2 = mysqli_real_escape_string($db, $dtpost["password2"] );
	$level = $dtpost["level"];
	// fungsi mysqli_real_escape_string = user bisa masukkan passwd dengan karakter kutip 1 dengan aman.

	// var_dump($dtpost);
	// die;

	//koding cek password apa sama dengan password konfirmasi
	if ($password1 !== $password2) {
		?> 
		<script>
			alert("Konfirmasi Password Tidak Sesuai! Mohon Diulang.");
		</script>
		<?php 
		return 0;
	}

	//ENKRIPSI PASSWORD DENGAN PASSWORD_DEFAULT
	//PASSWORD_DEFAULT MERUPAKAN TEKNIK ALGORITMA UNTUK ENKRIPSI PASSWORD DI PHP5
	//TIAP PHP UPDATE MAKA TEKNIK ALGORITMA ENKRIPSI JUGA AKAN DI UPDATE YG TERBARU
	$password_enkripsi = password_hash($password1, PASSWORD_DEFAULT);
	// echo $password_enkripsi;
	// die;
	//TAMBAHKAN DATA REGISTRASI KE TABLE USER
	$sqlregistrasi = "UPDATE user SET username='$username', password = '$password_enkripsi' WHERE id = '$get_id'";
	mysqli_query($db, $sqlregistrasi) or die($db -> error);
	return mysqli_affected_rows($db);
}	

/*==============================================================================================*/
/*|											  FAKTOR											*/
/*==============================================================================================*/ 
//--------------------PROSES TAMBAH FAKTOR
function tambah_faktor($dtpost){
	global$db;

	$nama_kfaktor = $dtpost["nama_kfaktor"];
	$inisial = $dtpost["inisial"];
	$nbf = $dtpost["nbf"];
	$atribut_kfaktor = $dtpost["atribut_kfaktor"];

	// var_dump($dtpost);
	// die;
	$query_f1_kfaktor ="INSERT INTO f1_kfaktor (nama_kfaktor, inisial, atribut_kfaktor,nbf) VALUES ('$nama_kfaktor', '$inisial','$atribut_kfaktor','$nbf')";
	
	mysqli_query($db, $query_f1_kfaktor) or die ( $db -> error);

	return mysqli_affected_rows($db);
}

//--------------------PROSES EDIT FAKTOR
function edit_faktor($dtpost){
	global$db;

	$get_in = $dtpost["inisial"];
	$nama_kfaktor = $dtpost["nama_kfaktor"];
	$atribut_kfaktor = $dtpost["atribut_kfaktor"];
	$nbf = $dtpost["nbf"];

	// var_dump($dtpost);
	// die;
	$query_f1_kfaktor ="UPDATE f1_kfaktor SET nama_kfaktor='$nama_kfaktor', atribut_kfaktor='$atribut_kfaktor', nbf = '$nbf' WHERE inisial = '$get_in'";
	
	mysqli_query($db, $query_f1_kfaktor) or die ( $db -> error);

		return mysqli_affected_rows($db);
}

/*==============================================================================================*/
/*|										 EVALUASI / ALTERNATIF									*/
/*==============================================================================================*/ 
//--------------------PROSES TAMBAH EVALUASI FAKTOR
function tambah_ef($dtpost) {
	global $db;
	$jml_faktor = @$dtpost["jml_faktor"];
	$jml_dt = @$dtpost["jml_dt"];
	$nisn = @$dtpost["nisn"];
	$nama_siswa = @$dtpost["nama_siswa"];

	// echo $jml_dt;
	// var_dump($dtpost);
	// die;
	
	$sql_ef ="INSERT INTO f2_evaluasi (nisn, nama_siswa) VALUES ";
	for( $i=0; $i < $jml_dt; $i++ ){
		// BAGIAN ISI EVALUASI
		$sql_ef .= "('$nisn[$i]', '$nama_siswa[$i]')";
		$sql_ef .= ",";	
	}	
	// echo $sql_ef.'<br>'; 
	// die;

		// rtrim adalah menghilangkan charakter dari kanan
		$sql_ef = rtrim($sql_ef,",");
		// echo $sql_ef;
		// die;

		mysqli_query($db, $sql_ef) or die ( $db -> error);

	return mysqli_affected_rows($db);
}
//--------------------PROSES EDIT EVALUASI FAKTOR
function edit_ef($dtpost) {
	global $db;

	$id_hmfep = @$dtpost["id_hmfep"];
	$nisn = @$dtpost["nisn"];
	$nama_siswa = @$dtpost["nama_siswa"];
	
	// var_dump($dtpost);
	// die;

	$query_f2_evaluasi ="UPDATE f2_evaluasi SET nama_siswa = '$nama_siswa' WHERE nisn = '$nisn'";
	
	mysqli_query($db, $query_f2_evaluasi) or die ( $db -> error);

	return mysqli_affected_rows($db);

}
/*==============================================================================================*/
/*|											 PENILAIAN											*/
/*==============================================================================================*/ 

function tambah_penilaian($dtpost) {
	global $db;

	$nisn = @$dtpost["nisn"];
	$inisial = @$dtpost["inisial"];
	$nilai_rank = @$dtpost["nilai_rank"];
	// var_dump($dtpost);
	// die;

	// CEK APAKAH DATA YG DI INPUT SUDAH ADA ATAU BELUM
	$sql_cekdt = "
		SELECT f4_rank_saw.id_hsaw, f3_rank_mfep.id_hmfep, f4_rank_saw.nisn, f4_rank_saw.inisial, f3_rank_mfep.nisn, f3_rank_mfep.inisial, f2_evaluasi.nisn 
		FROM f4_rank_saw, f3_rank_mfep, f2_evaluasi
		WHERE f4_rank_saw.nisn = f2_evaluasi.nisn AND 
		f3_rank_mfep.nisn = f2_evaluasi.nisn AND
		f4_rank_saw.nisn = '$nisn' AND 
		f4_rank_saw.inisial = '$inisial' AND 
		f3_rank_mfep.nisn = '$nisn' AND 
		f3_rank_mfep.inisial = '$inisial'; 
	";
	
	$query = mysqli_query($db, $sql_cekdt) or die($db -> error);
	$cek_data = mysqli_num_rows($query);
	// echo $cek_data; die;

	// CEK APAKA DATA DI INPUT SUDAH ADA ATAU BELUM
	if ($cek_data >= 1) {
		?> 
		<script type="text/javascript">
			alert("Gagal, Data Sudah Ada");
			window.location.href="?hl=method&op=show&target=inp";
		</script>
		<?php
		return 0;
	} else {

		// PROSES METODE MFEP
		// ........................................................................................
		// MENGELUARKAN NILAI NBF BERDASARKAN NILAI INISIAL DIATAS.
		$sql_nbf = "SELECT nbf FROM f1_kfaktor WHERE inisial ='$inisial' ";
		$query = mysqli_query($db, $sql_nbf) or die($db -> error);
		$nbf = mysqli_fetch_array($query);

			$nbe = $nbf['nbf'] * $nilai_rank;
			// echo $nbe; die;

		// $sql_rank_mfep = "INSERT INTO f3_rank_mfep (id_hmfep, nisn, inisial, nilai_rank, nbe) VALUES ('','$nisn','$inisial','$nilai_rank','$nbe');";
		$sql_rank_mfep = "INSERT INTO f3_rank_mfep (nisn, inisial, nilai_rank, nbe) VALUES ('$nisn','$inisial','$nilai_rank','$nbe');";
		mysqli_query($db, $sql_rank_mfep) or die ( $db -> error);

		// PROSES METODE SAW
		// ........................................................................................
		// $sql_rank_saw = "INSERT INTO f4_rank_saw (id_hsaw, nisn, inisial, nilai_rank) VALUES ('','$nisn','$inisial','$nilai_rank')";
		$sql_rank_saw = "INSERT INTO f4_rank_saw (nisn, inisial, nilai_rank) VALUES ('$nisn','$inisial','$nilai_rank')";
			mysqli_query($db, $sql_rank_saw) or die ( $db -> error);
		// // ........................................................................................

		// $sql_cekjml_kriteria = "
		// 	SELECT f4_rank_saw.nisn, COUNT(f4_rank_saw.inisial) AS jml_kriteria FROM f4_rank_saw
		// 	WHERE f4_rank_saw.nisn = '$nisn';
		// ";
		// $query_cekjml_kriteria = mysqli_query($db, $sql_cekjml_kriteria) or die($db -> error);
		// $data_saw = mysqli_fetch_array($query_cekjml_kriteria);
		// // echo $jml_kriteria["jml_kriteria"]; die;
		
		// if ($data_saw["jml_kriteria"] == 5) {
			
		// 	// DISIKO MULAI PROSES NYO METODE SAW (PANJANG LAI ALUN JO MULAI METODE KO)
		// 	$sql_proses_saw = "
		// 		SELECT 
		// 			f4_rank_saw.id_hsaw, f4_rank_saw.nisn, f4_rank_saw.inisial, f4_rank_saw.nilai_rank,
		// 		    f2_evaluasi.nisn,
		// 		    f1_kfaktor.inisial, f1_kfaktor.atribut_kfaktor, f1_kfaktor.nbf
		// 		from 
		// 			f4_rank_saw, f2_evaluasi, f1_kfaktor
		// 		WHERE
		// 			f4_rank_saw.nisn = f2_evaluasi.nisn AND
		// 		    f4_rank_saw.inisial = f1_kfaktor.inisial AND
		// 		    f4_rank_saw.nisn = '$nisn';
		// 	";
		// 	$query_proses_saw = mysqli_query($db, $sql_proses_saw) or die($db -> error);
		// 	while ($dt_prosaw = mysqli_fetch_array($query_proses_saw)) {
		// 		$id_hsaw = $dt_prosaw["id_hsaw"];
		// 		if ($dt_prosaw["atribut_kfaktor"] == "C") {
		// 			// COST = nilai terendah
		// 			$sql_min = "SELECT MIN(nilai_rank) as nilai_min FROM f4_rank_saw WHERE nisn = '$nisn';";
		// 			$query_min = mysqli_query($db, $sql_min) or die ($db -> error);
		// 			$dt_min = mysqli_fetch_array($query_min);
					
		// 			$normalisasi = $dt_min["nilai_min"] / $dt_prosaw["nilai_rank"];
		// 			// echo 'normalisasi = '. $dt_min["nilai_min"] .' dibagi '. $dt_prosaw["nilai_rank"].'<br>';
		// 			// echo $normalisasi.'<br>';

		// 			$bbt_nor = $normalisasi * $dt_prosaw['nbf'];
		// 			// echo 'bobot normalisasi = '. $normalisasi .' dikali '.  $dt_prosaw['nbf'].'<br>';
		// 			// echo $bbt_nor.'<br>';
		// 			// die;
		// 			$update_normalisasi = "
		// 			UPDATE f4_rank_saw SET normalisasi = '$normalisasi', bbt_nor= '$bbt_nor' WHERE id_hsaw = $id_hsaw;
		// 			";
		// 			mysqli_query($db, $update_normalisasi) or die($db -> error);

		// 		} elseif ($dt_prosaw["atribut_kfaktor"] == "B"){
		// 			// BENEFIT = nilai tertinggi
		// 			$sql_max = "SELECT MAX(nilai_rank) as nilai_max FROM f4_rank_saw WHERE nisn = '$nisn';";
		// 			$query_max = mysqli_query($db, $sql_max) or die ($db -> error);
		// 			$dt_max = mysqli_fetch_array($query_max);

		// 			$normalisasi = $dt_prosaw["nilai_rank"] / $dt_max["nilai_max"] ;
		// 			$bbt_nor = $normalisasi * $dt_prosaw['nbf'];

		// 			$update_normalisasi = "
		// 			UPDATE f4_rank_saw SET normalisasi = '$normalisasi', bbt_nor= '$bbt_nor' WHERE id_hsaw = $id_hsaw;
		// 			";
		// 			mysqli_query($db, $update_normalisasi) or die($db -> error);
		// 		}
		// 	}
		// }
		
		return mysqli_affected_rows($db);
	}
}

function edit_penilaian($dtpost) {
	global $db;

	$id_rank = @$dtpost["id_rank"];
	$nbf = @$dtpost["nbf"];
	$atribut_kfaktor = @$dtpost["atribut_kfaktor"];
	$nisn = @$dtpost["nisn"];
	$inisial = @$dtpost["inisial"];
	$nilai_rank = @$dtpost["nilai_rank"];

	// PROSES MFEP
	$nbe = $nbf * $nilai_rank;

	$sql_rank_mfep = "
		UPDATE f3_rank_mfep SET nilai_rank='$nilai_rank', nbe = '$nbe' WHERE id_hmfep = '$id_rank' ;
	";
	mysqli_query($db, $sql_rank_mfep) or die ( $db -> error);

	// PROSES SAW
	if ($atribut_kfaktor == "C") {
		// COST = nilai terendah
		$sql_min = "SELECT MIN(nilai_rank) as nilai_min FROM f4_rank_saw WHERE nisn = '$nisn';";
		$query_min = mysqli_query($db, $sql_min) or die ($db -> error);
		$dt_min = mysqli_fetch_array($query_min);
		
		$normalisasi = $dt_min["nilai_min"] / $nilai_rank;
		$bbt_nor = $normalisasi * $nbf;

		$update_normalisasi = "
		UPDATE f4_rank_saw SET nilai_rank='$nilai_rank', normalisasi = '$normalisasi', bbt_nor = '$bbt_nor' WHERE id_hsaw = $id_rank;
		";
		mysqli_query($db, $update_normalisasi) or die($db -> error);

	} elseif ($atribut_kfaktor == "B"){
		// BENEFIT = nilai tertinggi
		$sql_max = "SELECT MAX(nilai_rank) as nilai_max FROM f4_rank_saw WHERE nisn = '$nisn';";
		$query_max = mysqli_query($db, $sql_max) or die ($db -> error);
		$dt_max = mysqli_fetch_array($query_max);

		$normalisasi = $nilai_rank / $dt_max["nilai_max"] ;
		$bbt_nor = $normalisasi * $nbf;

		$update_normalisasi = "
		UPDATE f4_rank_saw SET nilai_rank='$nilai_rank', normalisasi = '$normalisasi', bbt_nor = '$bbt_nor' WHERE id_hsaw = $id_rank;
		";
		mysqli_query($db, $update_normalisasi) or die($db -> error);
	}

	return mysqli_affected_rows($db);
}
?>