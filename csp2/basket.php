<?php

  session_start();


  function getTitle() {
    echo 'Basket page';
  }

  include 'partials/head.php';

  require 'connect.php';

 ?>

</head>
<body>

  <?php include 'partials/header.php';


  ?>

  <h1 hidden>Basket Page</h1>

  <div class="container">
    <div class="columns">
      <div class="column is-12">
        <h2 class="title is-3">Shopping Basket</h2>
      </div>
    </div>
    <div class="columns">
      <div class="column is-10 is-offset-1">
        <table class="table is-striped is-hoverable is-fullwidth">
          <thead>
            <tr>
              <td></td>
              <td><strong>Item</strong></td>
              <td class="has-text-centered"><strong>Quantity</strong></td>
              <td class="has-text-right"><strong>Price</strong></td>
              <td class="has-text-right"><strong>Subtotal</strong></td>
            </tr>
          </thead>
          <tbody>

            <img src="" alt="">

          <?php
            $my_basket = $_SESSION['cart'];
            $totalprice = 0;
            $totalqty = 0;


            foreach ($my_basket as $key => $basket) {
              $sql = "SELECT id, image, name, price FROM items WHERE id = '".$key."'";
              $result = mysqli_query($conn, $sql);
              $item = mysqli_fetch_assoc($result);
              extract($item);

              $sub_total = $my_basket[$key] * intval($price);
              $fsub_total = number_format($sub_total,2);

              echo '
              <tr>
              <td>
              <img class="image is-64x64" src="' . $image . '">
              </td>
              <td>"' . $name . '"</td>
              <td>
                <input class="basket-quantity" onchange="updateBasket('.$id.')" min="1" type="number" name="basket-qty" id="basketQuantity'.$id.'" value="'. $my_basket[$key] .'">
              </td>
              <td class="has-text-right">
                <span>PHP </span>
                <input type="number" hidden name="basket-price" id="basketPrice'.$id.'" value="'. $price. '">'. $price. '
              </td>
              <td class="has-text-right">
                <span>PHP </span>
                <span id="subTotal'.$id.'">'. $fsub_total .'</span>
              </td>
              </tr>
              ';
      				$totalqty = $totalqty + $my_basket[$key];
              // var_dump($sub_total,10);
              // var_dump($sub_total);
              // var_dump($sub_total);
              $totalprice = intval($totalprice,10) + intval($sub_total,10);
              // var_dump($totalprice);
            }

            echo '
            </tbody>
            <tfoot>
            <tr>
            <td></td>
            <td><strong>TOTAL</strong></td>
            <td><strong><span id="updateTotalQty">' . $totalqty . '</span></strong></td>
            <td></td>
            <td class="has-text-right"><strong>
            <span>PHP </span>
            <span id="updateTotalPrice">' . number_format($totalprice,2) . '</span>
            </strong></td>
            </tr>
            </tfoot>
            ';
           ?>

        </table>
      </div>
    </div>
  </div>

<?php

  include 'partials/footer.php';

  include 'partials/foot.php';

?>

<script>
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
		// retrieve value of item quantity
		var quantity = $('#basketQuantity' + id).val();
    quantity = parseInt(quantity,10);

		var price = $('#basketPrice' + id).val();
		price = parseInt(price,10);

    var oldsubtotal = $('#subTotal' + id).html();
    oldsubtotal = Number(oldsubtotal.replace(/[^0-9\.-]+/g,""));
    console.log(oldsubtotal);
    // console.log(typeof(oldsubtotal));

		var subtotal = quantity * price;
    console.log(subtotal);
    $('#subTotal' + id).html(parseInt(subtotal).formatMoney(2));

    var total = $('#updateTotalPrice').html();
    if (oldsubtotal > subtotal) {
      total = Number(total.replace(/[^0-9\.-]+/g,"")) - price;
    }

    if (oldsubtotal < subtotal) {
      total = Number(total.replace(/[^0-9\.-]+/g,"")) + price;
      console.log(total);
      console.log(typeof(total));
    }

    // total = total.formatMoney(2);
    $('#updateTotalPrice').html(parseInt(total).formatMoney(2));

		//create a post request to update session cart variable
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

  $(function() {
    $(".basket-quantity").keypress(function(event) {
        if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
            $(".alert").html("Enter only digits!").show().fadeOut(2000);
            return false;
        }
    });
  });

</script>

</body>
</html>
