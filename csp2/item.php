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

 ?>

</head>
<body>

 <?php include 'partials/header.php'; ?>

 <div class="container">
   <div class="columns">
     <div class="column">

       <?php

       $id = $_GET['id'];

       $sql = "SELECT i.*, b.brand, sb.sub_brand, r.rarity, sr.series FROM items i JOIN brands b ON (i.brand_id = b.id) JOIN sub_brands sb ON (i.sub_brand_id = sb.id) JOIN rarities r ON (i.rarity_id = r.id) JOIN serials sr ON (i.serial_id = sr.id) WHERE i.id = '$id'";
       $result = mysqli_query($conn, $sql);
       $item = mysqli_fetch_assoc($result);
       extract($item);

        ?>
       <div class="breadcrumb is-small" aria-label="breadcrumbs">
         <ul>
           <li><a href="home.php">Home</a></li>
           <li><a href="#"><?php echo $series; ?></a></li>
           <li><a href="#"><?php echo $brand; ?></a></li>
           <li><a href="#"><?php echo $sub_brand; ?></a></li>
           <li class="is-active"><a href="#" aria-current="page"><?php echo $name; ?></a></li>
         </ul>
       </div>
     </div>
   </div>
   <h1 class="is-5 title has-text-centered">Item Page</h1>
   <div class="columns">
     <div class="column is-6">

       <?php

       echo'

       <div class="box">
       <img class="image" src="' . $image . '">
       </div>

       ';
       ?>

     </div>
     <div class="column is-6">
       <?php

       echo '
       <table class="table is-bordered">
       <tbody>
       <tr>
       <td>Item:</td>
       <td>' . $name . '</td>
       </tr>
       <tr>
       <td>Price:</td>
       <td>PHP '. $price . '</td>
       </tr>
       <tr>
       <td>Stock:</td>
       <td>'. $stock . '</td>
       </tr>
       <tr>
       <td>Description:</td>
       <td>'. $description . '</td>
       </tr>
       <tr>
       <td>Released Date:</td>
       <td>'. $release_date . '</td>
       </tr>
       <tr>
       <td>Rarity:</td>
       <td>'. $rarity . '</td>
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
       <div class="">
         <?php
          if (isset($_SESSION['current_user'])) {
            if ($_SESSION['current_user'] == 'admin') {
              echo '
              <a href="catalogue.php">
              <button class="button is-dark is-outlined">Back</button>
              </a>
              <button type="button" id="editItem" class="button is-primary" data-toggle="modal" data-target="#editItemModal" data-index="'.$id.'">Edit</button>
              <button type="button" id="deleteItem" class="button is-danger" data-toggle="modal" data-target="#deleteItemModal" data-index="'.$id.'">Delete</button>
              ';
            } else {
              echo '
                <a href="'.$_SERVER['HTTP_REFERER'].'">
                <button class="button is-dark is-outlined">Back</button>
                </a>
              ';
            }
          }

          ?>

       </div>
     </div>
   </div>
 </div>

 <div class="modal" id="editItemModal">
   <div class="modal-background"></div>
     <form action="assets/updatingitem.php" method="POST">
       <div class="modal-card">
         <input name="name_id" value="<?php echo $id ?>" hidden>
         <div class="modal-card-head">
           <p class="modal-card-title">Edit Item Details</p>
           <img class="image is-64x64" src="<?php echo $image ?>">
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

 <div class="modal" id="deleteItemModal">
   <div class="modal-background"></div>
     <form action="assets/deletingitem.php" method="POST">
       <div class="modal-card">
         <input name="name_id" value="<?php echo $id ?>" hidden>
         <div class="modal-card-head">
           <p class="modal-card-title">Delete Item</p>
           <img class="image is-64x64" src="<?php echo $image ?>">
         </div>
         <div class="modal-card-body" id="deleteItemModalBody">
           <p>Please confirm deletion of this item from Catalog</p>
         </div>
         <div class="modal-card-foot">
           <button type="submit" class="button is-success">Confirm</button>
           <button type="button" class="button is-danger is-outlined modal-button-close">Cancel</button>
         </div>
       </div>
     </form>
 </div>


<?php


  include 'partials/footer.php';

  include 'partials/foot.php';

?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#editItem').click(function() {
			var itemId = $(this).data('index');
			// console.log(userId);
			$.get('assets/edit_item.php',
			{
				id: itemId
			},
			function(data, status) {
				// console.log(data);
				$('#editItemModalBody').html(data);
		});
		});
	});

  $("#editItem").click(function() {
    $("#editItemModal").addClass("is-active");
  });

  $(".modal-button-close").click(function() {
     $("#editItemModal").removeClass("is-active");
  });

  $("#deleteItem").click(function() {
    $("#deleteItemModal").addClass("is-active");
  });

  $(".modal-button-close").click(function() {
     $("#deleteItemModal").removeClass("is-active");
  });

</script>

</body>
</html>
