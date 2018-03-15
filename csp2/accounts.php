<?php

session_start();

if (!isset($_SESSION['current_user'])) {
	header('location: signin.php');
} else {
	if ($_SESSION['user_role'] != 'admin')
		header('location: home.php');
}


function getTitle() {
	echo 'Settings';
}

include 'partials/head.php';

require 'connect.php';

?>

</head>
<body>

	<?php include 'partials/header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Accounts Page</h1>

		<table class="table is-bordered is-striped is-hoverable is-fullwidth">
			<thead>
				<th>Username</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
			</thead>
			<tbody>
				<?php

				$sql = "SELECT u.*, r.role FROM users u JOIN roles r ON (u.role_id = r.id)";
				$users = mysqli_query($conn, $sql);

				while ($user = mysqli_fetch_assoc($users)) {
				extract($user);

				echo '
				<tr>
					<td><a href="user.php?id='.$id.'">'. $username .'</a></td>
					<td>'. $firstname .' '. $lastname .'</td>
					<td>'. $email .'</td>
					<td>'. $role .'</td>
				</tr>
				';
				}

				?>
			</tbody>

		</table>

	</main>

<?php
include 'partials/footer.php';

include 'partials/foot.php';

mysqli_close($conn);

?>

</body>
</html>
