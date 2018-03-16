<?php

session_start();

if (!isset($_SESSION['basket_count']) ) {
	$_SESSION['basket_count'] = 0;
}

function getTitle() {
	echo 'Catalog';
}

include 'partials/head.php';

require 'connect.php';


?>

</head>
<body>

	<?php include 'partials/header.php'; ?>


	<div class="container">
		<div class="columns">
			<div class="column">
				<h1 hidden>Home Page</h1>
			</div>
		</div>

		<div class="columns">
			<div class="column is-12">
				<h2 class="title is-3">Featured Items</h2>
				<?php
				$sql = "SELECT * FROM items WHERE YEAR(release_date) > 2016";
				$items = mysqli_query($conn, $sql);

				$itemcount = 0;
				while ($item = mysqli_fetch_assoc($items)) {
					if (($itemcount % 4) == 0) {echo '<div class="columns">';}
						extract ($item);
						if (isset($_SESSION['cart'])) {
							$my_basket = $_SESSION['cart'];
							if (isset($my_basket[$id])) {
									$quantity = $my_basket[$id];
								} else {
									$quantity = "0";
								}
						} else {
							$quantity = "0";
						}

						echo '
						<div class="column is-3">
							<div class="card box">
								<a href="item.php?id='.$id.'">
									<div class="card-image">
										<figure class="image is-square">
											<img src='.$image.' alt="image placeholder for '.$name.'">
										</figure>
										</a>
									</div>
									<div class="card-content">
										<div class="content has-text-centered">
											<p class="title is-7 is-spaced">'.$name.'</p>
											<p class="subtitle is-5">PHP '.$price.'</p>
											<hr>
											<div class="level is-mobile">
												<div class="level-item has-text-centered">
													<div>
														<p class="heading"><abbr title="Quantity">QTY</abbr></p>
														<p class="is-size-7" id="bQuantity'.$id.'">'.$quantity.'</p>
														<input class="input is-hidden is-small" type="number" value="'.$quantity.'" min="0" max="'.$stock.'" id="itemQuantity'.$id.'">
													</div>
												</div>
												';

												if ($quantity == $stock) {
													echo '
														<div class="level-item has-text-centered">
														<div class="is-hidden"  id="addBasket'. $id .'">
														<a class="button is-medium is-info" onclick="addToBasket('.$id.')">
														<span>Buy1</span>
														<span class="icon">
														<i class="fas fa-shopping-basket"></i>
														</span>
														</a>
														</div>
														<div id="viewBasket'. $id .'">
														<a class="button is-medium is-info is-outlined" href="basket.php">
														<span>View</span>
														<span class="icon">
														<i class="fas fa-shopping-basket"></i>
														</span>
														</a>
														</div>
														</div>
													';
												} else {
													echo '
														<div class="level-item has-text-centered">
														<div id="addBasket'. $id .'">
														<a class="button is-medium is-info" onclick="addToBasket('.$id.')">
														<span>Buy1</span>
														<span class="icon">
														<i class="fas fa-shopping-basket"></i>
														</span>
														</a>
														</div>
														<div class="is-hidden" id="viewBasket'. $id .'">
														<a class="button is-medium is-info is-outlined" href="basket.php">
														<span>View</span>
														<span class="icon">
														<i class="fas fa-shopping-basket"></i>
														</span>
														</a>
														</div>
														</div>
													';
												}

												echo '
												<div class="level-item has-text-centered">
													<div>
														<p class="heading"><abbr title="Stock">STK</abbr></p>
														<p class="is-size-7">'.$stock.'</p>
														<input class="input is-hidden is-small" type="number" value="'.$stock.'" min="0" id="itemStock'.$id.'">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
						';
						$itemcount++;
						if (($itemcount % 4) == 0) {
							echo '</div>';
							break;
						}
					}
					?>

				</div>
			</div>

		<div class="columns">
			<div class="column is-12">
				<p class="title is-3">New Arrivals</p>
				<?php
				$sql = "SELECT * FROM items WHERE YEAR(release_date) <= 2016";
				$items = mysqli_query($conn, $sql);

				$itemcount = 0;
				while ($item = mysqli_fetch_assoc($items)) {
					if (($itemcount % 4) == 0) {echo '<div class="columns">';}
						extract ($item);
						if (isset($_SESSION['cart'])) {
							$my_basket = $_SESSION['cart'];
							if (isset($my_basket[$id])) {
									$quantity = $my_basket[$id];
								} else {
									$quantity = "0";
								}
						} else {
							$quantity = "0";
						}

						echo '
						<div class="column is-3">
							<div class="card box">
								<a href="item.php?id='.$id.'">
									<div class="card-image">
										<figure class="image is-square">
											<img src='.$image.' alt="image placeholder for '.$name.'">
										</figure>
										</a>
									</div>
									<div class="card-content">
										<div class="content has-text-centered">
											<p class="title is-7 is-spaced">'.$name.'</p>
											<p class="subtitle is-5">PHP '.$price.'</p>
											<hr>
											<div class="level is-mobile">
												<div class="level-item has-text-centered">
													<div>
														<p class="heading"><abbr title="Quantity">QTY</abbr></p>
														<p class="is-size-7" id="bQuantity'.$id.'">'.$quantity.'</p>
														<input class="input is-hidden is-small" type="number" value="'.$quantity.'" min="0" max="'.$stock.'" id="itemQuantity'.$id.'">
													</div>
												</div>
												';

												if ($quantity == $stock) {
													echo '
														<div class="level-item has-text-centered">
														<div class="is-hidden"  id="addBasket'. $id .'">
														<a class="button is-medium is-info" onclick="addToBasket('.$id.')">
														<span>Buy1</span>
														<span class="icon">
														<i class="fas fa-shopping-basket"></i>
														</span>
														</a>
														</div>
														<div id="viewBasket'. $id .'">
														<a class="button is-medium is-info is-outlined" href="basket.php">
														<span>View</span>
														<span class="icon">
														<i class="fas fa-shopping-basket"></i>
														</span>
														</a>
														</div>
														</div>
													';
												} else {
													echo '
														<div class="level-item has-text-centered">
														<div id="addBasket'. $id .'">
														<a class="button is-medium is-info" onclick="addToBasket('.$id.')">
														<span>Buy1</span>
														<span class="icon">
														<i class="fas fa-shopping-basket"></i>
														</span>
														</a>
														</div>
														<div class="is-hidden" id="viewBasket'. $id .'">
														<a class="button is-medium is-info is-outlined" href="basket.php">
														<span>View</span>
														<span class="icon">
														<i class="fas fa-shopping-basket"></i>
														</span>
														</a>
														</div>
														</div>
													';
												}

												echo '
												<div class="level-item has-text-centered">
													<div>
														<p class="heading"><abbr title="Stock">STK</abbr></p>
														<p class="is-size-7">'.$stock.'</p>
														<input class="input is-hidden is-small" type="number" value="'.$stock.'" min="0" id="itemStock'.$id.'">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
						';
						$itemcount++;
						if (($itemcount % 4) == 0) {echo '</div>';}
					}
					?>

				</div>
			</div>
		</div>


		<?php

			// if ($_SESSION['role'] = 'admin') {
			// 	echo '
			// 	<a href="create_new_item.php">
			// 	<button class="btn btn-primary">Add New Item</button>
			// 	</a>
			// 	';
			// }
		 ?>



  <?php


    include 'partials/footer.php';

    include 'partials/foot.php';

    mysqli_close($conn);

  ?>

	<script>
	function addToBasket(itemId) {
		var id = itemId;
		var quantity = $('#itemQuantity' + id).val();
		quantity = parseInt(quantity,10);
		quantity = quantity + 1;

		var maxstock = $('#itemQuantity' + id).attr("max");
		maxstock = parseInt(maxstock,10);

		if (quantity == maxstock){
			$('#addBasket' + id).addClass('is-hidden');
			$('#viewBasket' + id).removeClass('is-hidden');
		}

		$('#itemQuantity' + id).val(quantity);
		$('#bQuantity' + id).html(quantity);

		$.post('assets/add_to_basket.php',
		{
			item_id: id,
			item_quantity: quantity
		},
		function(data, status) {
			console.log(data);
			$('.my-badge').html(data);
		});

	}

	</script>

</body>
</html>
