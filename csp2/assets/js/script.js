console.log('custom js is working!');

// NOTE: navbar animation
document.addEventListener('DOMContentLoaded', function () {
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
  if ($navbarBurgers.length > 0) {
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {
        var target = $el.dataset.target;
        var $target = document.getElementById(target);
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      });
    });
  }
});

$("#editItem").click(function() {
  $("#editItemModal").addClass("is-active");
});

$(".modal-button-close").click(function() {
   $("#editItemModal").removeClass("is-active");
});


// function validateFormOnCreate(theForm) {
// var reason = "";
//
//   reason += validateUsername(theForm.username);
//   reason += validatePassword(theForm.pwd);
//   reason += validateEmail(theForm.email);
//   reason += validatePhone(theForm.phone);
//   reason += validateEmpty(theForm.from);
//
//   if (reason != "") {
//     alert("Some fields need correction:\n" + reason);
//     return false;
//   }
//
//   return true;
// }
