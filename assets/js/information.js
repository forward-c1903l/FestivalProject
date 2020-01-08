$(document).ready(function() {

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
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
                        data: {userComplete: userChange},
                        beforeSend: function() {
                            $.LoadingOverlay("show");
                        },
                    }).done(function(data) {
                        $.LoadingOverlay("hide");
                        if(data === 'Success') {
                            // remove error
                            $('.error').text('');

                            toastr.success('You have successfully changed account information');

                            setTimeout(() => {
                                location.reload();
                            }, 1300);
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




    // ---------------------- Invoice --------------------- //
    // change quantity
    let ipQuanIn = $('.ip-quantity');
    let quantityDefault = 0;
    ipQuanIn.on('focusin', function() {
        quantityDefault = $(this).val();
    })

    ipQuanIn.change(function(e) {

        let $this = $(this);
        let valIpQuanIn = e.target.value;
        let name = e.target['name'];

        $.ajax({
            url: 'edit-invoice.php',
            method: 'post',
            data: {itemChange: {idItem: name, valItem: valIpQuanIn, valDefault: quantityDefault}}
        }).done(function(data) {
            let dataNew = JSON.parse(data);

            if(dataNew['status']) {
                //Update total
                let total = `${dataNew['msg']} VND`;
                $('#total-invoice').text(total);
                toastr.success('You have successfully updated your invoice !');
            } else if(!dataNew['status'] && dataNew['error'] === 'inventory'){
                $this.val(quantityDefault);

                let textError = `Item ${dataNew['name']} exceeds the allowed limit.Please try again!`;
                toastr.error(textError);
            }
            else {
                alert(dataNew['msg']);
            }
        })
    })

    // delete
    let btnDelete = $('.detele_item');

    btnDelete.click(function() {
        btnDelete.attr('name', 'detele-item');
        $('#show-popup').css('display','block');
        $(this).attr('name', 'active-delete');
    })

    $('#yes-delete').click(function() {
        let btnActiveDelete = $("button[name='active-delete']");
        let valIdDelete = btnActiveDelete.val();
        
        if(typeof(valIdDelete) !== 'undefined') {
            $.ajax({
                url: 'edit-invoice.php',
                method: 'post',
                data: {delete: valIdDelete}
            }).done(function(data) {
                if(data === "Success") {
                    $('#show-popup').css('display', 'none');
                    toastr.success('You have successfully deleted this item!!');

                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                }
            })
        }
    })

    $('#btn-close-popup').click(function() {
        $('#show-popup').css('display', 'none');
        btnDelete.attr('name', 'detele-item');
    })
})