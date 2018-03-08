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
								<label class="checkbox"><input type="checkbox">Funko POP! Anime</label><br>
								<label class="checkbox"><input type="checkbox">Funko POP! Disney</label><br>
								<label class="checkbox"><input type="checkbox">Funko POP! Games</label><br>
								<label class="checkbox"><input type="checkbox">Funko POP! Heroes</label><br>
								<label class="checkbox"><input type="checkbox">Funko POP! Movies</label><br>
								<label class="checkbox"><input type="checkbox">Funko POP! Sports</label><br>
								<label class="checkbox"><input type="checkbox">Funko POP! Star Wars</label><br>
								<label class="checkbox"><input type="checkbox">Funko POP! TV</label><br>
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
								<label class="checkbox"><input type="checkbox">DC</label><br>
								<label class="checkbox"><input type="checkbox">Disney</label><br>
								<label class="checkbox"><input type="checkbox">Game of Thrones</label><br>
								<label class="checkbox"><input type="checkbox">Ghostbusters</label><br>
								<label class="checkbox"><input type="checkbox">Marvel</label><br>
								<label class="checkbox"><input type="checkbox">My Little Pony</label><br>
								<label class="checkbox"><input type="checkbox">Star Wars</label><br>
								<label class="checkbox"><input type="checkbox">Stranger Things</label><br>
								<label class="checkbox"><input type="checkbox">Walking Dead</label><br>
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
								<label class="checkbox"><input type="checkbox">None</label><br>
								<label class="checkbox"><input type="checkbox">Dardevil</label><br>
								<label class="checkbox"><input type="checkbox">Captain America</label><br>
								<label class="checkbox"><input type="checkbox">Black Panther</label><br>
								<label class="checkbox"><input type="checkbox">Thor</label><br>
								<label class="checkbox"><input type="checkbox">Superman</label><br>
								<label class="checkbox"><input type="checkbox">Batman</label><br>
								<label class="checkbox"><input type="checkbox">Suicide Squad</label><br>
								<label class="checkbox"><input type="checkbox">Avengers</label><br>
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
								<label class="checkbox"><input type="checkbox">Common</label><br>
								<label class="checkbox"><input type="checkbox">Uncommon</label><br>
								<label class="checkbox"><input type="checkbox">Rare</label><br>
								<label class="checkbox"><input type="checkbox">Ultra Rare</label><br>
								<label class="checkbox"><input type="checkbox">Super Rare</label><br>
								<label class="checkbox"><input type="checkbox">Retired</label><br>
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
										<input class="input is-hidden" type="number" value="1" min="0" id="itemQuantity'.$id.'">
										<a class="button is-medium is-info is-outlined" id="addBasket-'. $id .'" onclick="addToBasket('.$id.', this.id)">
										';
										if (isset($_SESSION['cart'])) {
											echo '<span>Add this one</span>';
										} else {
											echo '<span>Buy one now!</span>';
										}
										echo '
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
	function addToBasket(itemId, btnId) {
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
			$('#' + btnId).addClass('is-static');
			// document.getElementById(btnId).disabled = true;
		});

	// window.open("basket.php","_self")
	}



</script>

</body>
</html>
