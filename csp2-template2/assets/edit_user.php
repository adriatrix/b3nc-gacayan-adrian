<?php
  $id = $_GET['id'];

  // echo $id;

  $file = file_get_contents('users.json');
  $users = json_decode($file, true);

  // echo $users[$id]['username'] . '<br>' .  $users[$id]['password'] . '<br>' .  $users[$id]['email'] . '<br>' .  $users[$id]['role'];



echo '
<div class="form-group">
  <label>Username</label>
  <input class="form-control" type="text" name="username" value="'.$users[$id]['username'].'">
  <label>Password</label>
  <input class="form-control" type="password" name="password" value="'.$users[$id]['password'].'">
  <label>Email</label>
  <input class="form-control" type="email" name="email" value="'.$users[$id]['email'].'">
  <label>Role</label>
  <select name="role" id="role" placeholder="'.$users[$id]['role'].'" class="form-control" required>
  ';
  if ($users[$id]['role'] == "admin") {
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

?>
