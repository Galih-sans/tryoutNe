$(document).ready(function () {
  $('.select2').select2({
    theme: 'bootstrap-5',
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
  });

  $('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    maxDate: -0,
    changeMonth: true,
    changeYear: true,
  });
  jQuery.extend(jQuery.validator.messages, {
    required: "Bagian ini harus diisi.",
    email: "Silahkan masukkan alamat email yang valid.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Silahkan masukkan nomor yang benar.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Silahkan Masukkan {0} yang sama.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Silahkan masukkan minimal {0} Karakter."),
    rangelength: jQuery.validator.format(
      "Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}."),
  });
  $(".form-register").validate({
    errorClass: 'validation-error',
    rules: {
      name: {
        required: true,
        minlength: 5
      },
      email: {
        required: true,
        email: true
      },
      phone_number: {
        required: true,
        minlength: 10,
        maxlength: 13
      },
      password: {
        required: true,
        minlength: 5
      },
      confirm_password: {
        equalTo: '#password'
      },
      POB: {
        required: true,
        minlength: 5
      },
      DOB: {
        required: true,
        date: true
      },
      parent_name: {
        required: true,
        minlength: 5
      },
      parent_email: {
        required: true,
        email: true
      },
      parent_phone_number: {
        required: true,
        number: true,
        minlength: 11,
        maxlength: 13
      },
    }
  });

  $('#level').on('change', function () {
    var selected = $('#level').val();
    $.ajax({
        url: 'register/get_class',
        type: "POST",
        data: {
            level: selected,
        },
        success: function (response) {
            response = JSON.parse(response);
            if (response.length != 0) {
                $("#class").empty().append(
                    "<option disabled='disabled' SELECTED>Silahkan Pilih Mata Pelajaran</option>"
                );
                $("#class").prop("disabled", false);
                response.forEach(response =>
                    $('#class').append('<option value="' + response.id + '">' + response
                        .text +
                        '</option>')
                );
            } else {
              $("#class").empty().append(
                "<option disabled='disabled' SELECTED>Kelas Masih Kosong</option>"
            );
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
});
});