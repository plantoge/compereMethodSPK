	<h3>Penilaian Berdasarkan Metode MFEP</h3>
	<h5 style="font-weight: normal; margin-top: -10px;">
		note : -	
	</h5>
	<table class="w100 border" border="1" style="text-align: center;">
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Alternatif Siswa</th>
			<th colspan="5">NBE = NBF x NEF</th>
			<th rowspan="2">Hasil</th>
			<th rowspan="2">Disarankan</th>
			<!-- <th rowspan="2">Ket</th> -->
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
		$query_alt = mysqli_query($db, "SELECT * FROM f2_evaluasi ORDER BY hasil_mfep DESC") or die($db -> error);
		while ($data = mysqli_fetch_array($query_alt)) {
			$nisn = $data["nisn"];
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $data["nama_siswa"]; ?></td>

			<?php 
				$sql_mfep = "
					SELECT 
						f3_rank_mfep.id_hmfep, f3_rank_mfep.nisn, f3_rank_mfep.inisial, f3_rank_mfep.nilai_rank, f3_rank_mfep.nbe,
						f2_evaluasi.nisn, f2_evaluasi.nama_siswa, 
						f1_kfaktor.inisial, f1_kfaktor.atribut_kfaktor, f1_kfaktor.nbf
					FROM f3_rank_mfep, f2_evaluasi, f1_kfaktor
					WHERE 
						f3_rank_mfep.nisn = f2_evaluasi.nisn AND
						f3_rank_mfep.inisial = f1_kfaktor.inisial AND
						f3_rank_mfep.nisn = '$nisn';
				";
				$query = mysqli_query($db, $sql_mfep) or die($db -> error);
				while ( $data = mysqli_fetch_array($query)) {
			?>
					<td><?= $data["nbe"]; ?></td>
			<?php 
				}

			$query_sum = mysqli_query($db, "SELECT SUM(nbe) as tne FROM f3_rank_mfep WHERE nisn = '$nisn'") or die($db -> error);
			$dt_sum = mysqli_fetch_array($query_sum);
			// FUNGSI NUMBER_FORMAT ADALAH MEMUNCULKAN 2 ANGKA DIBELAKANG KOMA ATAU SESUAI KEINGINAN KITA

			// PROSES MENCARI HASIL DISARANKAN
			if ($dt_sum["tne"] > 6) {
				$saran = "Di Panggil Orang Tua Dan Membuat Surat Perjanjian";
			}
			elseif($dt_sum["tne"] >= 5 && $dt_sum["tne"] <= 6){
				$saran = "Di Panggil Orang Tua Dan Diberi Nasehat ke siswa";
			}
			elseif($dt_sum["tne"] >= 4 && $dt_sum["tne"] <= 5){
				$saran = "Diberi Nasehat Oleh Guru BK Dan Membuat Surat Perjanjian";
			}
			elseif($dt_sum["tne"] >= 3 && $dt_sum["tne"] <= 4){
				$saran = "Masuk ke ruang konseling untuk mencari tahu masalah siswa";
			}

			?>
			<td class="tne"><?= number_format($dt_sum["tne"], 2); ?></td>
			<td><?= $saran; ?></td>
		</tr>
		<?php 
		
			// UPDATE HASIL METODE KE TABEL f2_EVALUASI
			$tne = number_format($dt_sum["tne"], 2);
			mysqli_query($db, "UPDATE f2_evaluasi SET hasil_mfep = '$tne' WHERE nisn = '$nisn'") or die($db -> error);

		}
		?>
	</table>
	<div class="menu_print">
		<ul>
			<li>
				<a href="../report/report_mfep.php" target="blank_">
					<i class="fa fa-print" aria-hidden="true"></i> 
					<label style="font-size: 14px; cursor: pointer;"><b>Cetak</b></label>
				</a>
			</li>
		</ul>
	</div>