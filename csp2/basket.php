<?php

  session_start();


  function getTitle() {
    echo 'Basket page';
  }

  include 'partials/head.php';

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
        <table class="table is-bordered">
          <thead>
            <tr>
              <td>Item Name</td>
              <td>Quantity</td>
              <td>Price</td>
              <td>Subtotal</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>' . $name . '</td>
              <td>' . $quantity . '</td>
              <td>' . $price . '</td>
              <td>' . $subtotal . '</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php

  include 'partials/footer.php';

  include 'partials/foot.php';

?>

</body>
</html>
