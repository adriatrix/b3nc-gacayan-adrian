
$("ul").on("click", "li", function() {
// $("li").click(function() {
  // $(this).css("color", "grey");
  // $(this).css("text-decoration", "line-through")
  $(this).toggleClass("completed");
  // $("ul").append("<li><span><i class='fa fa-trash' aria-hidden='true'></i></span>" + todoText + "</li>");
});


$("ul").on("click", "span", function() {
// $("span").click(function() {
  $(this).parent().fadeOut("slow", function() {
    $(this).remove();
  });
});

$("input[type='text']").keypress(function(event) {
  if (event.which === 13) {
    var todoText = $(this).val();
    $(this).select();
    // $(this).val("");
    $("ul").append("<li><span><i class='fa fa-trash' aria-hidden='true'></i></span>" + todoText + "</li>");
  }
});
