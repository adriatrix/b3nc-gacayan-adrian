<?php

  function getTitle() {
    echo 'Welcome to my page';
  }

  include 'partials/head.php';
 ?>

  </head>
  <body>

    <?php
      include 'partials/main_header.php';
     ?>

     <main class="wrapper">
       <h1>Index</h1>
     </main> <!-- /.wrapper -->

     <footer class="footer">
       <?php
        include 'partials/main_footer.php';
       ?>
     </footer>

     <?php
       include 'partials/foot.php';
     ?>
