<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>PHP Programming - Expressions, Control Statements, and Loops</title>

    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php

    // Logical Operator
    // AND -> &&, OR -> ||, XOR -> wala, NOT -> !

    $a = 1;
    $b = 0;

    //echo ($a AND $b) '<br'; // NULL
    //echo ($a OR $b) '<br'; // TRUE
    //echo ($a XOR $b) '<br'; // TRUE
    //echo (!$a) '<br'; // TRUE

    // bmi = mass(kg) / height * height (m);
    //
    // result:
    //   00 - 16 = severe thinness
    //   16 - 17 = moderate thinness
    //   17 - 18.5 = mild thinness
    //   18.5 - 25 = normal
    //   25 - 30 = obese class 1
    //   35 - 40 = obese class 2
    //   > 40 = class 3
    //

    $mass = 72; //kg
    $height = 1.7; // m

    $bmi = $mass / ($height * $height);

    echo 'Your BMI is ' . $bmi . '<br>';

    if ($bmi < 16)
      echo 'Result: Severe Thinness';
    else if ($bmi >= 16 AND $bmi <= 17)
      echo 'Result: Moderate Thinness';
    else if ($bmi > 17 AND $bmi <= 18.5)
      echo 'Result: Mild Thinness';
    else if ($bmi >18.5 and $bmi <= 25)
      echo 'Result: Normal';
    else if ($bmi >25 and $bmi <= 30)
      echo 'Result: Overweight';
    else if ($bmi >30 and $bmi <= 35)
      echo 'Result: Obese Class 1';
    else if ($bmi >35 and $bmi <= 40)
      echo 'Result: Obese Class 2';
    else
      echo 'Result: Obese Class 3';


    echo '<br>';

    // switch ($bmi) {
    //   case $bmi < 16:
    //     echo 'Result: Severe Thinness';
    //     break;
    //   case $bmi >= 16 AND $bmi <= 17
    //     echo 'Result: Moderate Thinness';
    //     break;
    //   case $bmi > 17 AND $bmi <= 18.5
    //     echo 'Result: Mild Thinness';
    //     break;
    //   case $bmi >18.5 and $bmi <= 25
    //     echo 'Result: Normal';
    //     break;
    //   case $bmi >25 and $bmi <= 30
    //     echo 'Result: Overweight';
    //     break;
    //   case $bmi >30 and $bmi <= 35
    //     echo 'Result: Obese Class 1';
    //     break;
    //   case $bmi >35 and $bmi <= 40
    //     echo 'Result: Obese Class 2';
    //     break;
    //   case $bmi > 40
    //     echo 'Result: Obese Class 3';
    //     break;
    //   default:
    //     break;
    // }

    $number = 1;

    while ($number <= 10) {
      echo $number . ' ';
      $number = $number + 1;
    }

      echo '<br>';

    $count = 0;

    do {
      echo $count . ' ';
        $count = $count + 2;
    } while ($count <= 12);

      echo '<br>';

    $name = 'Adrian';

    for ($x = 1; $x <= 10; $x++) {
    echo "The number is: $x <br>";
}

    // for ($counter=1;$counter <=10; $counter++) {
    //     echo $name . ' ';
    //   }

     ?>

  </body>
</html>
