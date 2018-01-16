<?php
  require_once 'assets/lib/twelve_days.php';
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">

     <title><?php echo getTitle(); ?> Lyrics</title>

     <!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
     <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
     <!-- <div id="top">

       <div class="button">
         <button onclick="SingIt()">SING</button>
       </div> -->

     <?php

      function getVerse($ver) {
        $dverse = getLyrics($ver);
        echo "<div class='foo-".$ver."' id='section-".$ver."'><h2>On the " .$dverse[0]. " day of Christmas, my true love sent to me.. </h2>";
        if ($ver == 0) {
          $gverse = getLyrics(0);
          echo "<h3 class='foo-".$ver."v'>" .ucfirst($gverse[1]). "</h3>";
        } else {
          for ($i=$ver; $i>0; $i--) {
            $gverse = getLyrics($i);
            echo "<h3 class='foo-".$ver."v'>" .ucfirst($gverse[1]). "</h3>";
          }
          $gverse = getLyrics(0);
          echo "<h3 class='foo-".$ver."v'>And " .$gverse[1]. "</h3>";
        }
        echo "</div>";
      }

      for ($j=0; $j < 12 ; $j++) {
        getVerse($j);
      }


      ?>

      <!-- </div> -->
      <script type="text/javascript" src="assets/js/scrollreveal.min.js"></script>
      <script type="text/javascript" src="assets/js/script.js"></script>
   </body>
 </html>
