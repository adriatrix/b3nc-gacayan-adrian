<?php
  require '../connect.php';

  $id = $_GET['id'];

  // echo $id;

  $sql = "select * from users where id = '$id'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($result);
  extract($user);


  // $file = file_get_contents('users.json');
  // $users = json_decode($file, true);

  // echo $users[$id]['username'] . '<br>' .  $users[$id]['password'] . '<br>' .  $users[$id]['email'] . '<br>' .  $users[$id]['role'];



echo '
<div class="form-group">
  <label>Username</label>
  <input class="form-control" type="text" name="username" value="'.$username.'">
  <label>Password</label>
  <input class="form-control" type="password" name="password" value="'.$password.'">
  <label>Email</label>
  <input class="form-control" type="email" name="email" value="'.$email.'">
  <label>Role</label>
  <select name="role" id="role" placeholder="'.$role_id.'" class="form-control" required>
  ';
  if ($role_id == "1") {
    echo '
    <option value="admin" selected>admin</option>
    <option value="user">user</option>
    ';
  } else {
    echo '
    <option value="admin">admin</option>
    <option value="user" selected>user</option>
    ';
  }
  echo '
  </select>

</div>
';

  mysqli_close($conn);

?>
