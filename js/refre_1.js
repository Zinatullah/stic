const myForm = document.getElementById("email-list");
const filled_form_btn = $("#filled_form_reference_buttn").hide();

var id = 100;
id_of_phone = ''
function addEmailField() {
  const filled_form_btn = $("#filled_form_reference_buttn").show();

  id++;
  id_of_phone = 'phone' + id;
  const nef_wrapper = document.createElement("div");
  var divElement = document.createElement("div");
  var divElement1 = document.createElement("div");
  var divElement2 = document.createElement("div");
  var divElement3 = document.createElement("div");

  nef_wrapper.setAttribute("class", "row col-lg-12");
  divElement.setAttribute("class", "col-lg-6");
  divElement1.setAttribute("class", "col-lg-6");
  divElement2.setAttribute("class", "col-lg-6");
  divElement3.setAttribute("class", "col-lg-5");
  divElement3.setAttribute("style", "margin-top: 8px; margin-left: 8px; width:100%");

  const btnAdd = document.createElement("button");
  const btnDel = document.createElement("button");

  // Add Class to main wrapper
  nef_wrapper.classList.add("email-input__w");


  btnDel.type = "button";
  btnDel.classList.add("btn-del-input");
  btnDel.innerText = "Remove -";

  btnDel.setAttribute('style', 'margin-left: 25px; margin-top: 10px')

  // btnDel.css('margin-left', '10px')
  var inputElement = document.createElement("input");
  var inputElement1 = document.createElement("input");
  var inputElement2 = document.createElement("input");
  var inputElement3 = document.createElement("input");

  // Ref.Name
  inputElement.setAttribute("class", "form-control p-2 m-2");
  inputElement.setAttribute("type", "text");
  inputElement.setAttribute("id", "ref_person_name");
  inputElement.setAttribute("name", "ref_person_name[]");
  inputElement.setAttribute("placeholder", "Referred (Ref.) Person Name *");
  inputElement.setAttribute("required", "true");

  // Ref.relation
  inputElement1.setAttribute("class", "form-control p-2 m-2");
  inputElement1.setAttribute("type", "text");
  inputElement1.setAttribute("id", "ref_relation_with");
  inputElement1.setAttribute("name", "ref_relation_with[]");
  inputElement1.setAttribute("placeholder", "Your relation with the referred person? *");
  inputElement1.setAttribute("required", "true")

  // Ref.email
  inputElement2.setAttribute("class", "form-control p-2 m-2");
  inputElement2.setAttribute("type", "email");
  inputElement2.setAttribute("id", "ref_email_address");
  inputElement2.setAttribute("name", "ref_email_address[]");
  inputElement2.setAttribute("placeholder", "Ref. Email Address *");
  inputElement2.setAttribute("required", "true")

  // Ref.phone
  inputElement3.setAttribute("class", "form-control");
  inputElement3.setAttribute("class", ".iti--allow-dropdown");
  inputElement3.setAttribute("id", id_of_phone);
  inputElement3.setAttribute("type", "tel");
  inputElement3.setAttribute("name", 'ref_phone[]');
  inputElement3.setAttribute("placeholder", "Ref. Phone number *");
  inputElement3.setAttribute("required", "true")
  inputElement3.setAttribute('style', 'height: 42px; margin-top: 10px; width: 210%;')

  $('#iti-2__country-listbox').children().addClass('Uffffffffff');
  // $('#iti-3__country-listbox').children().addClass('refre_2');

  //append elements to main wrapper

  divElement.appendChild(inputElement);
  divElement1.appendChild(inputElement1);
  divElement2.appendChild(inputElement2);
  divElement3.appendChild(inputElement3);

  nef_wrapper.appendChild(divElement);
  nef_wrapper.appendChild(divElement1);
  nef_wrapper.appendChild(divElement2);
  nef_wrapper.appendChild(divElement3);
  nef_wrapper.appendChild(btnDel);

  // append element to DOM
  myForm.appendChild(nef_wrapper);
  btnDel.addEventListener("click", removeEmailField);

  $(document).ready(function () {
    var phoneInputField22 = document.querySelector(`#${id_of_phone}`);
    var phoneInput12 = window.intlTelInput(phoneInputField22, {
      utilsScript: "js/utils.js",
    });

  });
}

//remove element from DOM
function removeEmailField(el) {
  const field = el.target.parentElement;
  field.remove();
}

$(document).ready(function () {
  $(document).on("click", "#iti-2__country-listbox", function () {
    $('#iti-2__country-listbox').children().addClass('Uffffffffff');
    $(document).on("click", ".Uffffffffff", function () {
      var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
      $("#phone101").val("+" + dialCode);
    });
  });
})

$(document).ready(function () {
  $(document).on("click", "#iti-3__country-listbox", function () {
    $('#iti-3__country-listbox').children().addClass('refre_1');
    $(document).on("click", ".refre_1", function () {
      var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
      $("#phone102").val("+" + dialCode);
    });
  });
})

$(document).ready(function () {
  $(document).on("click", "#iti-4__country-listbox", function () {
    $('#iti-4__country-listbox').children().addClass('refre_2');
    $(document).on("click", ".refre_2", function () {
      var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
      $("#phone103").val("+" + dialCode);
    });
  });
})

$(document).ready(function () {
  $(document).on("click", "#iti-5__country-listbox", function () {
    $('#iti-5__country-listbox').children().addClass('refre_3');
    $(document).on("click", ".refre_3", function () {
      var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
      $("#phone104").val("+" + dialCode);
    });
  });
})

$(document).ready(function () {
  $(document).on("click", "#iti-6__country-listbox", function () {
    $('#iti-6__country-listbox').children().addClass('refre_4');
    $(document).on("click", ".refre_4", function () {
      var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
      $("#phone105").val("+" + dialCode);
    });
  });
})

$(document).ready(function () {
  $(document).on("click", "#iti-7__country-listbox", function () {
    $('#iti-7__country-listbox').children().addClass('refre_5');
    $(document).on("click", ".refre_5", function () {
      var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
      $("#phone106").val("+" + dialCode);
    });
  });
})