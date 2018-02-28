<?php

  require 'connect.php';

  session_start();

  // if (isset($_SESSION['current_user'])) {
  // 	if ($_SESSION['role'] != 'admin')
  // 		header ('location: home.php');
  // }


  function getTitle() {
    echo 'Item Page';
  }

  include 'partials/head.php';

  include 'partials/header.php';

 ?>

 <div class="container">
   <h1 class="is-5 title has-text-centered">Item Page</h1>
   <div class="columns">
     <div class="column is-6 is-offset-3">
       <?php

       $id = $_GET['id'];

       $sql = "SELECT i.*, b.brand, sb.sub_brand, its.status, sr.series FROM items i JOIN brands b ON (i.brand_id = b.id) JOIN sub_brands sb ON (i.sub_brand_id = sb.id) JOIN item_status its ON (i.item_status_id = its.id) JOIN serials sr ON (i.serial_id = sr.id) WHERE i.id = '$id'";
       $result = mysqli_query($conn, $sql);
       $item = mysqli_fetch_assoc($result);
       extract($item);

       echo '
       <table class="table is-bordered">
       <tbody>
       <tr>
       <td>Item:</td>
       <td>' . $name . '</td>
       </tr>
       <tr>
       <td>Image:</td>
       <td><img class="image is-128x128" src="' . $image . '"></td>
       </tr>
       <tr>
       <td>Price:</td>
       <td>PHP '. $price . '</td>
       </tr>
       <tr>
       <td>Description:</td>
       <td>'. $description . '</td>
       </tr>
       <tr>
       <td>Item Status:</td>
       <td>'. $status . '</td>
       </tr>
       <tr>
       <td>Series:</td>
       <td>'. $series . '</td>
       </tr>
       <tr>
       <td>Brand:</td>
       <td>'. $brand . '</td>
       </tr>
       <tr>
       <td>Sub-brand:</td>
       <td>'. $sub_brand . '</td>
       </tr>
       </tbody>
       </table>
       ';
       ?>
       <div class="has-text-centered">
         <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
           <button class="button is-dark is-outlined">Back</button>
         </a>
         <button type="button" id="editItem" class="button is-primary" data-toggle="modal" data-target="#editItemModal" data-Index="<?php echo $id; ?>">Edit</button>
         <button type="button" id="deleteItem" class="button is-danger" data-toggle="modal" data-target="#deleteItemModal" data-Index="<?php echo $id; ?>">Delete</button>
       </div>
     </div>
   </div>
 </div>

 <div class="modal" id="editItemModal">
   <div class="modal-background"></div>
     <form action="assets/edit_item.php" method="POST">
       <div class="modal-card">
         <input name="name_id" value="<?php echo $id ?>" hidden>
         <div class="modal-card-head">
           <p class="modal-card-title">Edit Item Details</p>
         </div>
         <div class="modal-card-body" id="editItemModalBody">
         </div>
         <div class="modal-card-foot">
           <button type="submit" class="button is-success">Save</button>
           <button type="button" class="button is-danger is-outlined modal-button-close">Cancel</button>
         </div>
       </div>
     </form>
 </div>


<?php


  include 'partials/footer.php';

  include 'partials/foot.php';

?>

</body>
</html>
