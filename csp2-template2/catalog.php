<?php

session_start();

function getTitle() {
	echo 'Catalog';
}

include 'partials/head.php';

// $file = file_get_contents('assets/items.json');
// $items = json_decode($file, true);

require 'connect.php';

$sql = "SELECT * FROM items";
$items = mysqli_query($conn, $sql);


//Retrieve all categories
// $categories = array_column($items, 'category');

$sql = "SELECT name FROM categories";
$categories = mysqli_query($conn, $sql);
// $categories = mysqli_fetch_all($result);
// $categories = array_column($categories, 'name');
// var_export($categories);

//Filter unique entry of category
// $categories = array_unique($categories);
// sort($categories);

$result = array(); // empty array

//if search button has been clicked and category is NOT All
if (isset($_GET['search']) && $_GET['category']!=="All") {
	$cat = $_GET['category'];

	//filter items based on category chosen
	foreach ($items as $item) {
		if ($item['category']===$cat) {
			array_push($result, $item);
		}
	}

} else {
	// Show all items
	$result = $items;
}


?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper" idea="catalogWrapper">

		<h1>Catalog Page</h1>

		<?php

			if ($_SESSION['role'] = 'admin') {
				echo '
				<a href="create_new_item.php">
				<button class="btn btn-primary">Add New Item</button>
				</a>
				';
			}
		 ?>

		 <form class="" method="GET">
			 <select name="category">
				 <option>All</option>
				 <?php
				 		// foreach ($categories as $category) {
						while ($category = mysqli_fetch_assoc($categories)) {
							extract ($category);
							if ($name === $_GET['category']) {
								echo '
								<option selected>'.$name.'</option>
								';
							} else {
								echo '
								<option>'.$name.'</option>
								';
							}
						}
				  ?>
			 </select>
			 <button type="submit" name="search">Search</button>
		 </form>


		<div class="itemsWrapper">
		<?php
		// foreach ($result as $key => $item) {
		while ($item = mysqli_fetch_assoc($items)) {
				extract ($item);
				echo '
				<div class="item-parent-container form-group">
				<a href="item.php?id='.$id.'">
				<div class="item-container">
				<h3>'.$name.'</h3>
				<img src='.$image.' alt="Mock Data">
				<p>PHP '.$price.'</p>
				<p>'.$description.'</p>
				</div>
				</a>



				<input class="form-control" type="number" value="0" min="0" id="itemQuantity'.$id.'">
				<button class="btn btn-primary form-control" onclick="addToCart('.$id.')">Add to Cart</button>
				</div>
				';
			}
		 ?>

	 </div>


	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

mysqli_close($conn);

?>

<script>
	function addToCart(itemId) {
		var id = itemId;
		// retrieve value of item quantity
		var quantity = $('#itemQuantity' + id).val();
		//create a post request to update session cart variable
		$.post('assets/add_to_cart.php',
		{
			item_id: id,
			item_quantity: quantity
		},
		function(data, status) {
			// console.log(data);
			$('a[href="cart.php"]').html('My Cart ' + data);
		});
	}
</script>

</body>
</html>
