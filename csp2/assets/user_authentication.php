<?php

  require '../connect.php';

  $username = $_POST['username'];

  if(isset($_POST) & !empty($_POST)){
	$username_entered = mysqli_real_escape_string($conn, $username);

    if($username_entered) {
      $sql = "select * from users WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result);
      if($count == 1){
        echo '<span class="icon is-right has-text-danger"><i class="fas fa-times"></i></span>';
      }else{
        echo '<span class="icon is-right has-text-success"><i class="fas fa-check"></i></span>';
      }
    } else echo '';
  }


mysqli_close($conn);
