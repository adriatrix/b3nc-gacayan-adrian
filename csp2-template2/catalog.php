<?php

session_start();

function getTitle() {
	echo 'Catalog';
}

include 'partials/head.php';

$file = file_get_contents('assets/items.json');
$items = json_decode($file, true);

//Retrieve all categories
$categories = array_column($items, 'category');

//Filter unique entry of category
$categories = array_unique($categories);
sort($categories);

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
				 		foreach ($categories as $category) {
							if ($category === $_GET['category']) {
								echo '
								<option selected>'.$category.'</option>
								';
							} else {
								echo '
								<option>'.$category.'</option>
								';
							}
						}
				  ?>
			 </select>
			 <button type="submit" name="search">Search</button>
		 </form>


		<div class="itemsWrapper">
		<?php
			foreach ($result as $key => $item) {
				echo '
				<div class="item-parent-container form-group">
				<a href="item.php?id='.$item['id'].'">
				<div class="item-container">
				<h3>'.$item['name'].'</h3>
				<img src='.$item['image'].' alt="Mock Data">
				<p>PHP '.$item['price'].'</p>
				<p>'.$item['desciption'].'</p>
				<p>'.$item['category'].'</p>
				</div>
				</a>
				<button class="btn btn-primary form-control">Add to Cart</button>
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

?>

</body>
</html>
