$(document).ready(function() {

    // Block out Submit Input
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    $('#submit-contact').click(function(e) {
        e.preventDefault();
        let error = {};
        $('.error').text('');
        
        let fullname = $('#fullname').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let subject = $('#subject').val();
        let message = $('#message').val();

        if(fullname === '') {
            error['fullname'] = 'Please Enter Fullname !';
        }

        if(email === '') {
            error['email'] = 'Please Enter Email !';
        } else {
            let validateEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(!validateEmail.test(email)) {
                error['email'] = 'Email address is not valid !';
            }
        }

        if(phone === ''){
            error['phone'] = 'Please Enter PhoneNumber !';
        } else {
            let validatePhoneNumber = /((09|03|07|08|05)+([0-9]{8})\b)/;
            if(!validatePhoneNumber.test(phone)) {
                error['phone'] = 'PhoneNumber is not valid !';
            }
        }

        if(subject === '') {
            error['subject'] = 'Please Enter Subject !';
        }

        if(message === '') {
            error['message'] = 'Please Enter Message !';
        }

        if(jQuery.isEmptyObject(error)) {
            let contact = {
                fullname,
                email,
                phone,
                subject,
                message
            };

            $.ajax({
                url: 'contact.php',
                method: 'post',
                data: {contact},
                beforeSend: function() {
                    $.LoadingOverlay("show");
                },
            }).done(function(res) {
                $.LoadingOverlay("hide");
                if(res === 'Success') {
                    toastr.success('You have successfully sent feedback!');

                    setTimeout(() => {
                        location.reload();
                        window.scrollTo({top: 0});
                    }, 1300);
                } else {
                    toastr.error(res);
                }
            })


        } else {
            error.fullname ? $('#error_fullname').text(error.fullname) : $('#error_fullname').text('');
            error.email ? $('#error_email').text(error.email) : $('#error_email').text('');
            error.phone ? $('#error_phone').text(error.phone) : $('#error_phone').text('');
            error.subject ? $('#error_subject').text(error.subject) : $('#error_subject').text('');
            error.message ? $('#error_message').text(error.message) : $('#error_message').text('');
        }
    })
})