var rowItemId = 0;

$(function() {
    $('.editbutton').click(function() {
      rowItemId = $(this).data('index');
       $('.editbutton').prop('disabled', true);
       $('#showRow'+rowItemId).hide().fadeOut().addClass('hidden');
       $('#editRow'+rowItemId).show().fadeIn().removeClass('hidden');
    });

    $('.savebutton').click(function() {
      rowItemId = $(this).data('index');
       $('.editbutton').prop('disabled', false);
       $('#showRow'+rowItemId).show().fadeIn().removeClass('hidden');
       $('#editRow'+rowItemId).hide().fadeOut().addClass('hidden');
    });
});
