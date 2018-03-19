<?php

  require '../connect.php';

  $query = $_GET['query'];
  $query = htmlspecialchars($query);
  $query = mysqli_real_escape_string($query);
  $raw_results = mysqli_query("SELECT * FROM items WHERE (name LIKE '%".$query."%') OR (description LIKE '%".$query."%')") or die(mysql_error());
  if(mysql_num_rows($raw_results) > 0){
    while($results = mysqli_fetch_array($raw_results)){

      echo "<p><h3>".$results['title']."</h3>".$results['text']."</p>";
    }
  }   else{
    echo "No results";
  }

 ?>
