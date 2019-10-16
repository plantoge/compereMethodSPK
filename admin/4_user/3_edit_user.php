<?php 
$get_id = $_GET["id"];
// echo $get_id;

$sql = "SELECT * FROM user WHERE id = '$get_id'";
$query = mysqli_query($db, $sql) or die($db -> error);
$hasil_sql = mysqli_fetch_array($query);

$data = tampilkan_looping($sql);
// var_dump($hasil_sql);
?>
<div class="hl_input bg_user col-75">
	<div class="judul txtcenter">
		<h3>Edit Data User</h3>
		<hr>
	</div>

	<form method="post">
		<table class="w100">
			<tr>
				<td>
					<input type="text" name="username" placeholder="Username" value="<?= $data[0]["username"]; ?>">
					<input type="hidden" name="get_id" placeholder="Username" value="<?= $get_id; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="password1" placeholder="Password Baru">
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="password2" placeholder="Ulangi Password">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="level" value="<?= $data[0]["level"]; ?>" readonly>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Save">
				</td>
			</tr>
		</table>
	</form>
	<?php 
		if ( isset($_POST["submit"]) ) {
			// echo "Lakukan proses";
			// var_dump($_POST);
			if ( edit_user($_POST) > 0  ) {
				?> 
				<script>
					alert("Berhasil");
					window.location.href="?hl=user&op=show";
				</script>
				<?php 
			} else {
				echo mysqli_error($db);
			}
		}
	?>
</div>