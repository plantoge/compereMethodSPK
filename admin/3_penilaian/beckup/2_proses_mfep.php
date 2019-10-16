<div class="proses_mfep">
	<span>
		<h3>Penilaian Menggunakan Metode MFEP</h3>
	</span>
	<table class="w100" border="1" style="border-collapse: collapse; border : 1px solid grey;">
		<?php 
			$no = 1;
			$noo = 1;
			$sql = "SELECT * FROM f2_evaluasi;";
			$hasilsql = mysqli_query($db, $sql) or die($db -> error);
			while ( $data = mysqli_fetch_array($hasilsql)) {
				$nb_f1 = $data["nb_f1"];
				$nb_f2 = $data["nb_f2"];
				$nb_f3 = $data["nb_f3"];
				$nb_f4 = $data["nb_f4"];
				$nb_f5 = $data["nb_f5"];
				$ne_f1 = $data["ne_f1"];
				$ne_f2 = $data["ne_f2"];
				$ne_f3 = $data["ne_f3"];
				$ne_f4 = $data["ne_f4"];
				$ne_f5 = $data["ne_f5"];
				$nbe_f1 = 0;
				$nbe_f2 = 0;
				$nbe_f3 = 0;
				$nbe_f4 = 0;
				$nbe_f5 = 0;
				$tne = 0;

				$nbe_f1 = $nb_f1 * $ne_f1;
				$nbe_f2 = $nb_f2 * $ne_f2;
				$nbe_f3 = $nb_f3 * $ne_f3;
				$nbe_f4 = $nb_f4 * $ne_f4;
				$nbe_f5 = $nb_f5 * $ne_f5;

				// TOTAL NBF
				$tnbf = $nb_f1 + $nb_f2 + $nb_f3 + $nb_f4 + $nb_f5;

				// TOTAL AKHIR
				$tne = $nbe_f1 + $nbe_f2 + $nbe_f3 + $nbe_f4 + $nbe_f5;
				// echo $tne;

				$sql2 = "SELECT nama_faktor FROM f1_faktor;";
				$query = mysqli_query($db, $sql2) or die($db -> error);

		?>
				<tr>
					<td colspan="6" style="text-align: center; padding: 3vh;"><b>Tabel ke - <?= $no++; ?> Untuk Siswa <?= $data["nama_siswa"]; ?></b></td>
				</tr>
				<tr>
					<th class="w60">Nama Faktor</th>
					<th class="w10">NBF</th>
					<th class="w10"></th>
					<th class="w10">NEF</th>
					<th class="w10">NBE</th>
				</tr>
				<tr>
					<td>
						<table class="w100" border="1"  style="border : 1px solid grey;">
								<?php while($dt_faktor = mysqli_fetch_array($query)) { ?>
							<tr>
								<td><?= $dt_faktor["nama_faktor"]; ?></td>
							</tr>
								<?php } ?>
						</table>
					</td>
					<td>
						<table class="w100 txtcenter" border="1" style="border : 1px solid grey;">
							<tr><td><?= $nb_f1; ?></td></tr>
							<tr><td><?= $nb_f2; ?></td></tr>
							<tr><td><?= $nb_f3; ?></td></tr>
							<tr><td><?= $nb_f4; ?></td></tr>
							<tr><td><?= $nb_f5; ?></td></tr>
						</table>
					</td>
					<td>
						<table class="w100 txtcenter" border="1"  style="border : 1px solid grey;">
							<?php for($i=1; $i <= 5; $i++) { ?>
							<tr>
								<td>x</td>
							</tr>
							<?php } ?>
						</table>
					</td>
					<td>
						<table class="w100 txtcenter" border="1"  style="border : 1px solid grey;">
							<tr><td><?= $ne_f1; ?></td></tr>
							<tr><td><?= $ne_f2; ?></td></tr>
							<tr><td><?= $ne_f3; ?></td></tr>
							<tr><td><?= $ne_f4; ?></td></tr>
							<tr><td><?= $ne_f5; ?></td></tr>
						</table>
					</td>
					<td>
						<table class="w100 txtcenter" border="1"  style="border : 1px solid grey;">
							<tr><td><?= $nbe_f1; ?></td></tr>
							<tr><td><?= $nbe_f2; ?></td></tr>
							<tr><td><?= $nbe_f3; ?></td></tr>
							<tr><td><?= $nbe_f4; ?></td></tr>
							<tr><td><?= $nbe_f5; ?></td></tr>
						</table>
					</td>
				</tr>
				<tr>
					<td><b>Total Seluruh</b></td>
					<td class="txtcenter"><b><?= $tnbf;  ?></b></td>
					<td></td>
					<td></td>
					<td class="txtcenter h_point"><b><?= $tne; ?></b></td>
				</tr>
		<?php
			}
		?>
	</table>
</div>