<?php
session_start();
// if (!isset($_SESSION["admin"])) {
// 	header("location: ../index.php");
// }
// if (!isset($_SESSION["guru"])) {
// 	header("location: ../index.php");
// }

require "../function/function.php";
require_once __DIR__ . '../../lib_report/vendor/autoload.php';


//-------------------------------------------------------------------------------------------------- 
//DIBAWAH MERUPAKAN PROSES UNTUK MENGELUARKAN SEMUA DATA SISWA DR DATABASE BERDASARKAN NO NISN SISWA
// $getnisn = $_GET["nisn"];
$sql = "SELECT * FROM f2_evaluasi;";
$data = tampilkan_looping($sql);

$sql = "SELECT inisial, nama_kfaktor, atribut_kfaktor, nbf FROM f1_kfaktor;";
$loop_f1_kfaktor = tampilkan_looping($sql);

$date = date('d-m-Y');

$mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8', 
        'format' => 'A4', 
        'orientation' => 'P'
]);
$html = '
<!DOCTYPE html>
<html>
<head>
	<title>Data Kriteria</title>
	<link rel="stylesheet" type="text/css" href="../style/5_style_report.css">
	<link rel="stylesheet" type="text/css" href="../style/responsif.css">
</head>
<body>
	<div class="header border">
		<table class="w100">
			<tr>
				<td class="w10 border">
					<img src="../gambar/twh.png" width="80" >
				</td>
				<td class="w80 border" style="display: block; text-align: center;">
					<h3>SMK NEGERI 6 PADANG</h3>
					<p>Jl. Suliki No. 1 Jati Padang</p>
				</td>
				<td class="w10 border">
					<img src="../gambar/twh.png" width="80" style="float: right;">
				</td>
			</tr>
		</table>
	</div>
	<hr>
	
	<div class="isi">
		<h4>Data Penilaian</h4>
		<h4>Dalam Menentukan Tindakan Guru Bimbingan konseling</h4>
		<table class="w100 tabel_penilaian" border="1">
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">Alternatif</th>
				<th colspan="5">Nilai Setiap Kriteria</th>
			</tr>
			<tr>';

				$nama_kfaktor = "SELECT inisial FROM f1_kfaktor";
				$kfaktor = tampilkan_looping($nama_kfaktor);
				foreach ($kfaktor as $dt_kfaktor) :
				
$html .='			<th>'.$dt_kfaktor["inisial"].'</th>';

				endforeach;

$html .='	</tr>';

			$no=1; 
			foreach ($data as $data) :
$html .='		<tr>
					<td>'.$no++.'</td>
					<td>'.$data["nama_siswa"].'</td>';
					
						$nisn = $data["nisn"];
						$sql_nilai = "SELECT nilai_rank FROM f3_rank_mfep WHERE nisn = '$nisn'";
						$loop_nilai = tampilkan_looping($sql_nilai);
						foreach ($loop_nilai as $data) :
$html .='
							<td>'. $data["nilai_rank"].'</td>';

						endforeach;

$html .='		</tr>';
			endforeach; 
$html .='
		</table>
		<table class="w100" style="margin-top: 20px;">
			<tr>
				<td class="left">
					<table style="text-align: left;">
						<tr>
							<td>Catatan :</td>
						</tr>';
							foreach ($loop_f1_kfaktor as $dt_faktor) {
 
$html .='						<tr>
									<td>'.$dt_faktor["inisial"].' = '.$dt_faktor["nama_kfaktor"].'</td>
								</tr>';
								
							}

$html .='					</table> 
				</td>
			</tr>
		</table>
	</div>

	<div class="footer" style="text-align: right;">
		<p>Padang, '.$date.'</p>
		<br><br><br>
		<p>Rifda Hayati, S.pd</p>
	</div>
</body>
</html>
';

$html2 = '';
$mpdf->WriteHTML($html);
$mpdf->Output('Data-kriteria.pdf', \Mpdf\Output\Destination::INLINE);