var rowItemId = 0;

$(function() {
    $('.editbutton').click(function() {
      rowItemId = $(this).data('index');
       $('.editbutton').prop('disabled', true);
      //  $('.deletebutton').prop('disabled', true);
       $('#showRow'+rowItemId).hide().fadeOut().addClass('hidden');
       $('#editRow'+rowItemId).show().fadeIn().removeClass('hidden');
    });

    $('.savebutton').click(function() {
      rowItemId = $(this).data('index');
       $('.editbutton').prop('disabled', false);
      //  $('.deletebutton').prop('disabled', false);
       $('#showRow'+rowItemId).show().fadeIn().removeClass('hidden');
       $('#editRow'+rowItemId).hide().fadeOut().addClass('hidden');
    });

    $('.taskbutton').click(function(){
      taskId = $(this).data('index');
      $('.showtask' + taskId).toggle();
    });

});

function updateStatus(stateId) {
   var id = stateId;

   $('.show-status-options').hide();
   $('.show-status').show();

   $('#showStatusOptions'+id).show();
   $('#showStatus'+id).hide();
}
