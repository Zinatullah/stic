$(document).ready(function () {
    if ($('#svg1').length) {
        $('#svg1').on('click', () => {
            $('#ref_name_1').removeAttr('disabled');
            $('#ref_name_1').css('background-color', 'white');
            $('#ref_relation_1').removeAttr('disabled');
            $('#ref_relation_1').css('background-color', 'white');
            $('#ref_email_1').removeAttr('disabled');
            $('#ref_email_1').css('background-color', 'white');
            $('.phone_1').removeAttr('disabled');
            $('.phone_1').css('background-color', 'white');
            $('#ref_edit_btn2').css('display', 'block')
        })
    }
    
    if ($('#svg2').length) {
        $('#svg2').on('click', () => {
            $('#ref_name_2').removeAttr('disabled');
            $('#ref_name_2').css('background-color', 'white');
            $('#ref_relation_2').removeAttr('disabled');
            $('#ref_relation_2').css('background-color', 'white');
            $('#ref_email_2').removeAttr('disabled');
            $('#ref_email_2').css('background-color', 'white');
            $('.phone_2').removeAttr('disabled');
            $('.phone_2').css('background-color', 'white');
            $('#ref_edit_btn3').css('display', 'block')
        })
    }

    if ($('#svg3').length) {
        $('#svg3').on('click', () => {
            $('#ref_name_3').removeAttr('disabled');
            $('#ref_name_3').css('background-color', 'white');
            $('#ref_relation_3').removeAttr('disabled');
            $('#ref_relation_3').css('background-color', 'white');
            $('#ref_email_3').removeAttr('disabled');
            $('#ref_email_3').css('background-color', 'white');
            $('.phone_3').removeAttr('disabled');
            $('.phone_3').css('background-color', 'white');
            $('#ref_edit_btn4').css('display', 'block')
        })
    }
})