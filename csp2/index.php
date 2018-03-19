<?php

  session_start();


  function getTitle() {
    echo 'Your one stop shop for Funko Pops!';
  }

  include 'partials/head.php';

 ?>

</head>
<body>

  <section class="hero is-link is-bg is-fullheight">
    <div class="container">
      <div class="hero-head">

      </div>

      <div class="hero-body">
        <div class="has-text-centered">
          <h1 class="title is-paddingless"><span class="my-title">Pop<span class="">!</span>StopShop</span></h1>
          <h2 class="subtitle is-size-6 has-text-dark">Your one stop shop for Funko Pop!</h2>
          <!-- <figure class="image is-96x96 my-image">
            <img src="assets/img/funko-logo.png">
          </figure> -->
          <a class="button is-link" href="home.php">Start Collecting!</a>
        </div>
        <div id="userFeedback">
        </div>

        <script>
        function notifyIt(msg) {
          var x = document.getElementById("userFeedback")
          x.innerHTML = msg;
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
        </script>

        <?php
        if (isset($_SESSION['feedback_msg'])) {
          echo '
          <script>
          notifyIt("'.$_SESSION['feedback_msg'].'");
          </script>
          ';
          unset($_SESSION['feedback_msg']);
        }
        ?>

      </div>
    </div>
  </section>

<?php

  // include 'partials/footer.php';

  include 'partials/foot.php';

?>

</body>
</html>
