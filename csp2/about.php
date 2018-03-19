<?php

  session_start();


  function getTitle() {
    echo 'About';
  }

  include 'partials/head.php';

 ?>

</head>
<body>

  <?php include 'partials/header.php';?>


  <section class="section">
    <div class="container">
      <h1 class="title">About Pop!StopShop</h1>
      <h2 class="subtitle"><strong>Pop!StopShop</strong> is a project on real-world implementation of an E-Commerce website.</h2>

      <h6 class="is-size-6">Disclaimer: No copyright infringement is intended. This website was created only for educational purposes and not for profit. Some asset/s used are not owned by the developer/s unless otherwise stated; full credit goes to the owner. </h6>
    </div>
  </section>

<?php

  include 'partials/footer.php';

  include 'partials/foot.php';

?>

</body>
</html>
