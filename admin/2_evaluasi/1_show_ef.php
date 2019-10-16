<?php 
$sql2 = "SELECT nisn, nama_siswa FROM f2_evaluasi;";

$dt_evaluasi = tampilkan_looping($sql2);

?>
<div class="show">

	<h3>Data Evaluasi Siswa</h3>
	<h5 style="font-weight: normal; margin-top: -10px;">
		note : Data Evaluasi Faktor atau Alternatif
	</h5>

	<div class="button">
		<a href="?hl=ef&op=show&target=jmldt">
			<button>
				<i class="fa fa-plus" aria-hidden="true"></i>
			</button>
		</a>
	</div>
	<div class="alternatif">
		<?php 
			$target = @$_GET['target'];

			if ($target == "jmldt") {include "jml_dt.php";}
			elseif ($target == "edt") {include "3_edit_ef.php";}
		?>
	</div>
	
	<div class="form">
		<form method="post">
			<table class="w100 border" border="1" style="text-align: center;">
				<tr>
					<th colspan="3">Alternatif (Siswa)</th>
					<th rowspan="2" colspan="2">Opsi</th>
				</tr>
				<tr>
					<th>No.</th>
					<th>Nisn</th>
					<th>Nama Siswa</th>
				</tr>

				<?php $no=1; ?>
				<?php foreach ($dt_evaluasi as $data_ev) :?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $data_ev["nisn"]; ?></td>
					<td><?= $data_ev["nama_siswa"]; ?></td>
				
					<td style="border-right: 0px;">
						<a style="color: black;" href="?hl=ef&op=show&target=edt&nisn=<?= $data_ev["nisn"]; ?>">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>
					</td>
					<td>
						<a style="color: black;" href="?hl=ef&op=delete&nisn=<?= $data_ev["nisn"]; ?>" onclick="return confirm('Yakin Delete Data ? ')">
							<i class="fa fa-trash-o" aria-hidden="true"></i>
						</a>
					</td>
				</tr>
				<?php endforeach;?>
			</table>
		</form>
	</div>
	<div class="menu_print">
		<ul>
			<li>
				<a href="?hl=ef&op=trunc" onclick="return confirm('Yakin Kosongkan Data ? ')">
					<i class="fa fa-times" aria-hidden="true"></i> 
					<label style="font-size: 14px; cursor: pointer;"><b>Hancurkan</b></label>
				</a>
			</li>
			<li>
				<a href="../report/report_evaluasi.php" target="blank_">
					<i class="fa fa-print" aria-hidden="true"></i> 
					<label style="font-size: 14px; cursor: pointer;"><b>Cetak</b></label>
				</a>
			</li>
		</ul>
	</div>
	
	
</div>