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

		<h1>User Page</h1>

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
				<td>Photo</td>
				<td><img src="' . $users[$id]['photo']. '"></td>
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

		<a href="settings.php"><button class="btn btn-default">Back</button></a>

		<button type="button" id="editUser" class="btn btn-primary" data-toggle="modal" data-target="#editUserModal" data-Index="<?php echo $id; ?>">Edit</button>
		<button type="button" id="deleteUser" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal" data-Index="<?php echo $id; ?>">Delete</button>

		<!-- <button class="btn btn-primary">Edit</button> -->
		<!-- <button class="btn btn-danger">Delete</button> -->
	</main>

	<div id="editUserModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->

		<form action="assets/update_user.php" method="POST">
			<div class="modal-content">
				<input name="user_id" value="<?php echo $id ?>" hidden>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit User Details</h4>
				</div>
				<div class="modal-body" id="editUserModalBody">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</form>


  </div>
</div>

<div id="deleteUserModal" class="modal fade" role="dialog">
<div class="modal-dialog">

	<!-- Modal content-->

	<form action="assets/delete_user.php" method="POST">
		<div class="modal-content">
			<input name="user_id" value="<?php echo $id ?>" hidden>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete User Details</h4>
			</div>
			<div class="modal-body" id="deleteUserModalBody">
				<p>Do you really really really want to delete this user's account?</p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>


</div>
</div>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';


?>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#editUser').click(function() {
				var userId = $(this).data('index');
				// console.log(userId);
				$.get('assets/edit_user.php',
				{
					id: userId
				},
				function(data, status) {
					// console.log(data);
					$('#editUserModalBody').html(data);
			});
			});
		});

		// $(document).ready(function() {
		// 	$('#deleteUser').click(function() {
		// 		var userId = $(this).data('index');
		// 		// console.log(userId);
		// 		$.get('assets/delete_user.php',
		// 		{
		// 			id: userId
		// 		},
		// 		function(data, status) {
		// 			// console.log(data);
		// 			$('#deleteUserModalBody').html(data);
		// 	});
		// 	});
		// });

	</script>

</body>
</html>
