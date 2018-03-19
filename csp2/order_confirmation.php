<?php

  session_start();

  function getTitle() {
    echo 'Order Confirmation';
  }

  include 'partials/head.php';

  require 'connect.php';

  if (!isset($_SESSION['order_id']) ) {
    header('location: catalogue.php');
  } else {
    $reference_num = $_SESSION['order_id'];
  }

  if (isset($_SESSION['current_user']) ) {
    $user_name = $_SESSION['current_user'];
  }

  $sql = "SELECT * FROM users WHERE username = '".$user_name."'";
  $result = mysqli_query($conn, $sql);
  while ($user = mysqli_fetch_assoc($result)) {
    extract($user);
    $user_id = $id;
  }

  $sql = "SELECT o.*, u.id, u.firstname, u.username FROM orders o JOIN users u ON (o.user_id = '$user_id') WHERE (reference_num = '$reference_num')";
  // $sql = "SELECT * from orders WHERE (reference_num = '$reference_num')";
  $results = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($results);
  extract($result);
  // var_dump($result)

 ?>

</head>
<body>

  <?php include 'partials/header.php';?>

  <section class="section">
    <div class="container">

      <h1 class="title">Order Confirmation</h1>
      <h2 class="subtitle">Order ID: <?php echo '<strong>'.$reference_num.'</strong>'; ?></h2>
      <h3 class="subtitle is-size-7">Purchase Date: <?php echo ''.$purchase_date.''; ?></h3>

      <div class="columns">
        <div class="column">
          <?php

          if (isset($_SESSION['order_id'])) {
            unset($_SESSION['order_id']);
          }
          $totalprice = 0;
          $totalqty = 0;
          // $my_basket = $_SESSION['cart'];

          $sql = "SELECT * FROM orders WHERE reference_num = '".$reference_num."'";

          $result = mysqli_query($conn, $sql);
          while ($order = mysqli_fetch_assoc($result)) {
            extract($order);
            $order_id = $id;
          }

          $sql = "SELECT * FROM order_details WHERE order_id = '".$order_id."'";
          // var_dump($sql);
          $result = mysqli_query($conn, $sql);
          while ($order_detail = mysqli_fetch_assoc($result)) {
              extract($order_detail);
          // foreach ($my_basket as $key => $basket) {
            // $sql = "SELECT id, price FROM items WHERE id = '".$key."'";
            // $result = mysqli_query($conn, $sql);
            // $item = mysqli_fetch_assoc($result);
            // extract($item);
            //
            // if($my_basket[$key] == 0 || is_nan($my_basket[$key])) {
            //   $my_basket[$key] = 1;
            // }

            // $sub_total = $my_basket[$key] * intval($price);
            $fsub_total = number_format($subtotal,2);

            $totalqty = $totalqty + $quantity;
            $totalprice = intval($totalprice,10) + intval($subtotal,10);

            }


          // $sql = "SELECT * FROM users WHERE (username = '$user_name')";
          // $users = mysqli_query($conn, $sql);
          // while ($user = mysqli_fetch_assoc($users)) {
          //   extract($user);
            if ($ship_method == 'local') {
              $totalprice = intval($totalprice,10) + 150;
              echo '
                <p><strong>Thank you, '.$firstname.' </strong>! Your order has been placed for a total of <strong>'.$totalqty.'</strong> item/s. Please make your payment of <strong>PHP '. number_format($totalprice,2) .'</strong><span class="is-size-7"><em> (shipping fee of PHP150.00 included)</em></span> directly into our bank account. Please use above Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account. </p>
              ';
            } else {
              echo '
                <p><strong>Thank you, '.$firstname.' </strong>! Your order has been placed for a total of <strong>'.$totalqty.'</strong> item/s. Please make your payment of <strong>PHP '. number_format($totalprice,2) .'</strong> directly into our bank account. Please use above Order ID as the payment reference. I will contact you regarding the meetup once the funds have cleared in our account. </p>
              ';
            }
          // }

          ?>

          <hr>

          <p>Payment Options:</p>
          <dl>
            <dt><span class="is-size-7 has-text-weight-semibold">Name: </span>
              <span class="is-size-7">Adrian Gacayan</span>
            </dt>
            <dt class="is-size-6"><span class="is-size-7 has-text-weight-semibold">Contact No.: </span>
              <span class="is-size-7">(02) 282-9520</span>
            </dt>
            <dt class="is-size-6"><span class="is-size-7 has-text-weight-semibold">Address: </span>
              <span class="is-size-7">3rd Floor Caswynn Building, No. 134 Timog Avenue, Sacred Heart, Quezon City</span>
            </dt>
          </dl>
          <p>&nbsp;</p>
          <p>Banks (deposit or online money transfer)</p>
          <dl>
            <dt><span class="is-size-7 has-text-weight-semibold">Unionbank Savings: </span>
              <span class="is-size-7">1021680022641</span>
            </dt>
            <dt class="is-size-6"><span class="is-size-7 has-text-weight-semibold">Metrobank savings: </span>
              <span class="is-size-7">633-3-633-16026-12</span>
            </dt>
            <dt class="is-size-6"><span class="is-size-7 has-text-weight-semibold">BPI Savings: </span>
              <span class="is-size-7">3006-0941-693</span>
            </dt>
            <dt class="is-size-6"><span class="is-size-7 has-text-weight-semibold">BDO Savings: </span>
              <span class="is-size-7">0080-8000-16994</span>
            </dt>
          </dl>
          <br>
          <a class="button is-link" href="catalogue.php">Continue shopping</a>
        </div>
      </div>
    </div>
  </section>

<?php

  mysqli_close($conn);

  include 'partials/footer.php';

  include 'partials/foot.php';

?>

</body>
</html>
