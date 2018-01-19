    <?php

      function getTitle() {
        echo 'User | Welcome to my Web App';
      }

      include 'partials/head.php';

      // get id from query string
      $id = $_GET['id'];

      $file = file_get_contents('assets/users.json');
      $users = json_decode($file, true);

      // get details of current user based on id
      $user = $users[$id];



     ?>
  </head>
  <body>

    <header>
      <?php
        require 'partials/main_navigation.php';
       ?>
    </header> <!-- /.header -->

    <main class="wrapper">
      <h1>User</h1>

      <label>Username</label>
      <input type="text" name="uasername" value="<?php echo $user['username']; ?>">

      <?php
        var_export($user);
       ?>
    </main> <!-- /.wrapper -->

    <footer>
      <?php
        require 'partials/footer.php';
       ?>
    </footer> <!-- /.footer -->

    <?php
      include 'partials/foot.php';
     ?>
