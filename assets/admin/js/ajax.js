jQuery(function ($) {
   $('#mow-activate').on('click', function (event) {
      $.ajax({
          url: ajaxurl,
          method: 'POST',
          data: {"mow_activation_key": $('input[name="g-activation-key"]').val(), "action": 'add_api_key'},
          success: function (data) {
             if (data == '1') {
                 location.reload();
             }
          }
      })
   });
});