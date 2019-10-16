<?php 
	session_start();
	include "function/function.php";

	if (isset($_SESSION["admin"])) {
		header("location: admin/");
		exit;
	}

	if (isset($_SESSION["guru"])) {
		header("location: guru/");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SMKN 6</title>
	<link rel="stylesheet" type="text/css" href="style/responsif.css">
	<link rel="stylesheet" type="text/css" href="style/1_style_utama.css">
	<link rel="stylesheet" type="text/css" href="icon/css/font-awesome.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="demo_icon.gif" type="image/gif" sizes="16x16">
</head>
<body>

	<?php 
		include "login.php";
	?>

	<!-- <div class="menu_utama col-33">
		<table class="w100">
			<tr>
				<td class="w33 border">
					<a href="#">Menu 1</a>
				</td>
				<td class="w33 border">
					<a href="#">Login</a>
				</td>
				<td class="w33 border">
					<a href="#">Menu 1</a>
				</td>
			</tr>
		</table>
	</div> -->
	
</body>
</html>


