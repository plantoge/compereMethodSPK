<div class="hl_input bg_user col-75">
	<div class="judul txtcenter">
		<h3>Create Data User</h3>
		<hr>
	</div>
	<form method="post">
		<table class="w100">
			<tr>
				<td>
					<input type="text" name="username" placeholder="Username">
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="password1" placeholder="Password">
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="password2" placeholder="Ulangi Password">
				</td>
			</tr>
			<tr>
				<td>
					<select name="level">
						<option value="guru">Guru</option>
						<option value="admin">Admin</option>
					</select>
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
			if ( tambah_user($_POST) > 0  ) {
				?> 
				<script>
					alert("Berhasil ditambahkan");
					window.location.href="?hl=user&op=show";
				</script>
				<?php 
			} else {
				echo mysqli_error($db);
			}
		}
	?>
</div>