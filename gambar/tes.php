<?php 
// $db = mysqli_connect("localhost","root","","db_baraja");

$nisn = "140751";
$sql = mysqli_query($db, "SELECT nisn, nama, kelas, jurusan FROM siswa WHERE nisn = $nisn") or die($db -> error);
$result = mysqli_fetch_assoc($sql);

if ($result["nisn"] === $nisn) {

	if ($result["nik_ayah"] === $nisn) {
		
		if ($result["id_kesehatan"] === $nisn) {
			
			if ($result["id_pendidikan"] === $nisn) {
				
				if ($result{"id_organisasi"} === $nisn) {
					
					// perintah selanjutnya jika form organisasi ada
				
				} else {include "file input id organisasi";}

			} else {include "file input id pendidikan";}

		} else {include "file input id kesehatan";}

	} else {include "file input ayah"};

} else {include "file input siswa";}

?>

