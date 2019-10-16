<?php
	$get_nisn = $_GET["nisn"];
	$sql_del_mfep = " DELETE FROM f3_rank_mfep WHERE nisn = '$get_nisn'; ";
	$result_user=mysqli_query($db, $sql_del_mfep) or die ($db -> error);

	$sql_del_ef = " DELETE FROM f2_evaluasi WHERE nisn = '$get_nisn'; ";
	$result_user=mysqli_query($db, $sql_del_ef) or die ($db -> error);	

?>
<script type="text/javascript">
	window.location.href="?hl=ef&op=show";
</script>