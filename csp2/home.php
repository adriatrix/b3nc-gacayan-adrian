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
											<input class="input is-hidden" type="number" value="1" min="0" id="itemQuantity'.$id.'">
											<a class="button is-medium is-info is-outlined" onclick="addToBasket('.$id.')" href="basket.php">
												<span>Buy one now!</span>
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
											<input class="input is-hidden" type="number" value="1" min="0" id="itemQuantity'.$id.'">
											<a class="button is-medium is-info is-outlined" onclick="addToBasket('.$id.')" href="basket.php">
												<span>Buy one now!</span>
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
		function addToBasket(itemId) {
			var id = itemId;
			var quantity = $('#itemQuantity' + id).val();
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
