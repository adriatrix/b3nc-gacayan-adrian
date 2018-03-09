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

// accordion script from w3schools
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

// currency formatter from Patrick Desjardins at stackoverflow
// Number.prototype.formatMoney = function(c, d, t){
// var n = this,
//     c = isNaN(c = Math.abs(c)) ? 2 : c,
//     d = d == undefined ? "." : d,
//     t = t == undefined ? "," : t,
//     s = n < 0 ? "-" : "",
//     i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
//     j = (j = i.length) > 3 ? j % 3 : 0;
//    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
//  };



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
