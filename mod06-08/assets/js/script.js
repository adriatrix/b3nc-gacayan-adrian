// GENERAL SETTING
window.sr = ScrollReveal({ reset: true });

// Custom Settings
sr.reveal('.foo-0', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-0v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},500);

sr.reveal('.foo-1', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-1v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},1200);

sr.reveal('.foo-2', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-2v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},500);

sr.reveal('.foo-3', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-3v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},1200);

sr.reveal('.foo-4', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-4v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},500);

sr.reveal('.foo-5', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-5v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},1200);

sr.reveal('.foo-6', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-6v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},500);

sr.reveal('.foo-7', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-7v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},1200);

sr.reveal('.foo-8', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-8v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},500);

sr.reveal('.foo-9', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-9v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},1200);

sr.reveal('.foo-10', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-10v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},500);

sr.reveal('.foo-11', {
  reset: 'false',
  duration: '500',
});

sr.reveal('.foo-11v', {
  reset: 'false',
  duration: '500',
  delay: '3800',
},1200);

function checkKeycode(event) {
    var keyDownEvent = event || window.event,
    keycode = (keyDownEvent.which) ? keyDownEvent.which : keyDownEvent.keyCode;

        window.scrollBy({
          top: 1000, // could be negative value
          left: 0,
          behavior: 'smooth'
        });

    return false;
}

document.onkeydown = checkKeycode;
