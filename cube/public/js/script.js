$(function() {

   // $('.taskbutton').click(function(){
   //   taskId = $(this).data('index');
   //   $('.showtask' + taskId).toggle();
   // });

   $("#search").keyup(function(){
       var str=  $("#search").val();
       if(str == "") {
               $( "#documentList" ).html("<b>Customer Information will be listed here...</b>");
       }else {
               $.get( "{{ url('customers/search?search=') }}"+str, function( data ) {
                   $( "#documentList" ).html( data );
            });
       }
   });

   $("input[type='checkbox']").on('click', function (){
    var $this = $(this);
    var isChecked = $this.is(':checked');
     if(isChecked) {
        $isChecked = 'Done';
        $(this).parent().parent().css("text-decoration", "line-through");
     } else {
        $isChecked = 'Pending';
        $(this).parent().parent().css("text-decoration", "none");
     }

    $.ajax({
        data: {
            idTask: $this.attr('data-index'),
            checkboxStatus: $isChecked,
            _token: $('meta[name="csrf-token"]').attr('content'),
            // _token: '{{ csrf_token() }}'
        },
        url: '/tasks/change_status',
        type: 'POST'
        // dataType: 'json'
    });
});

});
