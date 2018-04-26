$(function() {

   $("#orderSearch").on('keyup', function (){
      var $value=$(this).val();
      $.ajax({
         url: '/orders/search',
         type: 'GET',
         data: {
            search : $value,
         },
         success: function(data) {
            $('#numberList').html(data);
         }
      });
   });

   $("#customerSearch").on('keyup', function (){
      var $value=$(this).val();
      $.ajax({
         url: '/customers/search',
         type: 'GET',
         data: {
              search : $value,
          },
         success: function(data) {
             $('#customerList').html(data);
         }
      });
   });

   $("#customerSuggest").on('keyup', function (){
      var $value=$(this).val();
      $.ajax({
         url: '/customers/suggest',
         type: 'GET',
         data: {
              suggest : $value,
          },
         success: function(data) {
             $('#customerSuggestList').html(data);
         }
      });
   });

   $('#customerSuggestList').on('click','button', function (){
      var $custName = $(this).data('index');
      $('#customerSuggest').val($custName);
   });

   $("#soSuggest").on('keyup', function (){
      var $value=$(this).val();
      $.ajax({
         url: '/orders/suggest',
         type: 'GET',
         data: {
              suggest : $value,
          },
         success: function(data) {
             $('#soSuggestList').html(data);
         }
      });
   });

   $('#soSuggestList').on('click','button', function (){
      var $salesNum = $(this).data('index');
      $('#soSuggest').val($salesNum);
   });

   $("#userSearch").on('keyup', function (){
      var $value=$(this).val();
      $.ajax({
         url: '/users/search',
         type: 'GET',
         data: {
              search : $value,
          },
         success: function(data) {
             $('#userList').html(data);
         }
      });
   });

   $('#customerList').on('click','button', function (){
    var $custId = $(this).data('index');
    $.ajax({
       url: '/customers/ordersearch',
       type: 'GET',
       data: {
            cust : $custId,
        },
       success: function(data) {
           $('#customerOrderList').html(data);
       }
    });
   });

   $('#userList').on('click','button', function (){
    var $userId = $(this).data('index');
    $.ajax({
       url: '/users/ordersearch',
       type: 'GET',
       data: {
            user : $userId,
        },
       success: function(data) {
           $('#userOrderList').html(data);
       }
    });
   });

   $('#numberList').on('click','button', function (){
    var $orderId = $(this).data('index');
    $.ajax({
       url: '/orders/numbersearch',
       type: 'GET',
       data: {
            odor : $orderId,
        },
       success: function(data) {
           $('#orderList').html(data);
       }
    });
   });

     var i = 0, timeOut = 0;

      $('button.taskbutton').on('mousedown touchstart', function(e) {
        var ayde = $(this).data('index');
        $('td.tede'+ayde).addClass('bg-warning');
        timeOut = setInterval(function(){
          console.log(i++);
        }, 100);
      }).bind('mouseup mouseleave touchend', function() {
        var ayde = $(this).data('index');
        $('td.tede'+ayde).removeClass('bg-warning');
        clearInterval(timeOut);
      });


   $("input[type='checkbox']").on('click', function (){
    var $this = $(this);
    var isChecked = $this.is(':checked');
     if(isChecked) {
        $isChecked = 'Done';
        $(this).parent().parent().css("text-decoration", "line-through");
        $(this).parent().parent().addClass("text-secondary");
     } else {
        $isChecked = 'Pending';
        $(this).parent().parent().css("text-decoration", "none");
        $(this).parent().parent().removeClass("text-secondary");
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
