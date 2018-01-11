<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>PHP Programming - Expressions, Control Statements, and Loops</title>

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <?php

      for ($x=1;$x<=10;$x++) {
        echo "$x";
        if ($x!=10)
          echo "-";
      }

      echo "<br>";


      for ($x=1;$x<=10;$x++) {
        for ($y=1;$y<=10;$y++)
          echo "* ";
        echo "<br>";
      }

      echo "<table>";
      for ($row=1;$row<=10;$row++) {
        echo "<tr>";
        for ($col=1;$col<=10;$col++)
          echo "<td>" . $row * $col . "</td>";
          echo "</tr>";
      }
      echo "</table>";

      for ($x=1;$x<=10;$x++) {
        for ($y=1;$y<=$x;$y++)
          echo "* ";
        echo "<br>";
      }

      echo "<br>";

      for ($x=10;$x>=1;$x--) {
        for ($y=1;$y<=$x;$y++)
          echo "* ";
        echo "<br>";
      }


      for ($x=1;$x<=50;$x++) {
          if ($x % 3 == 0)
            echo $x . 'Fizz <br>';
          if ($x % 5 == 0)
            echo $x . 'Buzz <br>';
          if ($x % 3 == 0 && $x % 5 == 0)
            echo $x . 'FizzBuzz <br>';
      }


     ?>


     <!-- <script type="text/javascript">

      disemvowel("Heapy");
      function disemvowel(str) {
       var sln = str.length;
       var newstr = "";

       for (x=1;x<=sln;x++) {
         if (str.substr(x,1)!="a" || str.substr(x,1)=="e" || str.substr(x,1)=="i" || str.substr(x,1)=="o" || str.substr(x,1)=="u") {
           newstr = newstr + str.substr(x,1)
         }
       }
       str = newstr;
       console.log (str);
     }
     </script> -->

  </body>
</html>
