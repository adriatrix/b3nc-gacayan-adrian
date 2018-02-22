<?php


  function getTitle() {
    echo 'Your one stop shop for Funko Pops!';
  }

  include 'partials/head.php';

  include 'partials/header.php';

 ?>

 <section class="hero is-fullheight is-dark is-bold">
   <div class="hero-body">
     <div class="container">
       <div class="columns is-vcentered">
         <div class="column is-4 is-offset-4">
           <h1 class="title">
             Register an Account
           </h1>
           <div class="box">
             <label class="label">Name</label>
             <p class="control">
               <input class="input" placeholder="John Smith" type="text">
             </p>
             <label class="label">Username</label>
             <p class="control">
               <input class="input" placeholder="jsmith" type="text">
             </p>
             <label class="label">Email</label>
             <p class="control">
               <input class="input" placeholder="jsmith@example.org" type="text">
             </p>
             <hr>
             <label class="label">Password</label>
             <p class="control">
               <input class="input" placeholder="●●●●●●●" type="password">
             </p>
             <label class="label">Confirm Password</label>
             <p class="control">
               <input class="input" placeholder="●●●●●●●" type="password">
             </p>
             <hr>
             <p class="control">
               <button class="button is-primary">Register</button>
               <button class="button is-default">Cancel</button>
             </p>
           </div>
           <p class="has-text-centered">
             <a href="login.html">Login</a>
             |
             <a href="#">Need help?</a>
           </p>
         </div>
       </div>
     </div>
   </div>

 <div></div><div></div><div></div><div></div></section>


<?php

  include 'partials/footer.php';

  include 'partials/foot.php';

?>
