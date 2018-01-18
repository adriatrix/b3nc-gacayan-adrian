    <?php

      function getTitle() {
        echo 'Catalog | Welcome to my Web App';
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
      <h1>Catalog</h1>
    </main> <!-- /.wrapper -->

    <footer>
      <?php
        require 'partials/footer.php';
       ?>
    </footer> <!-- /.footer -->

    <?php
      include 'partials/foot.php';
     ?>
