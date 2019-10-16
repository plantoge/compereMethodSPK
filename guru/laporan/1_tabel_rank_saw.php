<h3>Penilaian Berdasarkan Metode SAW</h3>
	<h5 style="font-weight: normal; margin-top: -10px;">
		note : -	
	</h5>
	<table class="w100 border" border="1" style="text-align: center;">
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Alternatif Siswa</th>
			<th colspan="5">Bobot Pernormalisasi = Nilai Rank x normalisasi</th>
			<th rowspan="2">Hasil</th>
			<th rowspan="2">Disarankan</th>
		</tr>
		<tr>
			<?php 
			$nama_kfaktor = "SELECT nama_kfaktor FROM f1_kfaktor";
			$kfaktor = tampilkan_looping($nama_kfaktor);
			foreach ($kfaktor as $dt_kfaktor) :
			?>
			<th><?= $dt_kfaktor["nama_kfaktor"]; ?></th>
			<?php 
			endforeach;
			?>
		</tr>
		<?php 
		$no = 1;
		$query_alt = mysqli_query($db, "SELECT * FROM f2_evaluasi ORDER BY hasil_saw DESC") or die($db -> error);
		while ($data = mysqli_fetch_array($query_alt)) {
			$nisn = $data["nisn"];
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $data["nama_siswa"]; ?></td>

			<?php 
				$sql_saw = " 
					SELECT 
						f4_rank_saw.id_hsaw, f4_rank_saw.nisn, f4_rank_saw.inisial, f4_rank_saw.nilai_rank, f4_rank_saw.bbt_nor,
						f2_evaluasi.nisn, f2_evaluasi.nama_siswa, 
						f1_kfaktor.inisial, f1_kfaktor.atribut_kfaktor, f1_kfaktor.nbf
					FROM f4_rank_saw, f2_evaluasi, f1_kfaktor
					WHERE 
						f4_rank_saw.nisn = f2_evaluasi.nisn AND
						f4_rank_saw.inisial = f1_kfaktor.inisial AND
						f4_rank_saw.nisn = '$nisn';
				";
				$query = mysqli_query($db, $sql_saw) or die($db -> error);
				while ( $data = mysqli_fetch_array($query)) {
						$id_hsaw = $data["id_hsaw"];
						$inisial = $data["inisial"];

						if ($data["atribut_kfaktor"] == "C") {
							// COST = nilai terendah
							$sql_min = "
								SELECT MIN(nilai_rank) as nilai_min
								FROM f4_rank_saw, f1_kfaktor
								WHERE
									f4_rank_saw.inisial = f1_kfaktor.inisial AND
								    f4_rank_saw.inisial = '$inisial'
							";
							$query_min = mysqli_query($db, $sql_min) or die ($db -> error);
							$dt_min = mysqli_fetch_array($query_min);
							
							$normalisasi = $dt_min["nilai_min"] / $data["nilai_rank"];
							$normalisasi = number_format($normalisasi, 2);
							$bbt_nor = $normalisasi * $data['nbf'];
							$bbt_nor = number_format($bbt_nor, 2);
							
							$update_normalisasi = "
							UPDATE f4_rank_saw SET normalisasi = '$normalisasi', bbt_nor= '$bbt_nor' WHERE id_hsaw = $id_hsaw;
							";
							mysqli_query($db, $update_normalisasi) or die($db -> error);

						} elseif ($data["atribut_kfaktor"] == "B"){
							// BENEFIT = nilai tertinggi
							$sql_max = "
								SELECT MAX(nilai_rank) as nilai_max
								FROM f4_rank_saw, f1_kfaktor
								WHERE
									f4_rank_saw.inisial = f1_kfaktor.inisial AND
								    f4_rank_saw.inisial = '$inisial'
							";
							$query_max = mysqli_query($db, $sql_max) or die ($db -> error);
							$dt_max = mysqli_fetch_array($query_max);

							$normalisasi = $data["nilai_rank"] / $dt_max["nilai_max"] ;
							$normalisasi = number_format($normalisasi, 2);
							$bbt_nor = $normalisasi * $data['nbf'];
							$bbt_nor = number_format($bbt_nor, 2);

							$update_normalisasi = "
							UPDATE f4_rank_saw SET normalisasi = '$normalisasi', bbt_nor= '$bbt_nor' WHERE id_hsaw = $id_hsaw;
							";
							mysqli_query($db, $update_normalisasi) or die($db -> error);
						}

			?>
					<td><?= $data["bbt_nor"]; ?></td>
			<?php 
				}

			// PROSES MENCARI HASIL AKHIR DARI TIAP SISWA
			$query_sum = mysqli_query($db, "SELECT SUM(bbt_nor) as vn FROM f4_rank_saw WHERE nisn = '$nisn'") or die($db -> error);
			$dt_sum = mysqli_fetch_array($query_sum);
			// FUNGSI NUMBER_FORMAT ADALAH MEMUNCULKAN 2 ANGKA DIBELAKANG KOMA ATAU SESUAI KEINGINAN KITA

			// PROSES MENCARI HASIL DISARANKAN
			if ($dt_sum["vn"] >=0.5) {$saran = "Di Panggil Orang Tua Dan Membuat Surat Perjanjian";}
			elseif($dt_sum["vn"] > 0.4 ){$saran = "Di Panggil Orang Tua Dan Diberi Nasehat";}
			elseif($dt_sum["vn"] > 0.3 ){$saran = "Diberi Nasehat Oleh Guru BK Dan Membuat Surat Perjanjian";}
			elseif($dt_sum["vn"] > 0.2 ){$saran = "Diberi Nasehat Oleh guru BK dan diberi hukuman";}
			elseif($dt_sum["vn"] < 0.2 ){$saran = "Saran 1";}


			?>
			<td class="tne"><?= number_format($dt_sum["vn"], 2); ?></td>
			<td><?= $saran; ?></td>
		</tr>
		<?php 

			// UPDATE HASIL METODE KE TABEL f2_EVALUASI
			$vn = number_format($dt_sum["vn"], 2);
			mysqli_query($db, "UPDATE f2_evaluasi SET hasil_saw = '$vn' WHERE nisn = '$nisn'") or die($db -> error);

		}
		?>
	</table>
	<div class="menu_print">
		<ul>
			<li>
				<a href="laporan/2_report_saw.php" target="blank_">
					<i class="fa fa-print" aria-hidden="true"></i> 
					<label style="font-size: 14px; cursor: pointer;"><b>Cetak</b></label>
				</a>
			</li>
		</ul>
	</div>