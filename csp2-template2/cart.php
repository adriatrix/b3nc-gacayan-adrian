<?php


session_start();

function getTitle() {
	echo 'Welcome to Kraff Beeer Philippines!';
}

if (!isset($_SESSION['current_user'])) {
  header('location: login.php');
}

include 'partials/head.php';

$file = file_get_contents('assets/items.json');
$items = json_decode($file, true);

?>


<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>My Cart Page</h1>

		<table>
			<tr>
				<th class="text-center">Product Name</th>
				<th class="text-center">Quantity</th>
				<th class="text-center">Price</th>
				<th class="text-center">Subtotal</th>
			</tr>

    <?php
      // var_export($_SESSION['cart']);

      $my_cart = $_SESSION['cart'];
			$total = 0;
			$qtytotal = 0;

      // var_dump($my_cart);


      foreach ($my_cart as $key => $cart) {
        // var_dump($key);
        $sub_total = $my_cart[$key] * $items[$key-1]['price'];
        $key = strval($key);

        echo '
        <tr>
        <td>'.$items[$key-1]['name'] . '</td>


				<td>
				<input oninput="updateCart('.$items[$key-1]['id'].')" min="0" type="number" name="price" id="updateQuantity'.$items[$key-1]['id'].'" value="'. $my_cart[$key] .'">
				</td>


				<td><span class="pull-left">PHP </span><input type="number" hidden id="cart-price'.$items[$key-1]['id'].'" class="pull-right" value="'. $items[$key-1]['price']. '">'. $items[$key-1]['price']. '</td>
				<td><span class="pull-left">PHP </span><span id="subTotal'.$items[$key-1]['id'].'" class="pull-right">'. $sub_total . '</span></td>
        </tr>
        ';
				$total = $total + $sub_total;
				$qtytotal = $qtytotal + $my_cart[$key];
				// var_dump($total);
      }



			echo '
			<tr>
			<td><strong>TOTAL</strong></td>
			<td class="text-center qty-total">'. $qtytotal .'</td>
			<td></td>
			<td><span class="pull-left">PHP </span><input value="' . $total . '" hidden class="pull-right cart-total">'. $total . '</td>
			</tr>
			';

     ?>

	 </table>




	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

<script>
	function updateCart(itemId) {
		var id = itemId;
		// retrieve value of item quantity
		var quantity = $('#updateQuantity' + id).val();
		var price = $('#cart-price' + id).val();
		// var subtotal = $('#subTotal' + id).val();
		var total = $('.cart-total').val();
		// total = total + price;
		// $('.cart-total').html(total);

		console.log(quantity);
		console.log(price);
		// console.log(subtotal);
		console.log(total);
		//create a post request to update session cart variable
		$.post('assets/update_to_cart.php',
		{
			item_id: id,
			item_quantity: quantity
		},
		function(data, status) {
			$('#subTotal' + id).html(data);
			console.log(total);
			console.log(data);
			$('.cart-total').html(total + data);
		});
	}
</script>

</body>
</html>
