<?php 
	$get_nisn = @$_GET["nisn"];
	$get_id = @$_GET["saw"];
	$get_inisial = @$_GET["inisial"];
	
	// SQL UNTUK CEK APAKAH JUMLAH DATA RANK SAW/MFEP SUDAH 5 DATA ATAU BELUM
	$sql_cekjml_kriteria = "
		SELECT f4_rank_saw.nisn, COUNT(f4_rank_saw.inisial) AS jml_kriteria FROM f4_rank_saw
		WHERE f4_rank_saw.nisn = '$get_nisn';
	";
	$query_cekjml_kriteria = mysqli_query($db, $sql_cekjml_kriteria) or die($db -> error);
	$data_saw = mysqli_fetch_array($query_cekjml_kriteria);
	// echo $jml_kriteria["jml_kriteria"]; die;
	
	if ($data_saw["jml_kriteria"] == 5) {


		// SQL UNTUK MENAMPILKAN DATA DI TOMBOL <SELECT></SELECT>
		$sql_edit = "
			SELECT 
				f1_kfaktor.inisial, f1_kfaktor.nama_kfaktor, f1_kfaktor.atribut_kfaktor, f1_kfaktor.nbf, 
				f2_evaluasi.nisn, f2_evaluasi.nama_siswa,
				f3_rank_mfep.id_hmfep, f3_rank_mfep.nisn, f3_rank_mfep.inisial, f3_rank_mfep.nilai_rank,
				f4_rank_saw.id_hsaw, f4_rank_saw.nisn, f4_rank_saw.inisial, f4_rank_saw.nilai_rank
			FROM 
				f1_kfaktor, f2_evaluasi, f3_rank_mfep, f4_rank_saw
			WHERE 
				f4_rank_saw.nisn = f2_evaluasi.nisn AND
				f4_rank_saw.inisial = f1_kfaktor.inisial AND
				f3_rank_mfep.nisn = f2_evaluasi.nisn AND
				f3_rank_mfep.inisial = f1_kfaktor.inisial AND

				f4_rank_saw.id_hsaw = '$get_id' AND
				f3_rank_mfep.id_hmfep = '$get_id' AND
				f4_rank_saw.inisial = '$get_inisial' AND
				f3_rank_mfep.inisial = '$get_inisial'
		";	
		$sql_info = "SELECT nama_kfaktor, nbf FROM f1_kfaktor";
		
		$query_info = tampilkan_looping($sql_info);
		$dt_edit = tampilkan_nonlooping($sql_edit);
		// var_dump($dt_edit);
		// die;
?>
		<div class="info_rank col-25 border">
			<p>Informasi Bobot Kriteria</p>
			<hr>
			<table class="w100">
				<?php foreach ($query_info as $info) : ?>
				<tr>
					<td class="border_kanan"><?= $info["nama_kfaktor"]; ?></td>
					<td><?= $info["nbf"]; ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
			<hr>
		</div>
		<div class="input_rank col-41">
			<h3>Tambah Penilaian</h3>
			<h5 style="font-weight: normal; margin-top: -10px;">
				note : -	
			</h5>
			<form method="POST">
				<table class="w100">
					<tr>
						<td>Alternatif Siswa</td>
					</tr>
						<tr>
							<td>
								<select name="nisn" readonly>
									<option value="<?= $dt_edit['nisn']; ?>"><?= $dt_edit["nama_siswa"]; ?></option>
								</select>
							</td>
						</tr>

					<tr>
						<td>Kriteria</td>
					</tr>
						<tr>
							<td>
								<select name="inisial">
									<option value="<?= $dt_edit['inisial']; ?>"><?= $dt_edit["nama_kfaktor"]; ?></option>
								</select>
							</td>
						</tr>

					<tr>
						<td>Penilaian</td>
					</tr>
						<tr>
							<td>
								<input type="text" name="nilai_rank" placeholder="Bobot Nilai = <?= $dt_edit['nilai_rank']; ?>">
								<input type="hidden" name="id_rank" value="<?= $get_id; ?>">
								<input type="hidden" name="nbf" value="<?= $dt_edit['nbf']; ?>">
								<input type="hidden" name="atribut_kfaktor" value="<?= $dt_edit['atribut_kfaktor']; ?>">
							</td>
						</tr>
					<tr>
						<td style="float: right;">
							<table>
								<tr>
									<td>
										<input type="submit" name="kembali_rank" value="Kembali">
									</td>
									<td>
										<input type="submit" name="simpan_rank" value="Simpan">
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</form>
		<?php 
			if ( isset($_POST["simpan_rank"]) ) {
				if ( edit_penilaian($_POST) > 0  ) {
					?> 
					<script>
						alert("Berhasil ditambahkan");
						// window.location.href="?hl=method&op=show&target=inp";
					</script>
					<?php 
				} else {
					echo mysqli_error($db);
				}
			}
		?>
		</div>

<?php 
	} else {
		echo "DATA BELUM BISA DI EDIT";
	}
?>
<!-- 
	select * from f1_kfaktor WHERE inisial NOT IN (select inisial from f3_rank_mfep);
 -->