<?php

  include_once 'assets/lib/hello_world.php';
  require_once 'assets/lib/a_simple_require_file.php';

  // prints a 2x3 table

  function printTable ($rows, $cols) {
    echo "<table border=1>";

    for ($i=0; $i<$rows; $i++) {
      echo "<tr>";
      for ($j=0; $j<$cols; $j++) {
        echo "<td> Content </td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  }


  function add($a,$b) {
    $sum = $a+$b;
    return $sum;
  }


  function longdate($timestamp) {
    return date ("l F jS Y", $timestamp);
  }


  function lowerCase($n) {
    $n = ucfirst(strtolower($n));
    return $n;
  }

  $a1 = "BILLY";
  $a2 = "peejay";
  $a3 = "aLLaN";

  function fixNames() {
    global $a1; $a1 = ucfirst(strtolower($a1));
    global $a2; $a2 = ucfirst(strtolower($a2));
    global $a3; $a3 = ucfirst(strtolower($a3));
  }

  function multiply($a,$b) {
    $multiply = $a*$b;
    return $multiply;
  }

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>PHP Programming - Functions</title>

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <?php
      printTable(1,-6);
      echo"<br>";
      printTable(3,5);

    echo "<br>";

    echo"<h4>Total is " . add(20, 30) . "</h4>";

    echo "<br>";

    echo "<h4> Date today is " . longdate(time()) . "</h4>";

    echo "<h4> Capitalized name: " . lowerCase("ADRIAN") . "</h4>";

    echo "<h4> Original Names: ". $a1 ." ". $a2 ." ". $a3 ."</h4>";
    fixNames();
    echo "<h4> Fixed Names: ". $a1 ." ". $a2 ." ". $a3 ."</h4>";

    echo"<h4>Area of a 20m by 30m rectangle is " . multiply(20, 30) . "m</h4>";

    iAmRequired();

    ?>
  </body>
</html>
