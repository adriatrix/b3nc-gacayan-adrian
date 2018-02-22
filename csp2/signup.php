<?php


  function getTitle() {
    echo 'Your one stop shop for Funko Pops!';
  }

  include 'partials/head.php';

  include 'partials/header.php';

 ?>

 <h1 hidden>Sign Up Page</h1>

 <section class="hero">
   <div class="hero-body">
     <div class="container">
       <div class="columns">
         <div class="column is-4 is-offset-4">
           <h3 class="title has-text-grey has-text-centered">Register</h3>
           <div class="box">
             <div class="field">
               <label>Name</label>
               <div class="control has-icons-left has-icons-right">
                 <input class="input" placeholder="John Smith" type="text">
                 <span class="icon is-left"><i class="fas fa-user"></i></span>
                 <span class="icon is-right"><i class=""></i></span>
               </div>
             </div>
             <div class="field">
               <label>Uername</label>
               <div class="control has-icons-left has-icons-right">
                 <input class="input" placeholder="jsmith" type="text">
                 <span class="icon is-left"><i class="fas fa-user"></i></span>
                 <span class="icon is-right"><i class=""></i></span>
               </div>
             </div>
             <div class="field">
               <label class="label">Email</label>
               <div class="control has-icons-left has-icons-right">
                  <input class="input" placeholder="agacayan@example.org" type="email">
                 <span class="icon is-left"><i class="far fa-envelope"></i></span>
                 <span class="icon is-right"><i class=""></i></span>
               </div>
             </div>
             <div class="field">
               <label class="label">Password</label>
               <div class="control has-icons-left has-icons-right">
                  <input class="input" placeholder="●●●●●●●" type="password">
                 <span class="icon is-left"><i class="fas fa-lock-open"></i></i></span>
                 <span class="icon is-right"><i class=""></i></span>
               </div>
             </div>
             <div class="field">
               <label class="label">Confirm Password</label>
               <div class="control has-icons-left has-icons-right">
                  <input class="input" placeholder="●●●●●●●" type="password">
                 <span class="icon is-left"><i class="fas fa-lock-open"></i></i></span>
                 <span class="icon is-right"><i class=""></i></span>
               </div>
             </div>
             <div class="field">
               <label class="label">Confirm Password</label>
               <div class="control has-icons-left has-icons-right">
                  <input class="input" placeholder="●●●●●●●" type="password">
                 <span class="icon is-left"><i class="fas fa-lock-open"></i></i></span>
                 <span class="icon is-right"><i class=""></i></span>
               </div>
             </div>

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
