<?php

session_start();

function getTitle() {
	echo 'Catalog';
}

include 'partials/head.php';

require 'connect.php';

$sql = "SELECT * FROM items";
$items = mysqli_query($conn, $sql);

?>


</head>
<body>

	<?php include 'partials/header.php'; ?>

	<div class="container">
		<div class="columns">
			<div class="column">
				<div class="breadcrumb is-small" aria-label="breadcrumbs">
					<ul>
						<li><a href="home.php">Home</a></li>
						<li class="is-active"><a href="#" aria-current="page">Shop</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column is-3">
			</div>
			<div class="column is-3">
				<h1 class="is-size-3 is-title">Catalog Page
					<span>
						<?php
							if (isset($_SESSION['user_role'])) {
								if ($_SESSION['user_role'] == 'admin') {
									echo '
									<a href="create_item.php">
									<button class="button is-primary is-outlined">Create New Item</button>
									</a>
									';
								}
							}
						 ?>
					</span>
				</h1>
			</div>
			<div class="column">
				<div class="pagination is-right" role="navigation" aria-label="pagination">
					<!-- <a class="pagination-previous">Previous</a>
					<a class="pagination-next">Next page</a> -->
					<ul class="pagination-list">
						<li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
						<li><span class="pagination-ellipsis">&hellip;</span></li>
						<li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
						<li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
						<li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
						<li><span class="pagination-ellipsis">&hellip;</span></li>
						<li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="columns">
			<div class="column is-3">
				<div class="panel">
					<p class="panel-heading">
						categories
					</p>
					<div class="panel-block">
						<p class="control has-icons-left">
							<input class="input is-small" type="text" placeholder="search">
							<span class="icon is-small is-left">
								<i class="fas fa-search"></i>
							</span>
						</p>
					</div>
					<!-- <p class="panel-tabs">
					<a class="is-active">all</a>
					<a>new arrivals</a>
					<a>pre-orders</a>
					<a>sources</a>
					<a>forks</a>
				</p> -->

				<a class="panel-block accordion">
					<span class="panel-icon">
						<i class="fas fa-book"></i>
					</span>
					Series
				</a>
				<div class="panel-accordion">
					<div class="panel-block">
						<div class="columns">
							<div class="column is-1">
							</div>
							<div class="column is-11">
								<?php
									$sql = "SELECT * FROM serials";
									$result = mysqli_query($conn, $sql);
									while ($serial = mysqli_fetch_assoc($result)) {
								    extract($serial);
										echo '
											<label class="checkbox"><input type="checkbox">'.$series.'</label><br>
										';
									}
								 ?>
							</div>
						</div>
					</div>
				</div>
				<a class="panel-block accordion">
					<span class="panel-icon">
						<i class="fas fa-book"></i>
					</span>
					Brands
				</a>
				<div class="panel-accordion">
					<div class="panel-block">
						<div class="columns">
							<div class="column is-1">
							</div>
							<div class="column is-11">
								<?php
									$sql = "SELECT * FROM brands";
									$result = mysqli_query($conn, $sql);
									while ($brand = mysqli_fetch_assoc($result)) {
								    extract($brand);
										echo '
											<label class="checkbox"><input type="checkbox">'.$brand.'</label><br>
										';
									}
								 ?>
							</div>
						</div>
					</div>
				</div>
				<a class="panel-block accordion">
					<span class="panel-icon">
						<i class="fas fa-book"></i>
					</span>
					Sub-brands
				</a>
				<div class="panel-accordion">
					<div class="panel-block">
						<div class="columns">
							<div class="column is-1">
							</div>
							<div class="column is-11">
								<?php
								$sql = "SELECT * FROM sub_brands";
								$result = mysqli_query($conn, $sql);
								while ($sub_brand = mysqli_fetch_assoc($result)) {
									extract($sub_brand);
									echo '
									<label class="checkbox"><input type="checkbox">'.$sub_brand.'</label><br>
									';
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<a class="panel-block accordion">
					<span class="panel-icon">
						<i class="fas fa-book"></i>
					</span>
					Rarity
				</a>
				<div class="panel-accordion">
					<div class="panel-block">
						<div class="columns">
							<div class="column is-1">
							</div>
							<div class="column is-11">
								<?php
								$sql = "SELECT * FROM rarities";
								$result = mysqli_query($conn, $sql);
								while ($rarity = mysqli_fetch_assoc($result)) {
									extract($rarity);
									echo '
									<label class="checkbox"><input type="checkbox">'.$rarity.'</label><br>
									';
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-block">
					<button class="button is-link is-outlined is-fullwidth">
						reset all filters
					</button>
				</div>
			</div>
		</div>
		<div class="column is-9">
			<?php
			$itemcount = 0;
			while ($item = mysqli_fetch_assoc($items)) {
				if (($itemcount % 3) == 0) {echo '<div class="columns">';}
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
					<div class="column is-4">
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
					if (($itemcount % 3) == 0) {echo '</div>';}
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
