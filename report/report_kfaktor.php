<?php
session_start();
if (!isset($_SESSION["admin"])) {
	header("location: ../index.php");
}

require "../function/function.php";
require_once __DIR__ . '../../lib_report/vendor/autoload.php';


//-------------------------------------------------------------------------------------------------- 
//DIBAWAH MERUPAKAN PROSES UNTUK MENGELUARKAN SEMUA DATA SISWA DR DATABASE BERDASARKAN NO NISN SISWA
// $getnisn = $_GET["nisn"];
$sql = "
	SELECT * FROM f1_kfaktor;
";

$data = tampilkan_looping($sql);
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
		<h4>Data Kriteria - Kriteria</h4>
		<h4>Dalam Menentukan Tindakan Guru Bimbingan konseling</h4>
		<table class="w100 tabel_kfaktor" border="1">
			<tr>
				<th>No</th>
				<th>Inisial</th>
				<th>Nama Kriteria / Faktor</th>
				<th>Atribut</th>
				<th>Bobot</th>
			</tr>';
			$no = 1;
			foreach ($data as $dt) :
$html .='
			<tr>
				<td>'.$no++.'</td>
				<td>'.$dt["inisial"].'</td>
				<td>'.$dt["nama_kfaktor"].'</td>
				<td>'.$dt["atribut_kfaktor"].'</td>
				<td>'.$dt["nbf"].'</td>
			</tr>
';
			endforeach;

$html .='	
		</table>
		<h5>Keterangan :</h5>
		<table>
			<tr>
				<td>B</td>
				<td> =</td>
				<td> BENEFIT, Atribut yang diinginkan yaitu nilai tertinggi (Keuntungan)</td>
			</tr>
			<tr>
				<td>C</td>
				<td> =</td>
				<td> COST, Atribut yang diinginkan yaitu nilai terendah (Biaya)</td>
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