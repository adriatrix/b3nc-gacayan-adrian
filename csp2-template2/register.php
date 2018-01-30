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
	$('#username').on('input', function() {
		var usernameText = $(this).val();
		$.post('assets/username_validation.php',
			{username: usernameText},
			function(data, status) {
				// console.log ('Processed: ' + data);

				$('[for="username"]').html(data);
			});
		// console.log(usernameText);
	});


	$('#confirmPassword').on('input', function() {
		var passConfirmed = $(this).val();
		var passEntered = $('#password').val();
		console.log(passConfirmed);
		if (passConfirmed == "")
			$('[for="confirmPassword"]').html('Confirm Password')
			else {
				if (passEntered == passConfirmed)
				$('[for="confirmPassword"]').html('Confirm Password <span class="green-message "><i class="glyphicon glyphicon-ok"></i></span>')
				else
				$('[for="confirmPassword"]').html('Confirm Password <span class="red-message "><i class="glyphicon glyphicon-remove"></i></span>')
			}
	});

	$('#password').on('input', function() {
		var passConfirmed = $('#passwordConfirm').val();
		var passEntered = $(this).val();
		console.log (passEntered);
		console.log (passConfirmed);

		if (passEntered == "" || passConfirmed == undefined) {
			$('[for="confirmPassword"]').html('Confirm Password')
			$('[for="confirmPassword"]').prop("disabled", true);
		}
		else {
			$('[for="confirmPassword"]').prop("disabled", false)
			if (passEntered == passConfirmed)
			$('[for="confirmPassword"]').html('Confirm Password <span class="green-message "><i class="glyphicon glyphicon-ok"></i></span>')
			else
			$('[for="confirmPassword"]').html('Confirm Password <span class="red-message "><i class="glyphicon glyphicon-remove"></i></span>')
		}
	});


	$('#email').on('input', function() {
		var emailText = $(this).val();
		$.post('assets/email_validation.php',
			{email: emailText},
			function(data, status) {
				console.log ('Processed: ' + data);

				$('[for="email"]').html(data);
			});
		// console.log(usernameText);
	});
</script>

</body>
</html>
