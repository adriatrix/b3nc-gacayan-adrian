<?php

  session_start();


  function getTitle() {
    echo 'Order Details';
  }

  include 'partials/head.php';

  require 'connect.php';

 ?>

</head>
<body>

  <?php include 'partials/header.php';

   if (isset($_SESSION['current_user']) ) {
    $user_name = $_SESSION['current_user'];
   }

   $o_id = $_GET['id'];

   $sql = "SELECT * FROM orders WHERE (id = '$o_id')";
   $orders = mysqli_query($conn, $sql);
   $order = mysqli_fetch_assoc($orders);
   extract($order);


  ?>

  <h1 hidden>Order Details Page</h1>

  <div class="container box">
    <div class="columns">
      <div class="column is-8">
        <h2 class="is-size-3">Order Details for <?php echo'<strong>'.$reference_num.'</strong>'; ?></h2>
      </div>
      <div class="column is-3 has-text-right">
        <form action="assets/updatingorder.php" method="POST">
          <input name="order_id" value="<?php echo $o_id ?>" hidden>
          <?php
          if ($_SESSION['current_user'] == 'admin') {
            echo '
            <div class="field has-addons">
            <div class="control is-expanded">
            <div class="select is-fullwidth">
            <select name="order-status">
            ';

            $sql = "SELECT * FROM order_status";
            $order_stati = mysqli_query($conn, $sql);
            while ($order_statuses = mysqli_fetch_assoc($order_stati)) {
              extract($order_statuses);
              if ($order_status_id == $id) {
                echo '
                <option value ="'.$status.'" selected>'.$status.'</option>
                ';
              } else {
                echo '
                <option value ="'.$status.'">'.$status.'</option>
                ';
              }
            }

            echo '
            </select>
            </div>
            </div>
            <div class="control">
            <button type="submit" class="button is-primary">Update</button>
            </div>
            </div>
            ';
          }
          ?>
        </form>
      </div>
      <div class="column is-1">
        <a href="profile.php">
          <button class="button is-dark is-outlined">Back</button>
        </a>
      </div>
    </div>

    <div class="columns">
      <div class="column is-4 box is-radiusless">
        <div class="columns">
          <div class="column">
            <p class="is-size-6 box"><span class="is-size-4">1. </span><span>Shipping address</span></p>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <table class="table is-bordered is-striped is-fullwidth">
              <tbody>
                <?php
                  $sql = "SELECT * FROM users WHERE (id = '$user_id')";
                  $users = mysqli_query($conn, $sql);
                  while ($user = mysqli_fetch_assoc($users)) {
                    extract($user);
                    echo '
                      <tr>
                      <td>Name:</td>
                      <td>'. $firstname .' '. $lastname .'</td>
                      </tr>
                      <tr>
                      <td>Email:</td>
                      <td>'. $email . '</td>
                      </tr>
                      <tr>
                      <td>Contact:</td>
                      <td>'. $contact_num . '</td>
                      </tr>
                      <tr>
                      <td>Address 1:</td>
                      <td>' . $address1 . '</td>
                      </tr>
                      <tr>
                      <td>Address 2:</td>
                      <td>'. $address2 . '</td>
                      </tr>
                      <tr>
                      <td>City:</td>
                      <td>'. $city . '</td>
                      </tr>
                      <tr>
                      <td>Zip code:</td>
                      <td>'. $zipcode . '</td>
                      </tr>
                    ';
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="column is-4">
        <div class="columns">
          <div class="column">
            <p class="is-size-6 box"><span class="is-size-4">2. </span><span>Shipping Method</span></p>
            <div class="control">
              <label class="radio">

                <?php
                  if ($ship_method == 'local') {
                    echo '
                      <input type="radio" name="shipping" value = "meetup" disabled>
                      <span class="has-text-weight-semibold has-text-grey">Scheduled Meetup</span>
                      </label>
                      <span class="is-size-6 is-pulled-right"><strong> PHP 0.00</strong></span>
                      <br>
                      <br>
                      <label class="radio">
                      <input type="radio" name="shipping" value = "local" checked disabled>
                      <span class="has-text-weight-semibold has-text-info">Local Shipping</span>
                      </label>
                    ';
                  } else {
                    echo '
                    <input type="radio" name="shipping" value = "meetup" checked disabled>
                    <span class="has-text-weight-semibold has-text-info">Scheduled Meetup</span>
                    </label>
                    <span class="is-size-6 is-pulled-right"><strong> PHP 0.00</strong></span>
                    <br>
                    <br>
                    <label class="radio">
                    <input type="radio" name="shipping" value = "local" disabled>
                    <span class="has-text-weight-semibold has-text-grey">Local Shipping</span>
                    </label>
                    ';
                  }

                 ?>

              <span class="is-size-6 is-pulled-right"><strong> PHP 150.00</strong></span>
            </div>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <p class="is-size-6 box"><span class="is-size-4">3. </span><span>Payment Method</span></p>
            <div class="control">
              <label class="radio">
                <input type="radio" name="payment" checked disabled>
                <span class="has-text-weight-semibold has-text-info">Direct Bank Transfer</span>
              </label>
              <p class="is-size-7 has-text-justified">
                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
              </p>
              <br>
              <br>
              <label class="radio">
                <input type="radio" name="payment" disabled>
                <span class="has-text-weight-semibold has-text-grey">Paypal</span>
              </label>
              <p class="is-size-7 has-text-justified">
                We are still in the process of adding this feature to our site. Stay tune for more updates.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="column is-4 box is-radiusless">
        <div class="columns">
          <div class="column is-12">
            <p class="is-size-6 box"><span class="is-size-4">4. </span><span>Ordered Items</span>
            </p>
            <?php
            $totalprice = 0;
            $totalqty = 0;

            $sql = "SELECT * FROM order_details WHERE (order_id = '$o_id')";
            // var_dump($sql);
            $order_details = mysqli_query($conn, $sql);

            while ($order_detail = mysqli_fetch_assoc($order_details)) {
              extract($order_detail);

              $sql = "SELECT id, image, name FROM items WHERE id = '".$item_id."'";
              $items = mysqli_query($conn, $sql);
              $item = mysqli_fetch_assoc($items);
              extract($item);

              $fsub_total = number_format($subtotal,2);

              echo '
              <div class="columns is-gapless">
                <div class="column">
                  <div class="media">
                    <div class="media-left">
                      <p class="image is-64x64">
                        <img src="' . $image . '">
                      </p>
                    </div>
                    <div class="media-content">
                      <div class="content">
                        <p><span class="is-size-6 has-text-weight-semibold has-text-info">'. $name .'</span>
                        <br>
                        <span class="is-size-7"> qty:<strong class="is-size-6"> '. $quantity .'</strong></span>
                        <span class="is-size-6 is-pulled-right">subtotal:<strong> PHP '. $fsub_total .'</strong></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <hr>
            ';
            $totalqty = $totalqty + $quantity;
            $totalprice = intval($totalprice,10) + intval($subtotal,10);
          }
          ?>
          </div>
        </div>
        <?php
          if ($ship_method == 'local') {
            $totalprice = intval($totalprice,10) + 150;
            echo '
              <div class="ship-charge">
              <div class="columns">
              <div class="column">
              <small>Local Shipping</small><span class="is-size-6 is-pulled-right"><strong> PHP 150.00</strong></span>
              </div>
              </div>
              </div>
            ';
          }
         ?>
        <div class="columns">
          <div class="column">
            <strong>TOTAL</strong><span class="is-size-6 is-pulled-right"><strong> PHP <span class="update-total-price"><?php echo ' '. number_format($totalprice,2) .' '; ?></span></strong></span>
          </div>
        </div>
      </div>
    </div>
    <div class="column is-2 has-text-centered is-hidden-tablet">
      <input class="button is-large is-info" type="submit" name="submit" value="Place Order">
    </div>
  </div>



<?php

  include 'partials/footer.php';

  include 'partials/foot.php';

?>

</body>
</html>
