$(function() {

   $('.js-admin-delete').on('click', function (e){
      e.preventDefault();
      deleteUrl = $(this).attr('href');
      csrf = $(this).attr('data-csrf');
       $.ajax({
           url: deleteUrl,
           method: 'delete',
           data: {'_token': csrf},
           success: function(data){
               location.reload();
           }
       });
   });

});
