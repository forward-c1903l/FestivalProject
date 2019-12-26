$(document).ready(function() {

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // Userinfor
    let inputChangePw = $('#change_password');
    let groupPassword = $('.group-password');
    let btnSubmit = $('#submit_change_user');
    let formSubmit = $('#form_change_user');

    // DOM element input
    const fullname = $('#full_name');
    const phone = $('#phonenumber');
    const address = $('#address');


    //toggle Group Password
    inputChangePw.click(function() {
        groupPassword.toggle("linear");
    })

    // Get the first value of the input
    let valFullnameFi = fullname.val();
    let valPhoneFi = phone.val();
    let valAddressFi = address.val();


    btnSubmit.click(function() {
        // Get the current value
        let valFullnameCu = fullname.val();
        let valPhoneCu = phone.val();
        let valAddressCu = address.val();
        
        let userChange = {};

        if(valFullnameCu !== valFullnameFi) {
            userChange['fullname'] = valFullnameCu;
        }

        if(valPhoneFi !== valPhoneCu) {
            userChange['phonenumber'] = valPhoneCu;
        }

        if(valAddressFi !== valAddressCu) {
            userChange['address'] = valAddressCu;
        }

        if(inputChangePw.is(':checked')) {
            userChange['oldpassword'] = $('#old_password').val();
            userChange['newpassword'] = $('#new_password').val();
            userChange['Cnewpassword'] = $('#Cnew_password').val();
        }

        // There has been a change
        if(Object.keys(userChange).length > 0) {
            let status = false;
            let error = {};

            for(const key in userChange) {
                if(userChange[key] === '') {
                    error[key] = 'Please enter a value !';
                } else {
                    error[key] = '';

                    switch(key) {
                        case 'phonenumber': 
                            let regulaExPhone = /((09|03|07|08|05)+([0-9]{8})\b)/;
                            let check = regulaExPhone.test(userChange[key]);
                            if(!check) {
                                error[key] = 'Please enter the correct Phone Number format !';
                            }
                            break;
                        case 'fullname' :
                            let checkFullName = userChange[key].length;
                            if(checkFullName > 30) {
                                error[key] = 'The fullname must only contain 30 characters !';
                            }
                            break;
                        case 'oldpassword' :
                            // Call Ajax check password
                            $.ajax({
                                url: formSubmit.attr('action'),
                                method: formSubmit.attr('method'),
                                data: {oldpassword: userChange[key]}
                            }).done(function(data) {
                                if(data !== ''){
                                    error[key] = data;
                                }
                            })
                            break;    
                        default:
                    }

                    // check Confirm New password
                    if(key === 'newpassword' || key === 'Cnewpassword') {
                        if(userChange['newpassword'] !== userChange['Cnewpassword']) {
                            error['Cnewpassword'] = 'The password is not the same! ';
                        } else if(userChange['newpassword'] === userChange['oldpassword']){
                            error['newpassword'] = 'The new password is not allowed to be the same as the old password! ';
                        }
                    }

                }
            }

            //Waiting for server response when checking password should be in settimeout
            setTimeout(function() {
                // Element Error
                let statusComplete = true;
                for ( let key in error ) {
                    let stringElement = `#error_${key}`;
                    $(stringElement).text(error[key]);
                }

                for ( let key in error ) {
                    if(error[key] !== '') {
                        statusComplete = false;
                        break;
                    }
                }
                
                if(statusComplete) {
                    // No more errors then call the server
                    $.ajax({
                        url: formSubmit.attr('action'),
                        method: formSubmit.attr('method'),
                        data: {userComplete: userChange}
                    }).done(function(data) {
                        if(data === 'Success') {
                            toastr.success('You have successfully changed account information');
                        }
                    })
                }
                
            }, 500)

        } else {
            //If an error has occurred, re-enter the original value

            let errorElement = $('.error');
            errorElement.text('');
        }

    })




    //Receipt

})