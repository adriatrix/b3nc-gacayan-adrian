// $('p').hide();
//
//
// $('.para-to-hide').hide();
//
//
// $('#paraToHide').hide();
//
//

//
// $('p').click(function () {
//   $(this).hide();
// });

// function hideThisElement() {
//   $(this).hide();
// }
//
// $('p').click(hideThisElement)


$("#paraToHide").hover(function() {
  $(this).html("I am a changed paragraph.");
});

$("p").click(function() {
  $(this).attr("align","center");
  $(this).css("color","red");
});
