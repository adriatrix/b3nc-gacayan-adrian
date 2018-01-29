<?php


session_start();
if (isset($_SESSION['current_user'])) {
	if ($_SESSION['role'] != 'admin')
		header ('location: home.php');
}

function getTitle() {
	echo 'Item Page';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Item Page</h1>

		<?php

		$id = $_GET['id'];

		$file = file_get_contents('assets/items.json');
		$items = json_decode($file, true);

		// foreach ($items as $key => $user) {
		// 	if($key == $id) {
    //
		// 	}
		// }

		echo '
		<table>
			<tr>
				<td>Product Name</td>
				<td>' . $items[$id]['name'] . '</td>
			</tr>
			<tr>
				<td>Image</td>
				<td><img src="' . $items[$id]['image']. '"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td>'. $items[$id]['price']. '</td>
			</tr>
			<tr>
				<td>Description</td>
				<td>'. $items[$id]['desciption']. '</td>
			</tr>

		</table>
		';


		?>

		<a href="catalog.php"><button class="btn btn-default">Back</button></a>

		<button type="button" id="editItem" class="btn btn-primary" data-toggle="modal" data-target="#editItemModal" data-Index="<?php echo $id; ?>">Edit</button>
		<button type="button" id="deleteItem" class="btn btn-danger" data-toggle="modal" data-target="#deleteItemModal" data-Index="<?php echo $id; ?>">Delete</button>
	</main>



	<div id="editItemModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->

		<form action="assets/update_item.php" method="POST">
			<div class="modal-content">
				<input name="name_id" value="<?php echo $id ?>" hidden>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Item Details</h4>
				</div>
				<div class="modal-body" id="editItemModalBody">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</form>


  </div>
</div>

<div id="deleteItemModal" class="modal fade" role="dialog">
<div class="modal-dialog">

	<!-- Modal content-->

	<form action="assets/delete_item.php" method="POST">
		<div class="modal-content">
			<input name="name_id" value="<?php echo $id ?>" hidden>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete Item Details</h4>
			</div>
			<div class="modal-body" id="deleteItemModalBody">
				<p>Do you really really really want to delete this item from the Catalog?</p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default">Save</button>
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
		$('#editItem').click(function() {
			var itemId = $(this).data('index');
			// console.log(userId);
			$.get('assets/edit_item.php',
			{
				id: itemId
			},
			function(data, status) {
				// console.log(data);
				$('#editItemModalBody').html(data);
		});
		});
	});

</script>

</body>
</html>
