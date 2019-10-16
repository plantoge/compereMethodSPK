<?php
	$get_saw = $_GET["saw"];
	$get_mfep = $_GET["mfep"];

	$sql_del_saw = " DELETE FROM f4_rank_saw WHERE id_hsaw = '$get_saw'; ";
	$result_user=mysqli_query($db, $sql_del_saw) or die ($db -> error);

	$sql_del_mfep = " DELETE FROM f3_rank_mfep WHERE id_hmfep = '$get_mfep'; ";
	$result_user=mysqli_query($db, $sql_del_mfep) or die ($db -> error);

	

?>
<script type="text/javascript">
	window.location.href="?hl=method&op=show&target=data";
</script>