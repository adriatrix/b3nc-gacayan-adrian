<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>PHP Programming - Activities</title>

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <?php

    // for ($x=1;$x<=8;$x++) {
    //   if ($x % 2 == 0) {
    //   for ($y=1;$y<=8;$y++)
    //     if ($y % 2 == 0)
    //       echo "<span class='black-box'></span>";
    //     else
    //       echo "<span class='white-box'></span>";
    //   } else {
    //     for ($y=1;$y<=8;$y++)
    //       if ($y % 2 == 0)
    //         echo "<span class='white-box'></span>";
    //       else
    //         echo "<span class='black-box'></span>";
    //   }
    //   echo "<br>";
    // }

    echo "<br>";

    for ($x=1;$x<=8;$x++) {
      for ($y=1;$y<=8;$y++) {
        $total = $x + $y;
        if ($total % 2 == 0)
          echo "<span class='black-box'></span>";
        else
          echo "<span class='white-box'></span>";
      }
      echo "<br>";
    }

    $a = 1;
    $b = 2;


    echo"Numbers before swap:<br>";
    echo'$a = ' . $a . '<br>';
    echo'$b = ' . $b . '<br>';

    // $c = $a;
    // $a = $b;
    // $b = $a;

    $a = $a + $b; // 3
    $b = $a - $b; // 1
    $a = $a - $b; // 2

    echo"Numbers after swap:<br>";
    echo'$a = ' . $a . '<br>';
    echo'$b = ' . $b . '<br>';


    $colors = ["red", "green", "blue"];
    $arrlength = count($colors);

    for ($x=0;$x<$arrlength;$x++) {
      echo $colors[$x];
    }

    echo "<br>";

    $age = ["Peter"=>"35", "Ben"=>"37", "Joe"=>"43"];

    foreach ($age as $arr_key => $arr_value) {
      echo "Key=" . $arr_key . ", Value=" . $arr_value;
    }

    echo "<br>";

    $team_ironman = ["Ironman","War Machine","Vision"];
    $team_cap = ["Captain America","Winter Soldier","Hawkeye","Falcon"];
    $civil_war =[$team_ironman, $team_cap];

    echo $civil_war[0][0]. "<br>";
    echo $civil_war[1][0]. "<br>";
    echo $civil_war[0][2]. "<br>";
    echo $civil_war[1][1]. "<br>";



    $items = [
      ['product' => 'Lenovo laptop', 'price' => 600.00, 'quantity' => 100],
      ['product' => 'ASUS tablet', 'price' => 100.00, 'quantity' => 10],
      ['product' => 'Acer all-in-one', 'price' => 300.00, 'quantity' => 50],
      ['product' => 'HP laptop', 'price' => 600.00, 'quantity' => 1],
      ['product' => 'Dell desktop', 'price' => 350.00, 'quantity' => 20],
    ];

    ?>

    <ul>
      <?php
      foreach ($items as $item) {
          echo '<li>' . $item['product'] . '</li>';
        }
       ?>
    </ul>
    <ul>
      <?php
      foreach ($items as $prices) {
          echo '<li>' . $prices['price'] . '</li>';
        }
       ?>
    </ul>
    <ul>
      <?php
      foreach ($items as $quantities) {
          echo '<li>' . $quantities['quantity'] . '</li>';
        }
       ?>
    </ul>






  </body>
</html>
