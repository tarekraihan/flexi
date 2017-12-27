$('#flexiload_form').validate({
    rules: {
        number: {
            minlength: 10,
            maxlength: 15,
            required: true,
            number:true
        },
        amount: {
            minlength: 2,
            maxlength: 4,
            required: true,
            number:true
        },
        type: {
            required: true
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    }
});

$('#bkash_form').validate({
    rules: {
        number: {
            minlength: 10,
            maxlength: 15,
            required: true,
            number:true
        },
        amount: {
            required: true,
            number:true
        },
        type: {
            required: true
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    }
});

$(document).ready(function (){
  $('#operator').on('change',function () {
      var operator_id = $('#operator option:selected').val();
      // console.log(operator_id);
      $.ajax
      ({
          type: "POST",
          url: "ajax_get_package",
          data: {operator_id:operator_id},
          success: function(response)
          {
              $("#package").html(response);
          }
      });
  })

  $('#package').on('change',function () {
      var package_id = $('#package option:selected').val();
      // console.log(operator_id);
      $.ajax
      ({
          type: "POST",
          url: "ajax_get_package_price",
          data: {package_id:package_id},
          success: function(response)
          {
              $("#amount").val(response);
          }
      });
  })
})