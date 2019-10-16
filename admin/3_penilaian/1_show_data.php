<div class="show">

	<h3>Data Penilaian</h3>
	<h5 style="font-weight: normal; margin-top: -10px;">
		note : Data Evaluasi Faktor atau Alternatif
	</h5>
	<div class="penilaian_menu">
		<ul>
			<li><a href="?hl=method&op=show&target=data"><b>Tampilkan Data</b></a></li>
			<li><a href="?hl=method&op=show&target=inp"><b>Tambah Data</b></a></li>
			<li><a href="?hl=method&op=show&target=rank"><b>Ranking</b></a></li>
		</ul>
	</div>
	<div class="penilaian_main">
		<?php 
			$target = @$_GET["target"];
			if ($target == "data") { include "2_data_rank.php";}
			elseif ($target == "inp") {	include "3_input_rank.php";} 
			elseif ($target == "edt") { include "4_edit_rank.php";}
			elseif ($target == "rank") { include "5_tabel_rank.php";}
			elseif ($target == "del") { include "6_del_rank.php";}
		?>
	</div>

</div>