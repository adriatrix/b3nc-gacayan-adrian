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

     <link rel="stylesheet" href="css/style.css">
   </head>
   <body>

     <button type="button" name="button" onclick="function singIt()">Sing It!!</button>
     <br>

     <?php


      function getVerse($ver) {
        $dverse = getLyrics($ver);
        echo "On the " .$dverse[0]. " day of Christmas, my true love sent to me... <br>";
        for ($i=$ver; $i>=0; $i--) {
          $gverse = getLyrics($i);
          echo "" .$gverse[1]. "<br>";
        }
      }

      for ($j=0; $j < 12 ; $j++) {
        getVerse($j);
      }


      ?>

      <script type="text/javascript" src="assets/js/script.js"></script>
   </body>
 </html>
