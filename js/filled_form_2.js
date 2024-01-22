$(document).ready(function () {
    // Personal info
    $('#personal_info').on('click', () => {
        $('#first_name').removeAttr('disabled');
        $('#first_name').css('background-color', 'white');
        $('#last_name').removeAttr('disabled');
        $('#last_name').css('background-color', 'white');
        $('#date').removeAttr('disabled');
        $('#date').css('background-color', 'white');
        $('#birth').removeAttr('disabled');
        $('#birth').css('background-color', 'white');
        $('#nationality').removeAttr('disabled');
        $('#nationality').css('background-color', 'white');
        $('#nationality_second').removeAttr('disabled');
        $('#nationality_second').css('background-color', 'white');
        $('#residential_country').removeAttr('disabled');
        $('#residential_country').css('background-color', 'white');
        $('#pprovince').removeAttr('disabled');
        $('#pprovince').css('background-color', 'white');
        $('#pdistrict').removeAttr('disabled');
        $('#pdistrict').css('background-color', 'white');
        $('#tazkira').removeAttr('disabled');
        $('#tazkira').css('background-color', 'white');
        $('#volaswali').removeAttr('disabled');
        $('#volaswali').css('background-color', 'white');
        $('#province').removeAttr('disabled');
        $('#province').css('background-color', 'white');
        $('#personal_info_btn').css('display', 'block')
    })

    // Education
    $('#education').on('click', () => {
        console.log("CHECK")
        $('#qualification').removeAttr('disabled');
        $('#qualification').css('background-color', 'white');
        $('#specialization').removeAttr('disabled');
        $('#specialization').css('background-color', 'white');
        $('#university').removeAttr('disabled');
        $('#university').css('background-color', 'white');
        $('#university_country').removeAttr('disabled');
        $('#university_country').css('background-color', 'white');
        $('#profession').removeAttr('disabled');
        $('#profession').css('background-color', 'white');
        $('#experience').removeAttr('disabled');
        $('#experience').css('background-color', 'white');
        $('#job_titile').removeAttr('disabled');
        $('#job_titile').css('background-color', 'white');
        $('#employer').removeAttr('disabled');
        $('#employer').css('background-color', 'white');
        $('#employement_country').removeAttr('disabled');
        $('#employement_country').css('background-color', 'white');
        $('#area_of_contirubution').removeAttr('disabled');
        $('#area_of_contirubution').css('background-color', 'white');
        $('#education_info_btn').css('display', 'block')
    })
    
    // Relocation
    $('#relocation').on('click', () => {
        $('#city').removeAttr('disabled');
        $('#city').css('background-color', 'white');
        $('#engagement').removeAttr('disabled');
        $('#engagement').css('background-color', 'white');
        $('#period_of_engagement').removeAttr('disabled');
        $('#period_of_engagement').css('background-color', 'white');
        $('#relocation_btn').css('display', 'block')
        
    })
    
    // Proposal content
    $('#proposal').on('click', () => {
        $('#sector').removeAttr('disabled');
        $('#sector').css('background-color', 'white');
        // $('#proposal_attachments').removeAttr('disabled');
        // $('#proposal_attachments').css('background-color', 'white');
        $('#start_work').removeAttr('disabled');
        $('#start_work').css('background-color', 'white');
        $('#proposal_message').removeAttr('disabled');
        $('#proposal_message').css('background-color', 'white');
        $('#project_requirements').removeAttr('disabled');
        $('#project_requirements').css('background-color', 'white');
        $('#edit_attach').css('display', '')
        $('#proposal_attachments').css('display', 'none')
        
        $('#proposal_btn').css('display', 'block')
    })
    
    // Contact Details
    $('#contact_detail').on('click', () => {
        $('#phone').removeAttr('disabled');
        $('#phone').css('background-color', 'white');
        $('#email_address').removeAttr('disabled');
        $('#email_address').css('background-color', 'white');
        $('#website_address').removeAttr('disabled');
        $('#website_address').css('background-color', 'white');
        $('#linkedin_page').removeAttr('disabled');
        $('#linkedin_page').css('background-color', 'white');
        $('#feedback').removeAttr('disabled');
        $('#feedback').css('background-color', 'white');
        $('#contact_btn').css('display', 'block')
    })
    
    // Ref.Contact Details
    $('#ref_contact_detail').on('click', () => {
        $('#ref_person_name').removeAttr('disabled');
        $('#ref_person_name').css('background-color', 'white');
        $('#ref_relation_with').removeAttr('disabled');
        $('#ref_relation_with').css('background-color', 'white');
        $('#ref_email_address').removeAttr('disabled');
        $('#ref_email_address').css('background-color', 'white');
        $('#phone1').removeAttr('disabled');
        $('#phone1').css('background-color', 'white');
        $('#ref_btn').css('display', 'block')
    })

    // Sign up page
    $('#comfirm_password').on('keyup', () => {
        var pwe = $('#comfirm_password').val();
        var pwd = $("#password").val();
        if (pwd != pwe) {
            $("#errorMessage").css('display', 'block')
            $("#successMessage").css('display', 'none')
            $("#submit").prop('disabled', 'true');
        } else {
            $("#errorMessage").css('display', 'none')
            $("#successMessage").css('display', 'block')
            $("#submit").removeAttr('disabled');
        }
    });




})