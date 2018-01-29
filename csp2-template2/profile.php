<?php

session_start();

function getTitle() {
	echo 'Welcome to Kraff Beeer Philippines!';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Profile Page</h1>

		<?php
		$file = file_get_contents('assets/users.json');
		$users = json_decode($file, true);

		foreach ($users as $key => $user) {
						$_SESSION['current_user'] = $user['username'];
						break;
						$id = $key;
				}

		echo $users[$id]['username'];
		 ?>

	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

</body>
</html>
