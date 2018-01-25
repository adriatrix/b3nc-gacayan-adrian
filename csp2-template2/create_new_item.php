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

		<h1>Create a new Item Page</h1>

		<form id="registerForm" method="POST" action="assets/create_item.php" class="form-group">
			<label for="pname">Product Name</label>
			<input type="text" name="pname" id="pname" placeholder="What's it called?" class="form-control" required>

			<label for="image">Image</label>
			<input type="file" name="image" id="image" placeholder="What's it look like?" class="form-control">

      <label for="price">Price</label>
      <input type="number" name="price" id="price" placeholder="How much?" class="form-control" required step="any" required>

      <label for="desciption">Description</label>
      <textarea name="desciption" id="desciption" placeholder="Can you desribe it?" rows="8" cols="80" required></textarea>

			<label for="category">Category</label>
			<select type="category" name="category" id="category" placeholder="Categorize it?" class="form-control" required>
        <option value="Category 1">Category 1</option>
        <option value="Category 2">Category 2</option>
        <option value="Category 3">Category 3</option>
        <option value="Category 4">Category 4</option>
        <option value="Category 5">Category 5</option>
        <option value="Category 6">Category 6</option>
      </select>

			<input type="submit" name="submit" id="submit" value="Create some Magick" class="btn btn-primary">
		</form>

	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

<!-- <script type="text/javascript">
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
</script> -->

</body>
</html>
