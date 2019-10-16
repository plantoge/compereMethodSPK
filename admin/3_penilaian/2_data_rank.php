<?php 
	$sql_data_rank = "
		SELECT 
			f1_kfaktor.inisial, f1_kfaktor.nama_kfaktor,
		    f2_evaluasi.nisn, f2_evaluasi.nama_siswa,
		    f3_rank_mfep.id_hmfep, f3_rank_mfep.nisn, f3_rank_mfep.inisial, 
		    f4_rank_saw.id_hsaw, f4_rank_saw.nisn, f4_rank_saw.inisial, f4_rank_saw.nilai_rank
		FROM 
			f1_kfaktor, f2_evaluasi, f3_rank_mfep, f4_rank_saw
		WHERE 
			f3_rank_mfep.inisial = f1_kfaktor.inisial AND
		    f3_rank_mfep.nisn = f2_evaluasi.nisn AND
		    f4_rank_saw.inisial = f1_kfaktor.inisial AND
		    f4_rank_saw.nisn = f2_evaluasi.nisn
		    ORDER BY f2_evaluasi.nisn, f1_kfaktor.inisial ASC;
	";
	$dt_rank_saw = tampilkan_looping($sql_data_rank);
?>
<div class="data_rank">
	<table class="w100 border" border="1" style="border : 1px solid black; text-align: center;">
		<tr>
			<th>No.</th>
			<th>Alternatif Siswa</th>
			<th>Kriteria / Faktor</th>
			<th>Nilai Rank</th>
			<th colspan="2">Opsi</th>
		</tr>
		<?php  $no=1; ?>
		<?php foreach ($dt_rank_saw as $dt_mfepsaw) : ?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $dt_mfepsaw["nama_siswa"]; ?></td>
			<td><?= $dt_mfepsaw["nama_kfaktor"]; ?></td>
			<td><?= $dt_mfepsaw["nilai_rank"]; ?></td>
			<td style="border-right: 0px;">
				<a style="color: black;" href="?hl=method&op=show&target=edt&nisn=<?= $dt_mfepsaw["nisn"]; ?>&saw=<?= $dt_mfepsaw["id_hsaw"]; ?>&inisial=<?= $dt_mfepsaw["inisial"]; ?>">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
				</a>
			</td>
			<td>
				<a style="color: black;" href="?hl=method&op=show&target=del&saw=<?= $dt_mfepsaw["id_hsaw"]; ?>&mfep=<?= $dt_mfepsaw["id_hmfep"]; ?>" onclick="return confirm('Yakin Delete Data ? ')">
					<i class="fa fa-trash-o" aria-hidden="true"></i>
				</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<!-- <div class="menu_print">
	<ul>
		<li>
			<a href="?hl=method&op=trunc" onclick="return confirm('Yakin Kosongkan Data ? ')">
				<i class="fa fa-times" aria-hidden="true"></i> 
				<label style="font-size: 14px; cursor: pointer;"><b>Hancurkan</b></label>
			</a>
		</li>
		<li>
			<a href="#" target="blank_">
				<i class="fa fa-print" aria-hidden="true"></i> 
				<label style="font-size: 14px; cursor: pointer;"><b>Cetak</b></label>
			</a>
		</li>
	</ul>
</div> -->