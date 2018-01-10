<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>PHP Programming - Expressions</title>

    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php

    // Assignment

    // $companyName = "";
    // $companyName = "Tuitt Coding Bootcamp";
    //
    // echo $companyName;

    // $counter = 0;
    //
    // echo $counter;
    // echo "<br>";
    //
    // // $counter = $counter + 150;
    // $counter += 230; //shorthand
    //
    // echo $counter;

    // $counter = 15;
    //
    // echo $counter . "<br>";
    //
    // $counter = $counter + 5;
    //
    // echo $counter . "<br>";
    //
    // $counter = $counter - 3;
    //
    // echo $counter . "<br>";
    //
    // $counter = $counter * 8;
    //
    // echo $counter . "<br>";
    //
    // $counter = $counter / 16;
    //
    // echo $counter . "<br>";
    //
    // $counter = $counter % 4;
    //
    // echo $counter . "<br>";

    // BEDMAS or PEMDAS

    // Braces/Parenthesis, Division/Multiplication, Addition/Substraction.

    // $bankBalance = 100;
    // $deposit = 1000;
    //
    // if ($bankBalance <100)
    //   $bankBalance = $bankBalance + $deposit;
    // else
    //   echo "Your bank balance is greater then 100";
    //
    // echo "<br> $bankBalance";

    // $userName = "juandelacruz@yahoo.com";
    // $passWord = "";
    //
    // if ($userName == "admin") {
    //   echo "Username: ADMIN";
    // } else {
    //   echo "Username: $userName";
    // }


    $firstNumber = 1;
    $secondNumber = 2;

    if ($firstNumber > $secondNumber) {
      echo "$firstNumber is greater than $secondNumber";
    }

    if ($firstNumber < $secondNumber) {
      echo "$firstNumber is less  than $secondNumber";
    }

    if ($firstNumber >= $secondNumber) {
      echo "$firstNumber is greater or equal to than $secondNumber";
    }

    if ($firstNumber <= $secondNumber) {
      echo "$firstNumber is less or equal to than $secondNumber";
    }

    ?>


    <!-- <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script> -->
  </body>
</html>
