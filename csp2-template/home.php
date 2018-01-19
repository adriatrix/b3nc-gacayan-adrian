<?php

  session_start();

  function getTitle() {
    echo 'Home | my Web App';
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
    <!-- user feedback -->
    <p><?php if (isset($_SESSION['current_user'])) echo $_SESSION['message']; ?></p>
    <h1>Home</h1>
    <h3>Welcome <?php if (isset($_SESSION['current_user'])) echo $_SESSION['current_user']; ?></h3>
  </main> <!-- /.wrapper -->

  <footer>
    <?php
    include 'partials/footer.php';
     ?>
  </footer>

<?php

  include 'partials/foot.php';

 ?>
