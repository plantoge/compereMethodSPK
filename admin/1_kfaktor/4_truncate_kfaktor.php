<?php
$sql_del = "DELETE FROM f1_kfaktor;";
$result_fktr=mysqli_query($db, $sql_del);

if ($db -> error) {
	?>
	<script type="text/javascript">
		alert("Tidak Bisa Dihapus");
		window.location.href="?hl=fktr&op=show";
	</script>
	<?php
}
?>
<script type="text/javascript">
	window.location.href="?hl=fktr&op=show";
</script>
<?php
