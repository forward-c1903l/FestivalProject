$(document).ready(function(){
    //Edit About Us
    let valNameDf = $('#name').val();
    let valAddressDf = $('#address').val();
    let valEmailDf = $('#email').val();
    let valPhoneDf = $('#phonenumber').val();

    $('#edit-company').click(function(e) {
        e.preventDefault();
        let error = {};
        $('.error').text('');
        //val current
        let valName = $('#name').val();
        let valAddress = $('#address').val();
        let valEmail = $('#email').val();
        let valPhone = $('#phonenumber').val();

        if(valName === valNameDf && valAddress === valAddressDf && valEmail === valEmailDf && valPhone === valPhoneDf) {

        } else {
            
            if(valName === '') {
                error['name'] = 'Please Enter Name Company';
            }

            if(valAddress === '') {
                error['address'] = 'Please Enter Address Company';
            }

            if(valEmail === '') {
                error['email'] = 'Please Enter Email';
            } else {
                let validateEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(!validateEmail.test(valEmail)) {
                    error['email'] = 'Please enter the correct Email format !';
                }
            }

            if(valPhone === '') {
                error['phonenumber'] = 'Please Enter Phonenumber';
            } else {
                let regulaExPhone = /((09|03|07|08|05)+([0-9]{8})\b)/;
                let check = regulaExPhone.test(valPhone);
                if(!check) {
                    error['phonenumber'] = 'Please enter the correct Phone Number format !';
                }
            }

            
            if(jQuery.isEmptyObject(error)) {
                let about = {
                    name: valName,
                    address: valAddress,
                    email: valEmail,
                    phonenumber: valPhone
                };

                $.ajax({
                    url: 'handle_general.php',
                    method: 'post',
                    data: {company: {action: 'about', about}}
                }).done(function(res) {
                    if(res === 'Success') {
                        toastr.success('You have successfully changed About Us! ');

                        setTimeout(() => {
                            location.reload();
                            window.scrollTo({top: 0});
                        }, 1200);
                    }
                })

            } else {
                for(let key in error) {
                    $(`#error_${key}`).text(error[key]);
                }
            }

        }

    })


    //change value stt payment method
    $('input[type=checkbox').on('change', function() {
        let id = $(this).val();
        $.ajax({
            url: 'handle_general.php',
            method: 'post',
            data: {company: {action: 'payment_method', id}}
        }).done(function(res) {
            if(res === 'Success') {
                toastr.success('You have just changed the payment method successfully!');

                setTimeout(() => {
                    location.reload();
                    window.scrollTo({top: 0});
                }, 900);
            }
        })
    })


    //add payment
    $('#add_payment').click(function(e) {
        e.preventDefault();
        $('#error_name_payment').text('');
        //val current
        let valNamePayment = $('#name_payment').val();

        if(valNamePayment === '') {
            $('#error_name_payment').text('Please Enter Name Payment Method');
        } else {
            $.ajax({
                url: 'handle_general.php',
                method: 'post',
                data: {company: {action: 'add_payment', value: valNamePayment}}
            }).done(function(res) {
                if(res === 'Success') {
                    toastr.success('You have successfully added the payment method!');

                    setTimeout(() => {
                        location.reload();
                        window.scrollTo({top: 0});
                    }, 1200);
                } else {
                    toastr.error(res); 
                }
            })
        }
    })

    //add gallery
    $('#add_gallery').click(function() {
        $('#error_img_gallery').text('');

        let fileImg = $('#img_gallery').prop('files')[0];
        //check image
        if(typeof(fileImg) === 'undefined') {
            $('#error_img_gallery').text('Please Enter Image');
        } else {
            let type = fileImg.type;
            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

            if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
                let  formGallery = new FormData();
                formGallery.append('file_image', fileImg);
                formGallery.append('action', 'add_gallery');// acction = add

                $.ajax({
                    url: 'handle_general.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formGallery,
                    type: 'post',
                    success: function (res) {
                        if(res === 'Success') {
                            toastr.success('You have successfully added the gallery.');
    
                            setTimeout(() => {
                                location.reload();
                                window.scrollTo({top: 800});
                            }, 1200);
                        } else {
                            toastr.error('Error!');
                        }
                    }
                });


            } else {
                $('#error_img_gallery').text('Please enter the image format !');
            }
        }
    })


    //delete item gallery
    $('button[name=btn-delete-gallery]').click(function() {
        let id = $(this).data('id-gallery');

        $.ajax({
            url: 'handle_general.php',
            method: 'post',
            data: {company: {action: 'del_item_gallery', id}}
        }).done(function(res) {
            if(res === 'Success') {
                toastr.success('You have successfully deleted photos in the galler');

                setTimeout(() => {
                    location.reload();
                    window.scrollTo({top: 900});
                }, 1200);
            }
        })


    })

    //gallery
    $('.gallery').masonry({
        itemSelector: '.galerry-item',
        columnWidth: 0,
        percentPosition: true
    })

})