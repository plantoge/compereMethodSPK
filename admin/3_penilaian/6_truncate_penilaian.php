<?php
$sql_del = "TRUNCATE TABLE f3_rank_mfep;";
$result_fktr=mysqli_query($db, $sql_del) or die ($db -> error);
$sql_del = "TRUNCATE TABLE f4_rank_saw;";
$result_fktr=mysqli_query($db, $sql_del) or die ($db -> error);

if ($db -> error) {
	?>
	<script type="text/javascript">
		alert("Tidak Bisa Dihapus");
		window.location.href="?hl=method&op=show&target=data";
	</script>
	<?php
}
?> 
	<script type="text/javascript">
		window.location.href="?hl=method&op=show&target=data";
	</script>
<?php 
