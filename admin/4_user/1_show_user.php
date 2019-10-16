<?php 
$get_user = $_SESSION['username'];
$sql = "SELECT id, username, password, level FROM user;";

$user = tampilkan_looping($sql);
// var_dump($user[0]["nisn"]);

if ($get_user == "fauzi") {

?>

<div class="show">
	<div class="judul">
		<h3>Data User</h3>
		<h5 style="font-weight: normal; margin-top: -10px;">
			note : Data ...
		</h5>
	</div>
	<div class="button">
		<a href="?hl=user&op=input">
			<button>
				<i class="fa fa-plus" aria-hidden="true"></i>
			</button>
		</a>
	</div>

	<div class="form">
		<form method="post">
			<table class="w100" border="1" style="text-align: center;">
				<tr>
					<th>No.</th>
					<th>Username</th>
					<th>Level</th>
					<th colspan="2">Opsi</th>
				</tr>
				<?php $no = 1; ?>
				<?php foreach ($user as $data) : ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?= $data["username"]; ?></td>
					<td><?= $data["level"]; ?></td>
					<td style="border-right: 0px;">
						<a style="color: black;" href="?hl=user&op=edit&id=<?= $data["id"]; ?>">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>
					</td>
					<td>
						<a style="color: black;" href="?hl=user&op=delete&id=<?= $data["id"]; ?>" onclick="return confirm('Yakin Delete Data ? ')">
							<i class="fa fa-trash-o" aria-hidden="true"></i>
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</form>
	</div>
</div>

<?php 
} else {
	include "5_error.php";
}
?>