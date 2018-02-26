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
               <p><label class="has-text-weight-bold">Username</label><span class="has-text-danger username-errormsg"> *</span></p>
               <div class="control has-icons-left has-icons-right">
                 <input class="input" name="username" id="username" placeholder="jdelacruz" type="text" autocomplete="off" required>
                 <span class="icon is-left"><i class="fas fa-user"></i></span>
                 <div class="username-icon">
                 </div>
               </div>
               <div class="control">
                 <p class="is-size-7">This will be your username. You can update your account profile later.</p>
               </div>
             </div>
             <div class="field">
               <p><label class="has-text-weight-bold">Email</label><span class="has-text-danger email-errormsg"> *</span></p>
               <div class="control has-icons-left has-icons-right">
                 <input class="input" name="email" id="email" placeholder="jdelacruz@example.org" type="email" required>
                 <span class="icon is-left"><i class="fas fa-envelope"></i></span>
                 <div class="email-icon">
                 </div>
               </div>
               <div class="control">
                 <p class="is-size-7">We'll never share your email address with anyone.</p>
               </div>
             </div>
             <div class="field">
               <p><label class="has-text-weight-bold">Password</label><span class="has-text-danger password-errormsg"> *</span></p>
               <div class="control has-icons-left has-icons-right">
                 <input class="input" name="password" id="password" placeholder="●●●●●●●" type="password" required>
                 <span class="icon is-left"><i class="fas fa-lock-open"></i></span>
                 <div class="password-icon">
                 </div>
               </div>
               <div class="control">
                 <p class="is-size-7">Use at least one lowercase letter, one numeral, and seven characters.</p>
               </div>
             </div>
             <div class="field">
               <p><label class="has-text-weight-bold">Confirm Password</label><span class="has-text-danger confpass-errormsg"> *</span></p>
               <div class="control has-icons-left has-icons-right">
                 <input class="input" name="confirmPassword" id="confirmPassword" placeholder="●●●●●●●" type="password" disabled required>
                 <span class="icon is-left"><i class="fas fa-lock-open"></i></span>
                 <div class="confpass-icon">
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
    if (usernameText == "") {
      $('.username-errormsg').addClass("has-text-danger");
      $('.username-errormsg').removeClass("is-pulled-right");
      $('.username-errormsg').html(" *");
    }

		$.post('assets/user_authentication.php',
			{username: usernameText},
			function(data, status) {
				$('.username-icon').html(data);
			});
	});

  //$(document).on('blur', '#email', function() {
  $('#username').blur(function () {
    var usernameText = $(this).val();
    var usernameLength = $(this).val().length;
    console.log(usernameLength);
    if (usernameText != "")  {
      var re = /\w/;
      if ((re.test(usernameText)) && ((usernameLength > 5) && (usernameLength < 15))) {
        $('.username-errormsg').addClass("has-text-success is-pulled-right");
        $('.username-errormsg').removeClass("has-text-danger");
        $('.username-errormsg').html(" valid username");
      } else {
        $('.username-errormsg').addClass("has-text-danger is-pulled-right");
        $('.username-errormsg').removeClass("has-text-success");
        $('.username-errormsg').html(" invalid username");
      }
    }
  });

  $('#email').on('input', function() {
    var emailText = $(this).val();
    if (emailText == "") {
      $('.email-errormsg').addClass("has-text-danger");
      $('.email-errormsg').removeClass("is-pulled-right");
      $('.email-errormsg').html(" *");
    }

    $.post('assets/email_authentication.php',
      {email: emailText},
      function(data, status) {
        $('.email-icon').html(data);
      });
  });

  //$(document).on('blur', '#email', function() {
  $('#email').blur(function () {
      var emailText = $(this).val();
      if (emailText != "")  {
        var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
        if (re.test(emailText)) {
          $('.email-errormsg').addClass("has-text-success is-pulled-right");
          $('.email-errormsg').removeClass("has-text-danger");
          $('.email-errormsg').html(" valid email address");
        } else {
          $('.email-errormsg').addClass("has-text-danger is-pulled-right");
          $('.email-errormsg').removeClass("has-text-success");
          $('.email-errormsg').html(" invalid email address");
        }
      }
  });


  $('#password').on('input', function() {
    var passConfirmed = $('#passwordConfirm').val();
    var passEntered = $(this).val();
    // console.log (passEntered);
    // console.log (passConfirmed);

    if (passEntered == "") {
      $('.confpass-icon').html('<span class="icon is-right has-text-danger"><i class="fas fa-times"></i></span>')
      $('.password-icon').html('')
      $('input[name="confirmPassword"]').attr("disabled", true)
      // $('.confpass-icon').prop("disabled", true);
    } else {
      $('input[name="confirmPassword"]').attr("disabled", false)
      if (passEntered == passConfirmed)
      $('.confpass-icon').html('<span class="icon is-right has-text-success"><i class="fas fa-check"></i></span>')
      else
      $('.confpass-icon').html('<span class="icon is-right has-text-danger"><i class="fas fa-times"></i></span>')
    }
  });

	$('#confirmPassword').on('input', function() {
		var passConfirmed = $(this).val();
		var passEntered = $('#password').val();
    // console.log(passEntered);
		// console.log(passConfirmed);
		if (passConfirmed == "")
			$('[for="confirmPassword"]').html('Confirm Password')
			else {
				if (passEntered == passConfirmed) {
          $('.confpass-icon').html('<span class="icon is-right has-text-success"><i class="fas fa-check"></i></span>')
          $('.password-icon').html('<span class="icon is-right has-text-success"><i class="fas fa-check"></i></span>')
          $('input[name="password"]').attr("disabled", true)
        }
				else {
          $('.confpass-icon').html('<span class="icon is-right has-text-danger"><i class="fas fa-times"></i></span>')
          $('.password-icon').html('')
          $('input[name="password"]').attr("disabled", false)
        }
			}
	});


</script>

</body>
</html>
