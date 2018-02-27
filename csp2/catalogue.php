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

	<!-- <main class="wrapper" idea="catalogWrapper"> -->

		<h1 class="hidden">Catalog Page</h1>

		<?php

			// if ($_SESSION['role'] = 'admin') {
			// 	echo '
			// 	<a href="create_new_item.php">
			// 	<button class="btn btn-primary">Add New Item</button>
			// 	</a>
			// 	';
			// }
		 ?>


<div class="card">
  <div class="card-image">
    <figure class="image is-square">
      <img src="https://bulma.io/images/placeholders/480x480.png" alt="placeholder">
    </figure>
  </div>
  <div class="card-content">
    <div class="content has-text-centered">
      <p class="title is-5 is-spaced">The Quick Brown Fox</p>
      <p class="subtitle is-3">PHP 550.00</p>
      <hr>
      <a class="button is-medium">
        <span>Add to Bag</span>
        <span class="icon">
          <i class="fas fa-shopping-bag"></i>
        </span>
      </a>
    </div>
  </div>
</div>


		<!-- <div class="itemsWrapper"> -->
		<?php
		foreach ($result as $key => $item) {
		while ($item = mysqli_fetch_assoc($items)) {
				extract ($item);
				echo '
        <div class="card">
          <div class="card-image">
            <figure class="image is-square">
              <img src="https://bulma.io/images/placeholders/480x480.png" alt="placeholder">
            </figure>
          </div>
          <div class="card-content">
            <div class="content has-text-centered">
              <p class="title is-5 is-spaced">The Quick Brown Fox</p>
              <p class="subtitle is-3">PHP 550.00</p>
              <hr>
              <a class="button is-medium">
                <span>Add to Bag</span>
                <span class="icon">
                  <i class="fas fa-shopping-bag"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
				';
			}
		 ?>

	 <!-- </div> -->


	<!-- </main> -->

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
