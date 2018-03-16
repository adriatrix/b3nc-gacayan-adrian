<?php

  session_start();


  function getTitle() {
    echo 'Checkout page';
  }

  include 'partials/head.php';

  require 'connect.php';

 ?>

</head>
<body>

  <?php include 'partials/header.php';



   if (!isset($_SESSION['current_user']) ) {
     $_SESSION['feedback_msg'] = "Please sign in first";
     header('location: signin.php');
   }

   if (!isset($_SESSION['cart']) ) {
     $_SESSION['feedback_msg'] = "You have an empty basket";
     header('location: catalogue.php');
   }

   if (isset($_SESSION['current_user']) ) {
    $user_name = $_SESSION['current_user'];
   }

   $sql = "SELECT * FROM users WHERE (username = '$user_name')";
   $users = mysqli_query($conn, $sql);

  ?>

  <h1 hidden>Checkout Page</h1>

  <div class="container box">

    <div class="columns">
      <div class="column is-2 is-hidden-mobile">
        <a class="button is-large is-info" href="catalogue.php">
          <span class="icon">
            <i class="fas fa-angle-left"></i>
          </span>
          <span>Back to Shop</span>
        </a>
      </div>
      <div class="column is-8 has-text-centered">
        <h2 class="is-size-3">CHECKOUT </h2>
        <span class="is-size-7">Please enter your details below to complete your purchase...</span>
      </div>
      <div class="column is-2 has-text-right is-hidden-mobile">
        <a class="button is-large is-info" href="placeorder.php">
          <span>Place Order</span>
          <span class="icon">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
      <div class="column is-2 has-text-centered is-hidden-tablet">
        <a class="button is-large is-info" href="placeorder.php">
          <span>Place Order</span>
          <span class="icon">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>

    <div class="columns">
      <div class="column is-4 box is-radiusless">
        <div class="columns">
          <div class="column">
            <p class="is-size-6 box"><span class="is-size-4">1. </span><span>Shipping address</span></p>
            <p class="has-text-justified">
              Confirm your address details below. If incorrect or incomplete, kindly update in your Profile page. Click <a href="profile.php">here</a>.
            </p>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <table class="table is-bordered is-striped is-fullwidth">
              <tbody>
                <?php
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
                <input type="radio" name="shipping" checked>
                <span class="has-text-weight-semibold has-text-info">Scheduled Meetup</span>
              </label>
                <span class="is-size-6 is-pulled-right"><strong> PHP 0.00</strong></span>
              <br>
              <label class="radio">
                <input type="radio" name="shipping">
              <span class="has-text-weight-semibold has-text-info">Local Shipping</span>
            </label>
              <span class="is-size-6 is-pulled-right"><strong> PHP 150.00</strong></span>
            </div>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <p class="is-size-6 box"><span class="is-size-4">3. </span><span>Payment Method</span></p>
            <div class="control">
              <label class="radio">
                <input type="radio" name="payment" checked>
                <span class="has-text-weight-semibold has-text-info">Direct Bank Transfer</span>
                <p class="has-text-justified">
                  Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                </p>
              </label>
              <br>
              <label class="radio">
                <input type="radio" name="payment" disabled>
                <span class="has-text-weight-semibold has-text-info">Paypal</span>
                <p class="has-text-justified">
                  We are still in the process of adding this feature to our site. Stay tune for more updates.
                </p>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="column is-4 box is-radiusless">
        <div class="columns">
          <div class="column is-12">
            <p class="is-size-6 box"><span class="is-size-4">4. </span><span>Review Order</span></p>
            <?php
            $totalprice = 0;
            $totalqty = 0;
            $my_basket = $_SESSION['cart'];

            foreach ($my_basket as $key => $basket) {
              $sql = "SELECT id, image, name, price, stock FROM items WHERE id = '".$key."'";
              $result = mysqli_query($conn, $sql);
              $item = mysqli_fetch_assoc($result);
              extract($item);

              if($my_basket[$key] == 0 || is_nan($my_basket[$key])) {
                $my_basket[$key] = 1;
              }

              $sub_total = $my_basket[$key] * intval($price);
              $fsub_total = number_format($sub_total,2);

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
                        <span class="is-size-7"> qty:<strong class="is-size-6"> '. $my_basket[$key] .'</strong></span>
                        <span class="is-size-6 is-pulled-right">subtotal:<strong> PHP '. $fsub_total .'</strong></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <hr>
            ';
            $totalqty = $totalqty + $my_basket[$key];
            $totalprice = intval($totalprice,10) + intval($sub_total,10);
          }
          ?>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <strong>TOTAL</strong><span class="is-size-6 is-pulled-right"><strong> PHP <?php echo ' '. number_format($totalprice,2) .' '; ?></strong></span>
          </div>
        </div>
      </div>
    </div>
    <div class="column is-2 has-text-centered is-hidden-tablet">
      <a class="button is-large is-info" href="placeorder.php">
        <span>Place Order</span>
        <span class="icon">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>

  </div>



<?php

  include 'partials/footer.php';

  include 'partials/foot.php';

?>

<script>


</script>

</body>
</html>