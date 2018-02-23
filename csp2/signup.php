<?php


  function getTitle() {
    echo 'Create your personal account';
  }

  include 'partials/head.php';

  include 'partials/header.php';

 ?>

 <h1 hidden>Sign Up Page</h1>

 <section class="hero">
   <div class="hero-body">
     <div class="container">
       <div class="columns">
         <div class="column is-5 is-offset-2">
           <h3 class="title has-text-grey has-text-centered">Create your personal account</h3>
           <form id="signupForm" method="POST" action="assets/signingup.php" class="box">
             <div class="field">
               <p><label class="has-text-weight-bold">Username</label><span class="is-pulled-right has-text-danger">Required</span></p>
               <div class="control has-icons-left has-icons-right">
                 <input class="input" name="username" id="username" placeholder="jdelacruz" type="text" required>
                 <span class="icon is-left"><i class="fas fa-user"></i></span>
                 <div>
                   <span class="icon is-right has-text-success"><i class="fas fa-check"></i></span>
                </div>
               </div>
               <div class="control">
                 <p class="is-size-7">This will be your username. You can update your account profile later.</p>
               </div>
             </div>
             <div class="field">
               <p><label class="has-text-weight-bold">Email</label><span class="is-pulled-right has-text-danger">Required</span></p>
               <div class="control has-icons-left has-icons-right">
                 <input class="input" name="email" id="email" placeholder="jdelacruz@example.org" type="email" required>
                 <span class="icon is-left"><i class="fas fa-envelope"></i></span>
                 <div>
                   <span class="icon is-right has-text-success"><i class="fas fa-check"></i></span>
                </div>
               </div>
               <div class="control">
                 <p class="is-size-7">We'll never share your email address with anyone.</p>
               </div>
             </div>
             <div class="field">
               <p><label class="has-text-weight-bold">Password</label><span class="is-pulled-right has-text-danger">Required</span></p>
               <div class="control has-icons-left has-icons-right">
                 <input class="input" name="password" id="password" placeholder="●●●●●●●" type="password" required>
                 <span class="icon is-left"><i class="fas fa-lock-open"></i></span>
                 <div>
                   <span class="icon is-right has-text-success"><i class="fas fa-check"></i></span>
                </div>
               </div>
               <div class="control">
                 <p class="is-size-7">Use at least one lowercase letter, one numeral, and seven characters.</p>
               </div>
             </div>
             <div class="field">
               <p><label class="has-text-weight-bold">Confirm Password</label><span class="is-pulled-right has-text-danger">Required</span></p>
               <div class="control has-icons-left has-icons-right">
                 <input class="input" name="confirmPassword" id="confirmPassword" placeholder="●●●●●●●" type="password" required>
                 <span class="icon is-left"><i class="fas fa-lock-open"></i></span>
                 <div>
                   <span class="icon is-right has-text-success"><i class="fas fa-check"></i></span>
                </div>
               </div>
             </div>

             <hr>
             <p class="is-size-7">By clicking on "Create account" below, you are agreeing to the Terms of Service and the Privacy Policy.</p>

             <hr>
             <p class="control">
               <input class="button is-primary" name="submit" id="submit" type ="submit" value="Create account">
             </p>
           </form>
         </div>
         <div class="column is-3">
           <h3 class="title has-text-grey has-text-centered is-invisible">Help Box</h3>
           <div class="box">
             <p>Help Box</p>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>


<?php

  include 'partials/footer.php';

  include 'partials/foot.php';

?>

<script type="text/javascript">
	$('#username').on('input', function() {
		var usernameText = $(this).val();
		$.post('assets/user_authentication.php',
			{username: usernameText},
			function(data, status) {
				$('[for="username"]').html(data);
			});
	});


	$('#confirmPassword').on('input', function() {
		var passConfirmed = $(this).val();
		var passEntered = $('#password').val();
		console.log(passConfirmed);
		if (passConfirmed == "")
			$('[for="confirmPassword"]').html('Confirm Password')
			else {
				if (passEntered == passConfirmed)
				$('[for="confirmPassword"]').html('Confirm Password <span class="green-message "><i class="glyphicon glyphicon-ok"></i></span>')
				else
				$('[for="confirmPassword"]').html('Confirm Password <span class="red-message "><i class="glyphicon glyphicon-remove"></i></span>')
			}
	});

	$('#password').on('input', function() {
		var passConfirmed = $('#passwordConfirm').val();
		var passEntered = $(this).val();
		console.log (passEntered);
		console.log (passConfirmed);

		if (passEntered == "" || passConfirmed == undefined) {
			$('[for="confirmPassword"]').html('Confirm Password')
			$('[for="confirmPassword"]').prop("disabled", true);
		}
		else {
			$('[for="confirmPassword"]').prop("disabled", false)
			if (passEntered == passConfirmed)
			$('[for="confirmPassword"]').html('Confirm Password <span class="green-message "><i class="glyphicon glyphicon-ok"></i></span>')
			else
			$('[for="confirmPassword"]').html('Confirm Password <span class="red-message "><i class="glyphicon glyphicon-remove"></i></span>')
		}
	});


	$('#email').on('input', function() {
		var emailText = $(this).val();
		$.post('assets/email_validation.php',
			{email: emailText},
			function(data, status) {
				console.log ('Processed: ' + data);

				$('[for="email"]').html(data);
			});
	});
</script>

</body>
</html>
