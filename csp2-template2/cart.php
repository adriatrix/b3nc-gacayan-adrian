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

    <?php
      // var_export($_SESSION['cart']);

      $my_cart = $_SESSION['cart'];

      // var_dump($my_cart);


      foreach ($my_cart as $key => $cart) {
        // var_dump($key);
        $sub_total = $my_cart[$key] * $items[$key-1]['price'];
        $key = strval($key);

        echo '
        <table>
        <tr>
        <td>Product Name</td>
        <td>'.$items[$key-1]['name'] . '</td>
        </tr>
        <tr>
        <td>Price</td>
        <td>'. $items[$key-1]['price']. '</td>
        </tr>
        <tr>
        <td>Quantity</td>
        <td>'. $my_cart[$key] . '</td>
        </tr>
        <tr>

        <td>Subtotal</td>
        <td>'. $sub_total . '</td>
        </tr>

        </table>
        ';
      }



     ?>



	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

</body>
</html>
