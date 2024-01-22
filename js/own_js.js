$(document).ready(function () {
  $("#myElement").hide();
  $("#relocation_content").hide();
  $("#proposal_content").hide();
  $("#refer_content").hide();
  $("#message").prop("required", false);

  $(document).ready(function () {
    $("#refer_show").each(function () {
      if ($(this).is(":checked")) {
        $("#filled_refer_content").show();
      } else {
        $("#filled_refer_content").hide();
      }
    });
  });


  $(".iti--allow-dropdown").css('width', '102%')
  $(".iti--allow-dropdown").css('margin-top', '8px')

  var checkedValue = $('#filled_form_afghan_check:checked').val();
  if (checkedValue == 'on') {
    $("#filled_form_afghan_check_field").show();
  } else {
    $("#filled_form_afghan_check_field").hide();

  }

  $("#filled_form_afghan_check").change(function () {
    if ($(this).is(":checked")) {
      $("#filled_form_afghan_check_field").show();
      $("#province").prop("required", true);
      $("#volaswali").prop("required", true);

    } else {
      $("#province").prop("required", false);
      $("#volaswali").prop("required", false);
    }
  });

  $("#showHideCheckbox").change(function () {
    if ($(this).is(":checked")) {
      $("#myElement").show();
      $("#province").prop("required", true);
      $("#tazkira").prop("required", true);
      $("#volaswali").prop("required", true);
    } else {
      $("#myElement").hide();
      $("#province").prop("required", false);
      $("#tazkira").prop("required", false);
      $("#volaswali").prop("required", false);
    }
  });

  $("#filled_showHideCheckbox").change(function () {
    if ($(this).is(":checked")) {
      $("#filled_myElement").show();
      $("#province").prop("required", true);
      $("#tazkira").prop("required", true);
      $("#volaswali").prop("required", true);
    } else {
      $("#filled_myElement").hide();
      $("#province").prop("required", false);
      $("#tazkira").prop("required", false);
      $("#volaswali").prop("required", false);
    }
  });

  $("#live_in_afghanistan_no").change(function () {
    if ($(this).is(":checked")) {
      $("#relocating_quesion").css('display', '');
    }

  })

  $("#live_in_afghanistan_yes").change(function () {
    if ($(this).is(":checked")) {
      $("#relocating_quesion").css('display', 'none');
      $("#relocation_content").css('display', 'none');
    }
  })

  $("#filled_live_in_afghanistan_no").change(function () {
    if ($(this).is(":checked")) {
      $("#filled_relocating_quesion").css('display', '');
    }

  })

  $("#filled_live_in_afghanistan_yes").change(function () {
    if ($(this).is(":checked")) {
      $("#filled_relocating_quesion").css('display', 'none');
      $("#filled_relocation_content").css('display', 'none');
    }
  })


  $("#relocation_show").change(function () {
    if ($(this).is(":checked")) {
      $("#relocation_content").show();
      $('#engagement').prop('required', true)
      $('#period_of_engagement').prop('required', true)
    }
  });

  $("#relocation_hide").change(function () {
    if ($(this).is(":checked")) {
      $("#relocation_content").hide();
      $("#engagement").prop("required", false);
      $("#period_of_engagement").prop("required", false);
    }
  });

  $("#filled_relocation_show").change(function () {
    if ($(this).is(":checked")) {
      $("#filled_relocation_content").show();
      $('#engagement').prop('required', true)
      $('#period_of_engagement').prop('required', true)
    }
  });

  $("#filled_relocation_hide").change(function () {
    if ($(this).is(":checked")) {
      $("#filled_relocation_content").hide();
      $("#engagement").prop("required", false);
      $("#period_of_engagement").prop("required", false);
    }
  });

  $("#proposal_show").change(function () {
    if ($(this).is(":checked")) {
      $("#proposal_content").show();
      // $('#proposal_attachments').prop('required', true)
      $('#start_work').prop('required', true)
      $('#sectors').prop('required', true)
      // $('#proposal_message').prop('required', true)
    }
  });

  $("#proposal_hide").change(function () {
    if ($(this).is(":checked")) {
      $("#proposal_content").hide();
      $('#proposal_attachments').prop('required', false)
      $('#start_work').prop('required', false)
      $('#sectors').prop('required', false)
      $('#proposal_message').prop('required', false)
    }
  });

  $("#filled_proposal_show").change(function () {
    if ($(this).is(":checked")) {
      $("#Filled_proposal_content").show();
      // $('#proposal_attachments').prop('required', true)
      $('#start_work').prop('required', true)
      $('#sectors').prop('required', true)
      // $('#proposal_message').prop('required', true)
    }
  });

  $("#filled_proposal_hide").change(function () {
    if ($(this).is(":checked")) {
      $("#Filled_proposal_content").hide();
      $('#proposal_attachments').prop('required', false)
      $('#start_work').prop('required', false)
      $('#sectors').prop('required', false)
      $('#proposal_message').prop('required', false)
    }
  });

  $("#refer_show").change(function () {
    if ($(this).is(":checked")) {
      $("#refer_content").show();
      $('#ref_person_name').prop('required', true)
      $('#ref_relation_with').prop('required', true)
      $('#ref_email_address').prop('required', true)
      $('#phone1').prop('required', true)
      $('#message').prop('required', true)
    }
  });

  $("#refer_hide").change(function () {
    if ($(this).is(":checked")) {
      $("#refer_content").hide();
      $('#ref_person_name').prop('required', false)
      $('#ref_relation_with').prop('required', false)
      $('#ref_email_address').prop('required', false)
      $('#phone1').prop('required', false)
      $('#message').prop('required', false)
    }
  });

  $('#province').change(function () {
    var province = $(this).val();
    var url_address = 'backend/districts.php?province=' + province;

    $('#volaswali').empty();
    // console.log(url)

    $.ajax({
      url: url_address, // Replace with your server-side script URL
      method: 'get',
      dataType: 'json',
      success: function (response) {

        var selectHTML = '';

        for (var i = 0; i < response.length; i++) {
          var option = '<option value="' + response[i][2] + '">' + response[i][2] + '</option>';
          selectHTML += option;
        }
        $('#volaswali').append(selectHTML);
      },
      error: function (xhr, status, error) {
        // Handle any errors that occur during the AJAX request
        console.log(xhr.responseText);
      }
    });
  })


});