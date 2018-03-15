<?php

  require 'connect.php';

  session_start();

  if (isset($_SESSION['current_user']) != 'admin') {
    header('location: home.php');
  }



  function getTitle() {
    echo 'User Page';
  }

  include 'partials/head.php';

 ?>

</head>
<body>

 <?php include 'partials/header.php'; ?>

 <div class="container">
   <div class="columns">
     <div class="column is-6 has-text-left">
       <h1 class="is-5 title">User Page</h1>
     </div>
     <div class="column has-text-right">
       <?php

       $id = $_GET['id'];

       $sql = "SELECT u.*, r.role FROM users u JOIN roles r ON (u.role_id = r.id) WHERE u.id = '$id'";
       $result = mysqli_query($conn, $sql);
       $user = mysqli_fetch_assoc($result);
       extract($user);

          echo '
          <a href="'.$_SERVER['HTTP_REFERER'].'">
          <button class="button is-dark is-outlined">Back</button>
          </a>
          ';
          // <button type="button" id="deleteUser" class="button is-danger" data-toggle="modal" data-target="#deleteUserModal" data-index="'.$id.'">Delete</button>

        ?>

     </div>
   </div>
   <div class="columns">
     <div class="column is-6">

       <?php


       echo'

       <table class="table is-bordered is-striped">
       <tbody>
       <tr>
       <td>Username:</td>
       <td>' . $username . '</td>
       </tr>
       <tr>
       <td>Full Name:</td>
       <td>'. $firstname . ' '. $lastname . '</td>
       </tr>
       <tr>
       <td>Email address:</td>
       <td>'. $email . '</td>
       </tr>
       <tr>
       <td>Contact Number:</td>
       <td>'. $contact_num . '</td>
       </tr>
       </tbody>
       </table>

       ';
       ?>

     </div>
     <div class="column is-6">
       <?php

       echo '
       <table class="table is-bordered is-striped">
       <tbody>
       <tr>
       <td>Address 1:</td>
       <td>' . $address1 . '</td>
       </tr>
       <tr>
       <td>Address 2:</td>
       <td>'. $address2 . '</td>
       </tr>
       <tr>
       <td>City:</td>
       <td>'. $city . '</td>
       </tr>
       <tr>
       <td>Zip code:</td>
       <td>'. $zipcode . '</td>
       </tr>
       </tbody>
       </table>
       ';
       ?>
     </div>
   </div>
 </div>

 <div class="modal" id="editUserModal">
   <div class="modal-background"></div>
     <form action="assets/updatinguser.php" method="POST">
       <div class="modal-card">
         <input name="name_id" value="<?php echo $id ?>" hidden>
         <div class="modal-card-head">
           <p class="modal-card-title">Update User Details</p>
         </div>
         <div class="modal-card-body" id="editUserModalBody">
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

<script type="text/javascript">
	$(document).ready(function() {
		$('#editUser').click(function() {
			var userId = $(this).data('index');
			// console.log(userId);
			$.get('assets/edit_user.php',
			{
				id: userId
			},
			function(data, status) {
				// console.log(data);
				$('#editUserModalBody').html(data);
		});
		});
	});

  $("#editUser").click(function() {
    $("#editUserModal").addClass("is-active");
  });

  $(".modal-button-close").click(function() {
     $("#editUserModal").removeClass("is-active");
  });

</script>

</body>
</html>
