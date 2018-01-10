<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>PHP Programming - Syntax, Printing, and Variables</title>

    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php

      // Activity 1

      $lyrics = array ('stars', 'shine', 'yellow');

      echo "Look at the <span class='red bold'>$lyrics[0]</span>, Look how they <span class='blue bold'>$lyrics[1]</span> for you, and everything you do. <br>";
      echo "Yeah, they were all <span class='yellow bold'>$lyrics[2]</span>";

      // Activity 2

      ?>

      <ul>
        <li><?php echo$lyrics[0]?></li>
        <li><?php echo$lyrics[1]?></li>
        <li><?php echo$lyrics[2]?></li>
      </ul>

       <!-- Activity 3 -->
      <?php
      $playas = array (
        array ('Steph Curry', 'Warriors', '30'),
        array ('Russell Westbrook', 'Thunders', '0'),
        array ('LeBron James', 'Cavaliers', '23')
      );
      ?>

      <ul class="no-bullet">
        <li>Player: <?php echo $playas[0][0]; ?> <br></li>
        <li>Team: <?php echo $playas[0][1]; ?> <br></li>
        <li>Jersey: <?php echo $playas[0][2]; ?> <br></li>
      </ul>
      <ul class="no-bullet">
        <li>Player: <?php echo $playas[1][0]; ?> <br></li>
        <li>Team: <?php echo $playas[1][1]; ?> <br></li>
        <li>Jersey: <?php echo $playas[1][2]; ?> <br></li>
      </ul>
      <ul class="no-bullet">
        <li>Player: <?php echo $playas[2][0]; ?> <br></li>
        <li>Team: <?php echo $playas[2][1]; ?> <br></li>
        <li>Jersey: <?php echo $playas[2][2]; ?> <br></li>
      </ul>



      <!-- Activity 4 -->

      <table>
        <tr class="bg-black">
          <th>Player</th>
          <th>Team</th>
          <th>Jersey</th>
        </tr>
        <tr>
          <th><?php echo $playas[0][0]; ?></th>
          <th><?php echo $playas[0][1]; ?></th>
          <th><?php echo $playas[0][2]; ?></th>
        </tr>
        <tr>
          <th><?php echo $playas[1][0]; ?></th>
          <th><?php echo $playas[1][1]; ?></th>
          <th><?php echo $playas[1][2]; ?></th>
        </tr>
        <tr>
          <th><?php echo $playas[2][0]; ?></th>
          <th><?php echo $playas[2][1]; ?></th>
          <th><?php echo $playas[2][2]; ?></th>
        </tr>

      </table>

     <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="assets/js/script.js"></script>
  </body>
</html>
