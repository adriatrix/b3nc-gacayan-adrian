$(function() {

   // $('.taskbutton').click(function(){
   //   taskId = $(this).data('index');
   //   $('.showtask' + taskId).toggle();
   // });

   $("input[type='checkbox']").on('click', function (){
    var $this = $(this);
    var isChecked = $this.is(':checked');
     if(isChecked)
       $isChecked = 'Done';
     else
       $isChecked = 'Pending';

    $.ajax({
        data: {
            idTask: $this.attr('data-index'),
            checkboxStatus: $isChecked,
            _token: '{!! crfs_token() !!}'
        },
        url: '/tasks/change_status',
        type: 'POST',
        dataType: 'json'
    });
});

});
