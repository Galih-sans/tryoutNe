$(document).ready(function () {
  $('.select2').select2({
    theme: 'bootstrap-5',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
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
    if (selected == 'SD' || selected == 'SMP' || selected == 'SMA') {
      $('.school_from').addClass('d-block').removeClass('d-none');
      $("#province, #city, #districs, #school").val('').trigger('change')
    } else {
      $('.school_from').addClass('d-none').removeClass('d-block');
    }
    Swal.showLoading();
    $.ajax({
      url: 'register/get_class',
      type: "POST",
      data: {
        level: selected,
      },
      success: function (response) {
        response = JSON.parse(response);
        console.log(response);
        if (response.length != 0) {
          $("#class").empty().append(
            "<option disabled='disabled' SELECTED>Silahkan Pilih Kelas</option>"
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
        $('.class_form').addClass('d-block').removeClass('d-none');
        Swal.close();
      },
      error: function (error) {
        console.log(error);
      }
    });
  });
  $('#province').on('change', function () {
    var selected = $('#province').val();
    $.ajax({
      url: 'register/get_city',
      type: "POST",
      data: {
        kode_prop: selected,
      },
      success: function (response) {
        response = JSON.parse(response);
        console.log(response);
        if (response.length != 0) {
          $("#city").empty().append(
            "<option disabled='disabled' SELECTED>Silahkan Pilih Kota / Kabupaten</option>"
          );
          $("#city").prop("disabled", false);
          response.forEach(response =>
            $('#city').append('<option value="' + response.id + '">' + response
              .text +
              '</option>')
          );
        } else {
          $("#city").empty().append(
            "<option disabled='disabled' SELECTED>Kota / Kabupaten Masih Kosong</option>"
          );
        }
      },
      error: function (error) {
        console.log(error);
      }
    });
  });
  $('#city').on('change', function () {
    var selected = $('#city').val();
    $.ajax({
      url: 'register/get_districts',
      type: "POST",
      data: {
        kode_kab_kota: selected,
      },
      success: function (response) {
        response = JSON.parse(response);
        console.log(response);
        if (response.length != 0) {
          $("#districts").empty().append(
            "<option disabled='disabled' SELECTED>Silahkan Pilih Kecamatan</option>"
          );
          $("#districts").prop("disabled", false);
          response.forEach(response =>
            $('#districts').append('<option value="' + response.id + '">' + response
              .text +
              '</option>')
          );
        } else {
          $("#districts").empty().append(
            "<option disabled='disabled' SELECTED>Kecamatan Masih Kosong</option>"
          );
        }
      },
      error: function (error) {
        console.log(error);
      }
    });
  });
  $('#districts').on('change', function () {
    var selected = $('#districts').val();
    var jenjang = $('#level').val();
    $.ajax({
      url: 'register/get_school',
      type: "POST",
      data: {
        kode_kec: selected,
        level: jenjang,
      },
      success: function (response) {
        response = JSON.parse(response);
        console.log(response);
        if (response.length != 0) {
          $("#school").empty().append(
            "<option disabled='disabled' SELECTED>Silahkan Pilih Sekolah</option>"
          );
          $("#school").prop("disabled", false);
          response.forEach(response =>
            $('#school').append('<option value="' + response.id + '">' + response
              .text +
              '</option>')
          );
        } else {
          $("#school").empty().append(
            "<option disabled='disabled' SELECTED>Sekolah Masih Kosong</option>"
          );
        }
      },
      error: function (error) {
        console.log(error);
      }
    });
  });
});