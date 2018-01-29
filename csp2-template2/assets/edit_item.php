<?php
  $id = $_GET['id'];

  // echo $id;

  $file = file_get_contents('items.json');
  $items = json_decode($file, true);

  // echo $users[$id]['username'] . '<br>' .  $users[$id]['password'] . '<br>' .  $users[$id]['email'] . '<br>' .  $users[$id]['role'];



echo '
<div class="form-group">
  <label>Product Name</label>
  <input class="form-control" type="text" name="name" value="'.$items[$id]['name'].'" required>
  <label>Description</label>
  <textarea class="form-control"  name="desciption" id="desciption" rows="8" cols="40" required>'.$items[$id]['desciption'].'</textarea>
  <label>Image</label><br>
  <img height="20%" width="20%" src="' . $items[$id]['image']. '">
  <input type="file" name="image">
  <label>Price</label>
  <input class="form-control" type="number" name="price" step="any" value="'.$items[$id]['price'].'">
  <label>Category</label>
  <select name="category" id="category" placeholder="'.$items[$id]['category'].'" class="form-control" required>
  ';
  if ($items[$id]['category'] == "Category 1") {
    echo '
    <option value="Category 1" selected>Category 1</option>
    <option value="Category 2">Category 2</option>
    <option value="Category 3">Category 3</option>
    <option value="Category 4">Category 4</option>
    <option value="Category 5">Category 5</option>
    <option value="Category 6">Category 6</option>
    ';
  } else if ($items[$id]['category'] == "Category 2") {
    echo '
    <option value="Category 1">Category 1</option>
    <option value="Category 2" selected>Category 2</option>
    <option value="Category 3">Category 3</option>
    <option value="Category 4">Category 4</option>
    <option value="Category 5">Category 5</option>
    <option value="Category 6">Category 6</option>
    ';
  } else if ($items[$id]['category'] == "Category 3") {
    echo '
    <option value="Category 1">Category 1</option>
    <option value="Category 2">Category 2</option>
    <option value="Category 3" selected>Category 3</option>
    <option value="Category 4">Category 4</option>
    <option value="Category 5">Category 5</option>
    <option value="Category 6">Category 6</option>
    ';
  } else if ($items[$id]['category'] == "Category 4") {
    echo '
    <option value="Category 1">Category 1</option>
    <option value="Category 2">Category 2</option>
    <option value="Category 3">Category 3</option>
    <option value="Category 4" selected>Category 4</option>
    <option value="Category 5">Category 5</option>
    <option value="Category 6">Category 6</option>
    ';
  } else if ($items[$id]['category'] == "Category 5") {
    echo '
    <option value="Category 1">Category 1</option>
    <option value="Category 2">Category 2</option>
    <option value="Category 3">Category 3</option>
    <option value="Category 4">Category 4</option>
    <option value="Category 5" selected>Category 5</option>
    <option value="Category 6">Category 6</option>
    ';
  } else {
    echo '
    <option value="Category 1">Category 1</option>
    <option value="Category 2">Category 2</option>
    <option value="Category 3">Category 3</option>
    <option value="Category 4">Category 4</option>
    <option value="Category 5">Category 5</option>
    <option value="Category 6" selected>Category 6</option>
    ';

  }
  echo '
  </select>

</div>
';

?>
