<div class="login col-33">
	<div class="header col-100">
			<div class="bg_kiri col-66">
				<p class="p1">System Login</p>
				<p class="p2">Masuk username dan password untuk login</p>
			</div>

			<div class="bg_kanan col-33">
				<i class="fa fa-id-badge" aria-hidden="true"></i>
			</div>
			<div class="clearboth"></div>
	</div>

	<div class="konten">
		<div class="form_login">
			<form method="post">
				<table class="w100">

					<tr>
						<td>
							<table class="w100">
								<tr>
									<td>
										<i class="fa fa-user" aria-hidden="true"></i>
									</td>
									<td class="tes">
										<input class="right" type="text" name="username" placeholder="Username" required>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<tr>
						<td>
							<table class="w100">
								<tr>
									<td>
										<i class="fa fa-lock" aria-hidden="true"></i>
									</td>
									<td>
										<input class="right" type="password" name="password" placeholder="Password" >
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table class="w100">
								<tr>
									<td></td>
									<td>
										<input class="right" type="submit" name="login" value="Login">
									</td>
								</tr>
							</table>
						</td>
					</tr>

				</table>
			</form>
		</div>
	</div>
	<div class="footer">
		<span>
			Fauzi © 2018
		</span>
	</div>
</div>

<?php 
if (isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];

	//sql cek username ada atau tidak di tabel user
	$sql = mysqli_query($db, "SELECT username, password, level FROM user WHERE username = '$username'") or die($db -> error);
	$hasilsql = mysqli_fetch_assoc($sql);
	$cekusername = mysqli_num_rows($sql);
	
	// var_dump($hasilsql);
	// die;

	// CEK NILAI DARI HASIL FUNCTION PASSWORD_VERIFY
	// $cek = password_verify($password, $hasilsql["password"]);
	// var_dump($cek);
	// die;

		//HASIL NILAI DARI FUNCTION PASSWORD_VERIFY ADALAH TRUE ATAU FALSE
		if ( password_verify($password, $hasilsql["password"]) ) {
				
			if ($hasilsql["level"] == "admin") {
				$_SESSION['admin'] = 'admin';
				$_SESSION['username'] = $hasilsql['username'];

			 	?><script>
			 		window.location.href="admin/?hl=fktr&op=show";
			 	</script><?php 

			}else if ($hasilsql["level"] == "guru") {
				$_SESSION['guru'] = 'guru';
				$_SESSION['username'] = $hasilsql['username'];

				?><script>
			 		window.location.href="guru/?hl=lprn&op=show";
			 	</script><?php 

			}
				
		} else {
			?>
				<script>
					alert("Maaf Username atau Password salah");
				</script>
			<?php 
		}

}
?>