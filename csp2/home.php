<?php

session_start();

function getTitle() {
	echo 'Catalog';
}

include 'partials/head.php';

include 'partials/header.php';

require 'connect.php';


?>

</head>
<body>
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
						echo '
						<div class="column is-3">
							<a href="item.php?id='.$id.'">
								<div class="card box">
									<div class="card-image">
										<figure class="image is-square">
											<img src='.$image.' alt="placeholder">
										</figure>
									</div>
									<div class="card-content">
										<div class="content has-text-centered">
											<p class="title is-7 is-spaced">'.$name.'</p>
											<p class="subtitle is-5">PHP '.$price.'</p>
											<hr>
											<a class="button is-medium is-info is-outlined">
												<span>Add to Basket</span>
												<span class="icon">
													<i class="fas fa-shopping-basket"></i>
												</span>
											</a>
										</div>
									</div>
								</div>
							</a>
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
						echo '
						<div class="column is-3">
							<a href="item.php?id='.$id.'">
								<div class="card box">
									<div class="card-image">
										<figure class="image is-square">
											<img src='.$image.' alt="placeholder">
										</figure>
									</div>
									<div class="card-content">
										<div class="content has-text-centered">
											<p class="title is-7 is-spaced">'.$name.'</p>
											<p class="subtitle is-5">PHP '.$price.'</p>
											<hr>
											<a class="button is-medium is-info is-outlined">
												<span>Add to Basket</span>
												<span class="icon">
													<i class="fas fa-shopping-basket"></i>
												</span>
											</a>
										</div>
									</div>
								</div>
							</a>
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
