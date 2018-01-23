<?php

function getTitle() {
	echo 'Register';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Register Page</h1>

		<form id="registerForm" method="POST" action="assets/registration.php" class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" placeholder="Enter new username" class="form-control" required>

			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="Enter new password" class="form-control" required>

			<label for="confirmPassword">Confirm Password</label>
			<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Enter password again" class="form-control" required>

			<label for="email">Email Address</label>
			<input type="email" name="email" id="email" placeholder="email@domain.com" class="form-control" required>

			<input type="submit" name="submit" id="submit" value="Register" class="btn btn-primary">
		</form>

	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

<script type="text/javascript">
	$('#username').keypress(function() {
		var usernameText = $(this).val();
		$.post('username_validation.php',
			{username: usernameText},
			function(data, status) {
				console.log ('Processed: ' + data);
			});
		// console.log(usernameText);
	});
</script>

</body>
</html>
