<?php
$get_in = $_GET["in"];

$sql_del = " DELETE FROM f1_kfaktor WHERE inisial = '$get_in'; ";

$result_user=mysqli_query($db, $sql_del) or die ($db -> error);
?>

<script type="text/javascript">
	window.location.href="?hl=fktr&op=show";
</script>