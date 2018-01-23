<?php


session_start();
if (isset($_SESSION['current_user'])) {
	if ($_SESSION['role'] != 'admin')
		header ('location: home.php');
}

function getTitle() {
	echo 'User Page';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Index Page</h1>

		<?php

		$id = $_GET['id'];

		$file = file_get_contents('assets/users.json');
		$users = json_decode($file, true);

		// foreach ($users as $key => $user) {
		// 	if($key == $id) {
    //
		// 	}
		// }

		echo '
		<table>
			<tr>
				<td>Username</td>
				<td>' . $users[$id]['username'] . '</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>' . $users[$id]['password']. '</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>'. $users[$id]['email']. '</td>
			</tr>
			<tr>
				<td>Role</td>
				<td>'. $users[$id]['role']. '</td>
			</tr>

		</table>
		';


		?>

		<button class="btn btn-primary">Edit</button>
		<button class="btn btn-danger">Delete</button>
	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

</body>
</html>
