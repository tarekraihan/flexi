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
            maxlength: 5,
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