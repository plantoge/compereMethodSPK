<?php
session_start();
if (!isset($_SESSION["guru"])) {
	header("location: ../index.php");
}

require "../../function/function.php";
require_once __DIR__ . '../../../lib_report/vendor/autoload.php';


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
	<title>Hasil Keputusan</title>
	<link rel="stylesheet" type="text/css" href="../../style/5_style_report.css">
	<link rel="stylesheet" type="text/css" href="../../style/responsif.css">
</head>
<body>
	<div class="header border">
		<table class="w100">
			<tr>
				<td class="w10 border">
					<img src="../../gambar/twh.png" width="80" >
				</td>
				<td class="w80 border" style="display: block; text-align: center;">
					<h3>SMK NEGERI 6 PADANG</h3>
					<p>Jl. Suliki No. 1 Jati Padang</p>
				</td>
				<td class="w10 border">
					<img src="../../gambar/twh.png" width="80" style="float: right;">
				</td>
			</tr>
		</table>
	</div>
	<hr>
	
	<div class="isi">
		<h4>Hasil Penilaian</h4>
		<h4>Dalam Menentukan Tindakan Guru Bimbingan konseling</h4>
		<table class="w100 border tabel_saw" style="text-align: center;">
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Alternatif Siswa</th>
			<th colspan="5">Bobot Pernormalisasi = Nilai Rank x normalisasi</th>
			<th rowspan="2">Hasil</th>
			<th rowspan="2">Saran</th>
		</tr>
		<tr>';
			
			$nama_kfaktor = "SELECT nama_kfaktor FROM f1_kfaktor";
			$kfaktor = tampilkan_looping($nama_kfaktor);
			foreach ($kfaktor as $dt_kfaktor) :

$html .='		<th>'.$dt_kfaktor["nama_kfaktor"].'</th>';
 
			endforeach;
$html .='
		</tr>';
		
		$no = 1;
		$query_alt = mysqli_query($db, "SELECT * FROM f2_evaluasi ORDER BY hasil_saw DESC") or die($db -> error);
		while ($data = mysqli_fetch_array($query_alt)) {
			$nisn = $data["nisn"];
$html .='
		<tr>
			<td>'.$no++.'</td>
			<td>'.$data["nama_siswa"].'</td>';


				$sql_mfep = "
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
				$query = mysqli_query($db, $sql_mfep) or die($db -> error);
				while ( $data = mysqli_fetch_array($query)) {

$html .='			<td>'.$data["bbt_nor"].'</td>';
			
				}

			$query_sum = mysqli_query($db, "SELECT SUM(bbt_nor) as vn FROM f4_rank_saw WHERE nisn = '$nisn'") or die($db -> error);
			$dt_sum = mysqli_fetch_array($query_sum);
			// FUNGSI NUMBER_FORMAT ADALAH MEMUNCULKAN 2 ANGKA DIBELAKANG KOMA ATAU SESUAI KEINGINAN KITA

			// PROSES MENCARI HASIL DISARANKAN
			if ($dt_sum["vn"] >=0.5) {$saran = "Di Panggil Orang Tua Dan Membuat Surat Perjanjian";}
			elseif($dt_sum["vn"] > 0.4 ){$saran = "Di Panggil Orang Tua Dan Diberi Nasehat";}
			elseif($dt_sum["vn"] > 0.3 ){$saran = "Diberi Nasehat Oleh Guru BK Dan Membuat Surat Perjanjian";}
			elseif($dt_sum["vn"] > 0.2 ){$saran = "Diberi Nasehat Oleh guru BK dan diberi hukuman";}
			elseif($dt_sum["vn"] < 0.2 ){$saran = "Saran 1";}
$html .='
			<td class="tne">'.number_format($dt_sum["vn"], 2).'</td>
			<td>'.$saran.'</td>
		</tr>';

		}

$html .='
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