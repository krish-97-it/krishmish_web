var CUSTOM_FUNCTIONS = {
    apiUrl  :   "/wp-json/custom-api/v1/create_update_data",

    nameValidation : function(ele,error_msg_key,errorMessage){
        var sel = jQuery(ele);
        var sel_value = sel.val().trim();
        var keyName = error_msg_key ? error_msg_key : 'Name';
        var msg = '';
        var reg_exp = /^[a-zA-Z][a-zA-Z\-\ \.]{2,}$/i;
        sel.siblings('.input-error-msg').remove();
        if (!sel_value || sel_value === null) {
            msg = keyName + ' is required.';
        } else if (sel_value.length <= 2) {
            msg = 'Name should be minimum 3 characters.';
        } else if (!sel_value.match(reg_exp)) {
            msg = errorMessage ? errorMessage : 'Accepts alphabets only.';
        } else {
            msg = '';
        }
        if (msg) {
            sel.addClass('input-error').removeClass('input-valid');
            sel.after('<div class="input-error-msg">' + msg + '</div>');
            return false;
        } else {
            sel.removeClass('input-error');
            sel.addClass('input-valid');
            return true;
        }
    },

    emailValidation : function(ele,isOptional,errorMessage){
        var sel = jQuery(ele);
        var sel_value = sel.val();
        var msg = '';
        var reg_exp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,13}))$/;
        sel.siblings('.input-error-msg').remove();
        if (!isOptional && (!sel_value || sel_value === null)) {
            msg = 'Email-id is required.';
        } else if (sel_value && sel_value !== null && !sel_value.match(reg_exp)) {
            msg = errorMessage ? errorMessage : 'Email-id is not valid.';
        }
        if (msg) {
            sel.addClass('input-error').removeClass('input-valid');
            sel.after('<div class="input-error-msg">' + msg + '</div>');
            return false;
        } else {
            sel.removeClass('input-error');
            !isOptional && sel.addClass('input-valid');
            return true;
        }
    },

    phoneValidation : function(ele,errorMessage){
        var sel = jQuery(ele);
        var sel_value = sel.val();
        var msg = '';
        var reg_exp = /^\d{10}$/;
        sel.siblings('.input-error-msg').remove();
        if (!sel_value || sel_value === null) {
            msg = 'Mobile No. is required.';
        } else if (!sel_value.match(reg_exp)) {
            msg = errorMessage ? errorMessage : 'Mobile No. should be 10 digits.';
        }
        if (msg) {
            sel.addClass('input-error').removeClass('input-valid');
            sel.after('<div class="input-error-msg">' + msg + '</div>');
            return false;
        } else {
            sel.removeClass('input-error');
            sel.addClass('input-valid');
            return true;
        }
    },

    optionalPhoneValidation : function(ele,isOptional,errorMessage){
        var sel = jQuery(ele);
        var sel_value = sel.val();
        var msg = '';
        var reg_exp = /^\d{10}$/;
        sel.siblings('.input-error-msg').remove();
        if (!isOptional && (!sel_value || sel_value === null)) {
            msg = 'Mobile No. is required.';
        } else if (sel_value && !sel_value.match(reg_exp)) {
            msg = errorMessage ? errorMessage : 'Mobile No. should be 10 digits.';
        }
        if (msg) {
            sel.addClass('input-error').removeClass('input-valid');
            sel.after('<div class="input-error-msg">' + msg + '</div>');
            return false;
        } else {
            sel.removeClass('input-error');
            !isOptional && sel.addClass('input-valid');
            return true;
        }
    },

    numericValidation: function (ele, error_msg_key) {
        var sel = jQuery(ele);
        var sel_value = sel.val();
        var msg = '';
        var reg_exp = /^(|-?\d+)$/;
        
        sel.siblings('.input-error-msg').remove();
        if (!sel_value || sel_value === null) {
            msg = 'Rank is required.';
        }
         else if (!sel_value.match(reg_exp)) {
            msg = 'Rank is required in numeric.';
        } 
        if (msg) {
            sel.addClass('input-error').removeClass('input-valid');
            sel.after('<div class="input-error-msg">' + msg + '</div>');
            return false;
        } else {
            sel.removeClass('input-error');
            sel.addClass('input-valid');
            return true;
        }
    },

    basicRequiredValidation : function(ele, form_id, error_msg_key) {
        var sel = jQuery(ele);
        var sel_value = sel.val();
        var msg = '';
        
        sel.siblings('.input-error-msg').remove();
        if (sel_value == '' || sel_value === null || sel_value == 'undefined') {
            msg = error_msg_key+ ' is required.';
        }

        if (msg) {
            sel.addClass('input-error').removeClass('input-valid');
            sel.after('<div class="input-error-msg">' + msg + '</div>');
            return false;
        } else {
            sel.removeClass('input-error');
            sel.addClass('input-valid');
            return true;
        }
    },

    clearFormData : function(){
        jQuery('.form-control').val('');
        jQuery('.form-control').removeClass('input-valid');
    },
}


jQuery(document).ready(function(){

    jQuery('li.dropdown-submenu a[data-toggle="dropdown"]').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        jQuery('li.dropdown-submenu').not(jQuery(this).parent()).removeClass('open');
        jQuery(this).parent().toggleClass('open');
    });


    var baseUrl                     =   window.location.origin;
    // var modal_content               =   jQuery('[user-profile-info-modal]');
    var go_to_reg_page              =   jQuery('[create-account-btn]');
    var data_login_btn              =   jQuery('[data-login-btn]');
    var user_firstname              =   jQuery('[name="user-firstname"]');
    var user_lastname               =   jQuery('[name="user-lastname"]');
    var user_dob                    =   jQuery('[name="user-dob"]');
    var user_gender                 =   jQuery('[name="user-gender"]');
    var user_email                  =   jQuery('[name="user-email"]');
    var user_phone                  =   jQuery('[name="user-phone"]');
    var u_phone                     =   jQuery('[name="existinguser-phone"]');
    var user_address                =   jQuery('[name="user-address"]');
    var data_register_btn           =   jQuery('[data-register-btn]');
    var sign_up_phone_input         =   jQuery('[sign-up-phone-input]');
    var validationFormFlag          =   true;
    var phoneValidationFlag         =   true;
    var validationUpdateFormFlag    =   true;
    var editBtn_ClickFlag           =   "0";


    // checkCookie? if present then tfetch existing user record
    let cookie_data     =   getCookie("registeredUser@KrishMish");
    console.log(cookie_data);
    if (cookie_data != "") {
        var spli_array = cookie_data.split("_");
        let u_phone = spli_array[1];
        console.log(u_phone)
        getExistingUser(u_phone,1);
    } else {
        jQuery('#signUpModal').modal();
    }

    // on click login btn on nav bar
    jQuery('.log-in-txt').click(function(){
        jQuery("#signUpModal").modal();
    })

    //Get Existing User Data when click on log in btn in modal with phone number
    jQuery(data_login_btn).click(function(){

        phoneValidationFlag  = phonenumberValidator(u_phone);
        if(phoneValidationFlag == true){
            var phone_val = u_phone.val()
            getExistingUser(phone_val, 0);
        }

        function phonenumberValidator(phone) {
            var valiatorInput = false;
            valiatorInput     =     CUSTOM_FUNCTIONS.phoneValidation(phone, '', 'Phone No.');
                                
            if(!valiatorInput) {
                CUSTOM_FUNCTIONS.phoneValidation(phone, '', 'Phone No.');
            } 
            return valiatorInput;
        }

    })

    //In case of new user, go to registration slide on click sign up btn
    jQuery(go_to_reg_page).click(function(){
        jQuery('.form-control').removeClass('input-error');
        jQuery('input-error-msg').empty();
        jQuery('#reg-modal-carousel').carousel(1);
    });

    // Once clicked on final regster btn on register slide
    jQuery(data_register_btn).click(function(){
        validationFormFlag  = registerFormValidator();
        if(validationFormFlag == true){
            newUserRegister();
        }else{
            // jQuery(error_msg_two).append('Required fields are missing');
        }
    });

    //Sign Up modal close btn
    jQuery('.sign-up-modal-close-btn').click(function(){
        jQuery('.form-control').removeClass('input-error');
        jQuery('.input-error-msg').empty();
        jQuery('#reg-modal-carousel').carousel(0);
    })

    // Open User profile on click user name on navbar
    jQuery('.registered-user-name').click(function(){
        jQuery('#regUserProfile').modal();
    });

    //edit user btn click
    jQuery('.edit-user-btn').click(function(){
        jQuery('.user-info-input').removeClass('user-info-p');
        jQuery('.user-info-input').attr('readonly',false);
        jQuery('.useer-info-phone').attr('readonly',true);
        jQuery('.save-edit-btn').removeClass('hidden');
        jQuery('.mob-no-change').removeClass('hidden');
        editBtn_ClickFlag = "1";
    })

    // on click of change to enable input for new phone number
    jQuery('.mob-no-change').click(function(){
        jQuery('.new-phone-field').removeClass("hidden")
    });

    // Update edited record
    jQuery('.save-edit-btn').click(function(){
        updateUserProfile();
    })

    //Auto Save 
    jQuery('.profile-cross-btn').click(function(){

        if(editBtn_ClickFlag == "1"){
            updateUserProfile();
        }else{
            jQuery('#regUserProfile').modal('hide');
        }
    })

    //log out btn click
    jQuery('.log-out-btn').click(function(){
        setCookie('registeredUser@KrishMish','',0);
        location.reload();
    })


    // Functions for signin/signup/get user data/Profile-edit/update/
    //new user register api ajax call
    function newUserRegister(){
        jQuery.ajax({
            type     :   "POST",
            url      :   baseUrl + CUSTOM_FUNCTIONS.apiUrl,
            data     :   {
                "FirstName"     :   user_firstname.val(),
                "LastName"      :   user_lastname.val(),
                "Phone"         :   user_phone.val(),
                "NewPhone"      :   '',
                "Gender"        :   user_gender.val(),
                "Dob"           :   user_dob.val(),
                "Email"         :   user_email.val(),
                "Address"       :   user_address.val(),
                "Operation"     :   'insert'
            },
            datatype :   "JSON",
            success  :   function (response){
                // var res_data= jQuery.parseJSON(response);
                if(response.statusCode == '200'){
                    var cookie_value = 'registeredUser@KrishMish@estd2023_'+user_phone.val();
                    setCookie('registeredUser@KrishMish',cookie_value, 1);
                    location.reload();
                }else{
                    jQuery(sign_up_phone_input).after('<div class="input-error-msg">Mobile number is already registered.</div>');
                    jQuery(sign_up_phone_input).addClass('input-error').removeClass('input-valid');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
    }

    // check and get existing user data ajax call
    function getExistingUser(mob_no,cookie_enb){
        jQuery.ajax({
            type     :   "POST",
            url      :   baseUrl+"/wp-json/custom-api/v1/get_user_data",
            data     :   {
                "userMob"    :   mob_no
            },
            datatype :   "JSON",
            success  :   function (response){
               if(response.success == true){
                    var reg_user_fname       =   response.data[0].first_name;
                    var reg_user_lname       =   response.data[0].last_name;
                    var reg_user_phone       =   response.data[0].phone;
                    var reg_user_dob         =   response.data[0].dob;
                    var reg_user_gender      =   response.data[0].gender;
                    var reg_user_email       =   response.data[0].email;
                    var reg_user_address     =   response.data[0].address;
               
                    jQuery('.dynamic-navbar-right-data').empty();
                    jQuery('.dynamic-navbar-right-data').append('<li><a class="registered-user-name" data-toggle="modal" data-target="#regUserProfile"><span class="glyphicon glyphicon-user"></span><span class="get-user-name"> &nbsp'+ reg_user_fname+'</span></a></li>');
                    jQuery('.blink-heading').html('Hello '+reg_user_fname+'!!');
                    jQuery('.user-info-fname').val(reg_user_fname);
                    jQuery('.user-info-lname').val(reg_user_lname);
                    jQuery('.user-info-phone').val(reg_user_phone);
                    jQuery('.user-info-dob').val(reg_user_dob);
                    console.log(reg_user_gender)

                    jQuery('#user-gender option').each(function(){
                        var gender_opt      =   jQuery(this).val();
                        if(gender_opt == reg_user_gender){
                            jQuery(this).attr('selected','selected');
                        }
                    });

                    // jQuery('[name="user-info-gender"]').selectize()[0].selectize.setValue(reg_user_gender);
                    jQuery('.user-info-email').val(reg_user_email);
                    jQuery('.user-info-address').val(reg_user_address);

                    if(cookie_enb == 0){
                        var cookie_value = 'registeredUser@KrishMish@estd2023_'+reg_user_phone;
                        setCookie('registeredUser@KrishMish',cookie_value, 1);
                        location.reload();
                    }
               }else{
                    if(cookie_enb == 0){
                        jQuery('[name="existinguser-phone"]').after('<div class="input-error-msg">User not found.Try with some other number or create a new account</div>');
                        jQuery('[name="existinguser-phone"]').addClass('input-error').removeClass('input-valid');
                    }
               }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
    }

    function updateUserProfile(){
        var new_user_phone      =   jQuery('[name="user-info-new-phone"]');
        var user_firstname      =   jQuery('[name="user-info-fname"]');
        var user_lastname       =   jQuery('[name="user-info-lname"]');
        var user_email          =   jQuery('[name="user-info-email"]');
        var user_gender         =   jQuery('[name="user-info-gender"]');
        var user_dob            =   jQuery('[name="user-info-dob"]');
        var user_phone          =   jQuery('[name="user-info-phone"]');
        var user_address        =   jQuery('[name="user-info-address"]');

        if(new_user_phone.val() == '' || new_user_phone.val() == 'undefined'){
            phone_val           =   '';  
        }else{
            phone_val           =   new_user_phone.val();
        }

        validationUpdateFormFlag  =   updateFormValidator();

        if(validationFormFlag == true){
            jQuery.ajax({
                type     :   "POST",
                url      :   baseUrl + CUSTOM_FUNCTIONS.apiUrl,
                data     :   {
                    "FirstName"     :   user_firstname.val(),
                    "LastName"      :   user_lastname.val(),
                    "Phone"         :   user_phone.val(),
                    "NewPhone"      :   phone_val,
                    "Dob"           :   user_dob.val(),
                    "Gender"        :   user_gender.val(),
                    "Email"         :   user_email.val(),
                    "Address"       :   user_address.val(),
                    "Operation"     :   'update'
                },
                datatype :   "JSON",
                success  :   function (response){
                    if(response.statusCode == '200'){

                        if(phone_val != ''){
                            setCookie('registeredUser@KrishMish','',0);
                        }
                        jQuery('.swal')
                        Swal.fire({
                            customClass : {
                                title: 'swal2-title swal2-title-success'
                            },
                            title: 'Profile Updated Successfully',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false,
                        }).then((result) => {
                            location.reload();
                        })
                    }else{
                        if(phone_val != ''){
                            jQuery('[replace-new-number]').after('<div class="input-error-msg">'+response.text+'</div>');
                            jQuery('[sign_up_phone_input]').addClass('input-error').removeClass('input-valid');
                        }else{
                            Swal.fire({
                                title: 'Updation Failed!!',
                                icon: 'warning',
                                html: 'Something Went wrong<br><b>Or</b><br>No New Data to Update',
                                confirmButtonText: 'Close',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })
                        }
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                }
            }); 
        }

        // update form validator function
        function updateFormValidator() {
            var valiatorInput = false;
            valiatorInput     = 
                                CUSTOM_FUNCTIONS.nameValidation(user_firstname) &&
                                CUSTOM_FUNCTIONS.nameValidation(user_lastname) &&
                                CUSTOM_FUNCTIONS.emailValidation(user_email,'true') &&
                                CUSTOM_FUNCTIONS.basicRequiredValidation(user_gender, '', 'Gender') &&
                                CUSTOM_FUNCTIONS.basicRequiredValidation(user_dob, '', 'DOB') &&
                                CUSTOM_FUNCTIONS.basicRequiredValidation(user_address, '', 'Address') &&
                                CUSTOM_FUNCTIONS.phoneValidation(user_phone, '', 'Phone No.')&&
                                CUSTOM_FUNCTIONS.optionalPhoneValidation(new_user_phone,'true',);
                                
            if(!valiatorInput) {
                CUSTOM_FUNCTIONS.nameValidation(user_firstname);
                CUSTOM_FUNCTIONS.nameValidation(user_lastname);
                CUSTOM_FUNCTIONS.emailValidation(user_email,'true');
                CUSTOM_FUNCTIONS.basicRequiredValidation(user_gender, '', 'Gender');
                CUSTOM_FUNCTIONS.basicRequiredValidation(user_dob, '', 'DOB');
                CUSTOM_FUNCTIONS.basicRequiredValidation(user_address, '', 'Address');
                CUSTOM_FUNCTIONS.phoneValidation(user_phone, '', 'Phone No.');
                CUSTOM_FUNCTIONS.optionalPhoneValidation(new_user_phone,'true');
            } 
            return valiatorInput;
        }
    }

    // register form validator function
    function registerFormValidator() {
        var valiatorInput = false;
        valiatorInput     = 
                            CUSTOM_FUNCTIONS.nameValidation(user_firstname) &&
                            CUSTOM_FUNCTIONS.nameValidation(user_lastname) &&
                            CUSTOM_FUNCTIONS.emailValidation(user_email,'true') &&
                            CUSTOM_FUNCTIONS.basicRequiredValidation(user_gender, '', 'Gender') &&
                            CUSTOM_FUNCTIONS.basicRequiredValidation(user_dob, '', 'DOB') &&
                            CUSTOM_FUNCTIONS.basicRequiredValidation(user_address, '', 'Address') &&
                            CUSTOM_FUNCTIONS.phoneValidation(user_phone, '', 'Phone No.');
                            
        if(!valiatorInput) {
            CUSTOM_FUNCTIONS.nameValidation(user_firstname);
            CUSTOM_FUNCTIONS.nameValidation(user_lastname);
            CUSTOM_FUNCTIONS.emailValidation(user_email,'true');
            CUSTOM_FUNCTIONS.basicRequiredValidation(user_gender, '', 'Gender');
            CUSTOM_FUNCTIONS.basicRequiredValidation(user_dob, '', 'DOB');
            CUSTOM_FUNCTIONS.basicRequiredValidation(user_address, '', 'Address');
            CUSTOM_FUNCTIONS.phoneValidation(user_phone, '', 'Phone No.');
        } 
        return valiatorInput;
    }

    // set cookie function
    function setCookie(cname, cvalue, exdays) {
        const date_time = new Date();
        date_time.setTime(date_time.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires="+date_time.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
      
    // get cookie function from browser window
    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for(let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
    }
      
});