<?php

session_start();

function getTitle() {
	echo 'Catalog';
}

include 'partials/head.php';

include 'partials/header.php';

require 'connect.php';

$sql = "SELECT * FROM items";
$items = mysqli_query($conn, $sql);

?>

</head>
<body>
	<div class="container">
		<div class="columns">
			<div class="column">
				<div class="breadcrumb" aria-label="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Series</a></li>
						<li><a href="#">Brands</a></li>
						<li class="is-active"><a href="#" aria-current="page">Sub-brands</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column is-3">
			</div>
			<div class="column is-3">
				<h1 class="is-size-3 is-title">Catalog Page</h1>
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
						repositories
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
							<div class="column is-9 is-offset-3">
								<div>List 1</div>
								<div>List 2</div>
								<div>List 3</div>
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
							<div class="column is-9 is-offset-3">
								<div>List 1</div>
								<div>List 2</div>
								<div>List 3</div>
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
							<div class="column is-9 is-offset-3">
								<div>List 1</div>
								<div>List 2</div>
								<div>List 3</div>
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
							<div class="column is-9 is-offset-3">
								<div>List 1</div>
								<div>List 2</div>
								<div>List 3</div>
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
					echo '
					<div class="column is-4">
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
					if (($itemcount % 3) == 0) {echo '</div>';}
				}
				?>

				<div class="pagination is-centered" role="navigation" aria-label="pagination">
					<a class="pagination-previous">Previous</a>
					<a class="pagination-next">Next page</a>
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
