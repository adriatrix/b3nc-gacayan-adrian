<?php

  require '../connect.php';

  $email = $_POST['email'];

  if(isset($_POST) & !empty($_POST)){
	$email_entered = mysqli_real_escape_string($conn, $email);

    if($email_entered) {
      $sql = "select * from users WHERE email='$email'";
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
