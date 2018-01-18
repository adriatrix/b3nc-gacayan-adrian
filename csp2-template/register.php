    <?php

      function getTitle() {
        echo 'Register | Welcome to my Web App';
      }

      include 'partials/head.php';

     ?>
  </head>
  <body>

    <header>
      <?php
        require 'partials/main_navigation.php';
       ?>
    </header> <!-- /.header -->

    <main class="wrapper">
      <h1>Register</h1>

      <form method="POST" action="registration.php">
        <label>Username: </label>
        <input type="text" name="username" id="username" placeholder="Username">

        <label>Password: </label>
        <input type="password" name="password" id="password" placeholder="Password">

        <label>Confirm Password: </label>
        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">

        <input type="submit" name="submit" value="Register">
      </form>
    </main> <!-- /.wrapper -->

    <footer>
      <?php
        require 'partials/footer.php';
       ?>
    </footer> <!-- /.footer -->

    <?php
      include 'partials/foot.php';
     ?>
