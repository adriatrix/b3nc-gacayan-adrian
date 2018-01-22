<?php

  function getTitle() {
    echo 'Welcome to my page';
  }

  include 'partials/head.php';
 ?>

  </head>
  <body>

    <?php
      include 'partials/main_header.php';
     ?>

     <section class="wrapper">
       <div class="container">
         <h1>Register</h1>

         <form method="POST" action="registration.php">
           <div class="field is-horizontal">
             <div class="field-label is-normal">
               <label class="label">Username: </label>
             </div>
             <div class="field-body">
               <div class="field">
                 <div class="control">
                   <input class="input" type="text" name="username" id="username" placeholder="Username">
                 </div>
               </div>
             </div>
             <div class="field-label is normal">
               <label class="label">Email: </label>
             </div>
             <div class="field-body">
               <div class="field">
                 <div class="control">
                   <input class="input" type="email" name="email" id="email" placeholder="Email">
                </div>
              </div>
            </div>
          </div>


           <div class="field">
             <label class="label">Password: </label>
             <input class="control" type="password" name="password" id="password" placeholder="Password">
           </div>

           <div class="field">
             <label class="label">Confirm Password: </label>
             <input class="control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
           </div>


           <div class="field">
             <input class="button is-link"type="submit" name="submit" value="Register">
           </div>
         </form>
       </div>
     </section> <!-- /.wrapper -->

     <footer class="footer">
       <?php
        include 'partials/main_footer.php';
       ?>
     </footer>

     <?php
       include 'partials/foot.php';
     ?>
