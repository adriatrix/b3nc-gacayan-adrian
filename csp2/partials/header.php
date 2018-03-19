<nav class="navbar is-link is-fixed-top">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="index.php">
        <img src="assets/img/logo.png" alt="Logo">
      </a>
      <?php
      if(isset($_SESSION['current_user'])) {
        echo'
        <div class="navbar-item is-hidden-desktop is-pulled-left">
        <div class="field is-grouped">
        <a class="button is-inverted is-info" href="profile.php">
        <span class="icon">
        <i class="fas fa-user"></i>
        </span>
        <span>' . ucfirst($_SESSION['current_user']) . '</span>
        </a>
        <a class="button is-danger" href="signout.php">
        <span class="icon">
        <i class="fas fa-sign-out-alt"></i>
        </span>
        </a>
        </div>
        </div>
        ';
      } else {
        echo '
        <div class="navbar-item is-hidden-desktop">
        <div class="field is-grouped is-outlined">
        <p class="control">
        <a class="button is-primary is-inverted" href="signin.php">
        <strong>Sign In</strong>
        </a>
        </p>
        </div>
        </div>
        ';
      }
      ?>
      <span class="navbar-item is-hidden-desktop is-pulled-right">
        <a class="button is-white is-outlined" href="basket.php">
          <span class="icon">
            <i class="fas fa-shopping-basket"></i>
          </span>
          <span></span>
          <span id="basket-badge">
            <span class="my-badge">
              <?php
              if (isset($_SESSION['basket_count'])) {
                echo '
                '.$_SESSION['basket_count'].'
                ';
              }
              ?>
            </span>
          </span>
        </a>
      </span>
      <span class="navbar-burger burger" data-target="navbarMenu">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </div>




    <div id="navbarMenu" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="home.php">Home</a>
        <a class="navbar-item" href="catalogue.php">Shop</a>
        <a class="navbar-item" href="about.php">About</a>

        <?php

        if (isset($_SESSION['current_user'])) {
          if ($_SESSION['current_user'] == 'admin') {
            echo '
            <a class="navbar-item" href="accounts.php">Accounts</a>
            ';
          }
        }

        ?>
      </div>
      <div class="navbar-end">
        <?php
        if(isset($_SESSION['current_user'])) {
          echo'
          <div class="navbar-item is-hidden-mobile">
          <div class="field is-grouped">
          <a class="button is-inverted is-info" href="profile.php">
          <span class="icon">
          <i class="fas fa-user"></i>
          </span>
          <span>' . ucfirst($_SESSION['current_user']) . '</span>
          </a>
          <a class="button is-danger" href="signout.php">
          <span class="icon">
          <i class="fas fa-sign-out-alt"></i>
          </span>
          </a>
          </div>
          </div>
          ';
        } else {
          echo '
          <div class="navbar-item is-hidden-mobile">
            <div class="field is-grouped is-outlined">
              <p class="control">
                <a class="button is-primary is-inverted" href="signin.php">
                  <strong>Sign In</strong>
                </a>
              </p>
              <p class="control has-text-white">or</p>
              <p class="control">
                <a class="button is-primary" href="signup.php">
                  <strong>Sign Up</strong>
                </a>
              </p>
            </div>
          </div>
          ';
        }
        ?>
        <span class="navbar-item is-hidden-mobile">
          <a class="button is-white is-outlined is-small" href="basket.php">
            <span class="icon">
              <i class="fas fa-shopping-basket"></i>
            </span>
            <span>Shopping Basket</span>
            <span id="basket-badge">
              <span class="my-badge">
                <?php
                if (isset($_SESSION['basket_count'])) {
                  echo '
                  '.$_SESSION['basket_count'].'
                  ';
                }
                ?>
              </span>
            </span>
          </a>
        </span>
      </div>
    </div>
  </div>
</nav>


<section class="hero is-link is-bg is-medium">
  <div class="container">
    <div class="hero-head">

    </div>

    <div class="hero-body">
      <div class="has-text-centered my-image-relative">
        <h1 class="title is-paddingless"><span class="my-title">Pop<span class="">!</span>StopShop</span></h1>
        <h2 class="subtitle is-size-6 has-text-dark">Your one stop shop for Funko Pops!</h2>
        <!-- <figure class="image is-96x96 my-image">
          <img src="assets/img/funko-logo.png">
        </figure> -->
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
