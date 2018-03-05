<!-- <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="">
      <img src="assets/img/small-banner.png" alt="The Pop Stop PH - your one stop shop for Funko Pops!" width="230" height="100">
    </a>

    <div class="navbar-burger burger" data-target="navMenu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div class="navbar-menu" id="navMenu">
    <div class="navbar-start">
      <a class="navbar-item" href="#">Home</a>
      <a class="navbar-item" href="#">Shop</a>
      <a class="navbar-item" href="#">About</a>
      <a class="navbar-item" href="#">Login</a>
    </div>
  </div>
</nav> -->


<section class="hero is-info is-bold">
 <div class="hero-head">
   <nav class="navbar">
     <div class="container">
       <div class="navbar-brand">
         <a class="navbar-item" href="index.php">
           <img src="assets/img/logo.jpg" alt="Logo">
         </a>
         <span class="navbar-burger burger" data-target="navbarMenu">
           <span></span>
           <span></span>
           <span></span>
         </span>
       </div>
       <div id="navbarMenu" class="navbar-menu">
         <div class="navbar-start">
           <a class="navbar-item" href="home.php">Home</a>
           <a class="navbar-item" href="catalogue.php">Shop</a>
           <a class="navbar-item" href="#">About</a>
         </div>
         <div class="navbar-end">
             <?php
             if(isset($_SESSION['current_user'])) {
              echo'
                <span class="navbar-item">
                <a class="button is-info is-small" href="profile.php">
                <span class="icon">
                <i class="fas fa-user"></i>
                </span>
                <span>' . ucfirst($_SESSION['current_user']) . '</span>
                </a>
                </span>
                ';
                }
              ?>
           <div class="navbar-item">
             <div class="field is-grouped is-outlined">
               <?php
                 if (isset($_SESSION['current_user'])) {
                  echo '
                  <p class="control">
                  <a class="button is-danger is-inverted" href="signout.php">
                  <strong>Sign Out</strong>
                  </a>
                  </p>
                  ';
                } else {
                  echo '
                  <p class="control">
                  <a class="button is-primary is-inverted" href="signin.php">
                  <strong>Sign In</strong>
                  </a>
                  </p>
                  ';
                }
                ?>
               <p class="control has-text-white">or</p>
               <p class="control">
                 <a class="button is-primary" href="signup.php">
                   <strong>Sign Up</strong>
                 </a>
               </p>
             </div>
           </div>
           <span class="navbar-item">
             <a class="button is-white is-outlined is-small" href="basket.php">
               <span class="icon">
                 <i class="fas fa-shopping-basket"></i>
               </span>
               <span>Shopping Basket</span>
               <span id="basket-badge">
                 <?php
                 if (isset($_SESSION['basket_count'])) {
                   echo '
                   <span class="my-badge">'.$_SESSION['basket_count'].'</span>
                   ';
                 }
                 ?>
               </span>
             </a>
           </span>
         </div>
       </div>
     </div>
   </nav>
 </div>
 <div class="hero-body">
   <div class="container has-text-centered">
     <h1>The Pop! Stop PH</h1>
     <h2>Your one stop shop for Funko Pops!</h2>
   </div>
 </div>
</section>
