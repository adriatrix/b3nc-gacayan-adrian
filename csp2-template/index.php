    <?php

      function getTitle() {
        echo 'Index | Welcome to my Web App';
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
      <h1>Index</h1>
    </main> <!-- /.wrapper -->

    <footer>

    </footer> <!-- /.footer -->

    <?php

      include 'partials/foot.php';

     ?>
