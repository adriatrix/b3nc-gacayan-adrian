<?php

session_start();

// if (!isset($_SESSION['current_user'])) {
// 	header('location: signin.php');
// } else {
// 	if ($_SESSION['current_role'] != 'admin')
// 		header('location: home.php');
// }


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

		<table>
			<thead>
				<th>Username</th>
				<th>Password</th>
				<th>Email</th>
				<th>Role</th>
			</thead>
			<tbody>
				<?php

				$sql = "SELECT * FROM users";
				$users = mysqli_query($conn, $sql);

				while ($user = mysqli_fetch_assoc($users)) {
				extract($user);

				echo '
				<tr>
					<td><a href="user.php?id='.$id.'">'. $username .'</a></td>
					<td>'. $password .'</td>
					<td>'. $email .'</td>
					<td>'. $role_id .'</td>
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
