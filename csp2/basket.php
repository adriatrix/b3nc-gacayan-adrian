<?php

  session_start();


  function getTitle() {
    echo 'Shopping Basket';
  }

  include 'partials/head.php';

  require 'connect.php';

 ?>

</head>
<body>

  <?php include 'partials/header.php'; ?>

  <h1 hidden>Basket Page</h1>

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
        <h2 class="is-size-3">YOUR <span class="is-hidden-mobile">SHOPPING</span> BASKET</h2>
      </div>

      <?php
        if (!isset($_SESSION['cart'])) {
          echo '
            <div class="column is-2 has-text-right is-hidden-mobile">
            <a class="button is-large is-info" disabled href="checkout.php">
            <span>Checkout</span>
            <span class="icon">
            <i class="fas fa-angle-right"></i>
            </span>
            </a>
            </div>
            <div class="column is-2 has-text-centered is-hidden-tablet">
            <a class="button is-large is-info" disabled href="checkout.php">
            <span>Checkout</span>
            <span class="icon">
            <i class="fas fa-angle-right"></i>
            </span>
            </a>
            </div>
          ';
        } else {
          if (isset($_SESSION['current_user'])) {
            echo '
              <div class="column is-2 has-text-right is-hidden-mobile">
              <a class="button is-large is-info" href="checkout.php">
              <span>Checkout</span>
              <span class="icon">
              <i class="fas fa-angle-right"></i>
              </span>
              </a>
              </div>
              <div class="column is-2 has-text-centered is-hidden-tablet">
              <a class="button is-large is-info" href="checkout.php">
              <span>Checkout</span>
              <span class="icon">
              <i class="fas fa-angle-right"></i>
              </span>
              </a>
              </div>
            ';
          } else {
            echo '
              <div class="column is-2 has-text-right is-hidden-mobile">
              <a class="button is-large is-info" href="signin.php">
              <span>Sign In</span>
              <span class="icon">
              <i class="fas fa-angle-right"></i>
              </span>
              </a>
              </div>
              <div class="column is-2 has-text-centered is-hidden-tablet">
              <a class="button is-large is-info" href="signin.php">
              <span>Sign In</span>
              <span class="icon">
              <i class="fas fa-angle-right"></i>
              </span>
              </a>
              </div>
            ';
          }
        }
      ?>




    </div>

    <div class="columns is-hidden-mobile">
      <div class="column is-10 is-offset-1">
        <div class="columns is-gapless has-text-grey">
          <div class="column is-7">
            <p class="is-size-6 has-text-weight-bold">PRODUCT</p>
          </div>
          <div class="column is-2">
            <p class="is-size-6 has-text-weight-bold">PRICE</p>
          </div>
          <div class="column is-1">
            <p class="is-size-6 has-text-weight-bold has-text-centered">QTY</p>
          </div>
          <div class="column is-2">
            <p class="is-size-6 has-text-weight-bold has-text-right">SUBTOTAL</p>
          </div>
        </div>
      </div>
    </div>
    <div class="columns">
      <div class="column is-10 is-offset-1">

        <?php

        $totalprice = 0;
        $totalqty = 0;

        if (isset($_SESSION['cart'])) {
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
                <a href="item.php?id='.$id.'">
                  <div class="media">
                    <div class="media-left">
                     <p class="image is-64x64">
                        <img src="' . $image . '">
                     </p>
                    </div>
                    <div class="media-content">
                      <div class="content">
                        <p class="has-text-weight-semibold"> '. $name .'</p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="column is-2">
                <span>PHP </span>
                <input type="number" hidden name="basket-price" id="basketPrice'.$id.'" value="'. $price. '">'. $price. '
                <button class="button is-danger is-outlined is-small is-pulled-right delete-basket-item-modal" data-toggle="modal" data-target="#deleteBasketItemModal'.$key.'" data-index="'.$key.'"><span><i class="fas fa-times"></i></span></button>
              </div>


              <div class="modal" id="deleteBasketItemModal'.$key.'">
                <div class="modal-background"></div>
                <form action="assets/deletingbasketitem.php" method="POST">
                  <div class="modal-card">
                    <input name="item_id" value="'. $key .'" hidden>
                    <div class="modal-card-head">
                      <p class="modal-card-title">'.$name.'</p>
                    </div>
                    <div class="modal-card-body">
                      <p><img class="image is-64x64" src="'. $image .'"> Please confirm deletion of this item from your Shopping Basket. <span class="has-text-warning"><i class="far fa-frown"></i></span></p>
                    </div>
                    <div class="modal-card-foot">
                      <button type="submit" class="button is-success">Confirm</button>
                      <button type="button" class="button is-danger modal-button-close" data-index="'.$key.'">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="column is-2">
                <div class="columns">
                  <div class="column is-10 is-offset-1">
                    <input class="input basket-quantity" onchange="updateBasket('.$id.')" min="0" max="'. $stock .'" type="number" name="basket-qty" id="basketQuantity'.$id.'" value="'. $my_basket[$key] .'" pattern="[^1-9]">
                    <p class="help">stock: <strong id="stockColor'.$id.'">'. $stock .'</strong></p>
                  </div>
                </div>
              </div>

              <div class="column is-2 has-text-right">
                <span class="is-hidden-tablet is-size-7">subtotal:</span>
                <span>PHP </span>
                <span id="subTotal'.$id.'">'. $fsub_total .'</span>
              </div>
            </div>
            <hr>
              ';
              $totalqty = $totalqty + $my_basket[$key];
              $totalprice = intval($totalprice,10) + intval($sub_total,10);
            }
          } else {
            echo '
            <div class="column has-text-centered">
            <em>Your shopping basket is empty!</em>
            </div>
            </div>
            ';
            unset($_SESSION['cart']);
          }
          ?>

        </div>
      </div>
      <div class="columns">
        <div class="column is-10 is-offset-1">
          <div class="columns is-gapless">
            <div class="column is-7 is-hidden-mobile">
              <p class="is-size-6 has-text-weight-bold">TOTAL</p>
            </div>
            <div class="column is-2">
              <span class="is-hidden-tablet is-size-7">total items:</span>
              <span class="is-size-6 has-text-weight-bold"><span id="updateTotalQty"><?php echo ' '. $totalqty .' '; ?></span></span>
            </div>
            <div class="column is-1">
              <p class="is-size-6 has-text-weight-bold"></p>
            </div>
            <div class="column is-2">
              <p class="is-size-6 has-text-weight-bold has-text-right">
                <span class="is-hidden-tablet is-size-7">TOTAL:</span>
                <span>PHP </span>
                <span id="updateTotalPrice"><?php echo ' '. number_format($totalprice,2) .' '; ?></span>
              </p>
            </div>
          </div>
        </div>
      </div>

      <?php
        if (!isset($_SESSION['cart'])) {
          echo '
            <div class="column is-2 has-text-centered is-hidden-tablet">
            <a class="button is-large is-info" disabled href="checkout.php">
            <span>Checkout</span>
            <span class="icon">
            <i class="fas fa-angle-right"></i>
            </span>
            </a>
            </div>
          ';
        } else {
          if (isset($_SESSION['current_user'])) {
            echo '
              <div class="column is-2 has-text-centered is-hidden-tablet">
              <a class="button is-large is-info" href="checkout.php">
              <span>Checkout</span>
              <span class="icon">
              <i class="fas fa-angle-right"></i>
              </span>
              </a>
              </div>
            ';
          } else {
            echo '
              <div class="column is-2 has-text-centered is-hidden-tablet">
              <a class="button is-large is-info" href="signin.php">
              <span>Sign In</span>
              <span class="icon">
              <i class="fas fa-angle-right"></i>
              </span>
              </a>
              </div>
            ';
          }
        }
      ?>

    </div>


<?php

  include 'partials/footer.php';

  include 'partials/foot.php';

?>

<script>

  var basketItemId = 0;

  $(".delete-basket-item-modal").click(function() {
    basketItemId = $(this).data('index');
    console.log(basketItemId);
    $("#deleteBasketItemModal" + basketItemId).addClass("is-active");
  });

  $(".modal-button-close").click(function() {
    basketItemId = $(this).data('index');
    // console.log(basketItemId);
    $("#deleteBasketItemModal" + basketItemId).removeClass("is-active");
  });


  // currency formatter from Patrick Desjardins at stackoverflow
  Number.prototype.formatMoney = function(c, d, t){
  var n = this,
      c = isNaN(c = Math.abs(c)) ? 2 : c,
      d = d == undefined ? "." : d,
      t = t == undefined ? "," : t,
      s = n < 0 ? "-" : "",
      i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
      j = (j = i.length) > 3 ? j % 3 : 0;
     return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
   };

	function updateBasket(itemId) {
		var id = itemId;

		var quantity = $('#basketQuantity' + id).val();
    quantity = parseInt(quantity,10);

    var maxstock = $('#basketQuantity' + id).attr("max");
    maxstock = parseInt(maxstock,10);

		var price = $('#basketPrice' + id).val();
		price = parseInt(price,10);

    var oldsubtotal = $('#subTotal' + id).html();
    oldsubtotal = Number(oldsubtotal.replace(/[^0-9\.-]+/g,""));
    console.log(oldsubtotal);

		var subtotal = quantity * price;
    $('#subTotal' + id).html(parseInt(subtotal).formatMoney(2));
    console.log(subtotal);

    var subtotaldiff = subtotal-oldsubtotal;
    console.log(subtotaldiff);

    var total = $('#updateTotalPrice').html();
    total = Number(total.replace(/[^0-9\.-]+/g,"")) + subtotaldiff;
    total = parseInt(total).formatMoney(2)

    $('#updateTotalPrice').html(total);


    if (quantity > maxstock){
      // alert("No numbers above stock");
      $('#basketQuantity' + id).css('color','red');
      $('#stockColor' + id).css('color','red');
      $('#basketQuantity' + id).val($('#basketQuantity' + id).attr("max"));
      quantity = $('#basketQuantity' + id).val();
      quantity = parseInt(quantity,10);
    } else {
      $('#basketQuantity' + id).css('color','black');
      $('#stockColor' + id).css('color','black');
    }

		//create a post request to update session cart variables
		$.post('assets/add_to_basket.php',
		{
			item_id: id,
			item_quantity: quantity
		},
		function(data, status) {
			$('.my-badge').html(data);
      $('#updateTotalQty').html(data);
			// console.log(data);

		});
	}

  // $(function() {
  //   $(".basket-quantity").keypress(function(event) {
  //       if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
  //           $(".alert").html("Enter only digits!").show().fadeOut(2000);
  //           return false;
  //       }
  //   });
  // });

  // $('.basket-quantity').keyup(function(){
  // if ($(this).val() > $(this).attr("max")){
  //   // alert("No numbers above stock");
  //   $(this).css('color','red');
  //   $('.stockcolor').css('color','red');
  //   $(this).val($(this).attr("max"));
  // } else {
  //   $(this).css('color','black');
  //   $('.stockcolor').css('color','black');
  // }
  // });

</script>

</body>
</html>
