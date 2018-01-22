<?php

  function getTitle() {
    echo 'Login';
  }

  include 'partials/head.php';
 ?>

  </head>
  <body>

    <?php
      include 'partials/main_header.php';
     ?>

     <main class="wrapper">

       <h1>Log In</h1>

       <form method="POST" action="authenticate.php">
         <label>Username: </label>
         <input type="text" name="username" id="username" placeholder="Username">

         <label>Password: </label>
         <input type="password" name="password" id="password" placeholder="Password">

         <input type="submit" name="submit" value="Log In">
       </form>
     </main> <!-- /.wrapper -->

     <footer class="footer">
       <?php
        include 'partials/main_footer.php';
       ?>
     </footer>

     <?php
       include 'partials/foot.php';
     ?>
