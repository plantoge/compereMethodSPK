<?php
$get_id = $_GET["id"];

$sql_del = " DELETE FROM user WHERE id = '$get_id'; ";

$result_user=mysqli_query($db, $sql_del) or die ($db -> error);
?>

<script type="text/javascript">
	window.location.href="?hl=user&op=show";
</script>