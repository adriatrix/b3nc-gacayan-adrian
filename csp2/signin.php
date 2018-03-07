<?php

session_start();

function getTitle() {
  echo 'Sign In to Pop! Stop PH';
}

include 'partials/head.php';

// var_dump($_SESSION['feedback_msg']);



?>

</head>
<body>

<?php require 'partials/header.php'; ?>



<h1 hidden>Sign In Page</h1>

  <section class="hero">
    <div class="hero-body">
      <div class="container">
        <div class="columns">
          <div class="column is-4 is-offset-4">
            <h3 class="title has-text-grey has-text-centered">Sign In to Pop! Stop PH</h3>
            <div class="box">
              <form id="loginForm" method="POST" action="assets/signingin.php">
                <div class="field">
                  <div class="control">
                    <input class="input" name="username" id="username" type="text" placeholder="Your Username" autofocus="" required>
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <input class="input" name="password" id="password" type="password" placeholder="Your Password" required>
                  </div>
                </div>
                <div class="field">
                  <label class="checkbox">
                    <input type="checkbox">
                    Remember me
                  </label>
                </div>
                <button class="button is-block is-info is-fullwidth">Login</button>
              </form>
            </div>
          <div class="box">
            <p>New to Pop! Stop PH? <a href="signup.php">Create an account</a>.</p>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php

include 'partials/footer.php';

include 'partials/foot.php';

?>

</body>
</html>
