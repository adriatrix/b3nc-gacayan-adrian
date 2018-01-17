<?php

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
    <h1>Home</h1>
  </main> <!-- /.wrapper -->

<?php

  include 'partials/foot.php';

 ?>
