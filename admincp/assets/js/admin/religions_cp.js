$(document).ready(function(){

    //ADD
    $('#submit-add-reli').click(function() {
        let valName = $('#name_reli').val();
        let file = $('#img_reli').prop('files')[0];  

        if(valName === '' ) {
            $('.error').text('');
            $('#error_name').text('Please enter religion name !');
        } else if(typeof(file) === 'undefined') {
            $('.error').text('');
            $('#error_image').text('Please enter photos religions !');
        }  else {
            $('.error').text('');

            let type = file.type;
            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

            if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {

                var form = new FormData();

                form.append('file', file);
                form.append('name', valName);
                form.append('action', 'add');// acction = add
                
                $.ajax({
                    url: 'handle_reli.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form,
                    type: 'post',
                    success: function (res) {
                        if(res === 'Success') {
                            $('#name_reli').val('');
                            $('#img_reli').val('');
                            toastr.success('You have successfully entered!');
                        }
                    }
                });
            } else {
                $('#img_reli').val('');
                $('#error_image').text('Please enter the image format !');
            }
        }
    })


    //EDIT
    let valNameEditDf = $('#name_reli_edit').val();
    let valSttEditDf = $('#status_reli_edit').val();

    $("#submit-edit-reli").click(function() {
        $('.error').text('');
        let valNameEdit = $('#name_reli_edit').val();
        let valSttEdit = $('#status_reli_edit').val();
        let ImgEdit = $('#img_reli_edit').prop('files')[0];
        
        if(valNameEditDf === valNameEdit && valSttEditDf === valSttEdit && typeof(ImgEdit) === 'undefined') {
            console.log('khong doi');
        } else {
            let error = {};
            //Check Name empty
            if(valNameEdit === '') {
                error['name'] = 'Please enter a name !';
            } 
            if(valSttEdit === '1' || valSttEdit === '0') {
            } else {
                error['stt'] = 'Wrong value!';
            }

            if(typeof(ImgEdit) !== 'undefined') {
                let type = ImgEdit.type;
                var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];
    
                if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
                } else {
                    error['img'] = 'Please enter the correct image format! ';
                }
            }

            if(jQuery.isEmptyObject(error)) {

                var formEdit = new FormData();

                if(typeof(ImgEdit) !== 'undefined') {
                    formEdit.append('file', ImgEdit);
                }

                formEdit.append('name_edit', valNameEdit);
                formEdit.append('stt_edit', valSttEdit);
                formEdit.append('action', 'edit');// acction = add

                $.ajax({
                    url: 'handle_reli.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formEdit,
                    type: 'post',
                    success: function (res) {
                        if(res === 'Success') {
                            toastr.success('You have successfully entered!');

                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        } else {
                            toastr.error('Error!');
                        }
                    }
                });

            } else {
                error['name'] && $("#error_name_edit").text(error['name']);
                error['img'] && $("#error_image_edit").text(error['img']);
                error['stt'] && $("#error_stt_edit").text(error['stt']);
            }
        }
    })



    // --------------------------DELETE----------------------//
    $('#btn-delete-religion').click(function() {
        $('.pop-up-delete').css('display', 'block');
    })
    $('#yes-delete').click(function() {
        $.ajax({
            url: 'handle_reli.php',
            data: {action: 'delete'},
            type: 'post',
            success: function (res) {
                if(res === 'Delete') {
                    window.location.href = 'religions.php';
                } else {
                    toastr.error(res);
                }
            }
        });
    })
    $('#no-delete').click(function() {
        $('.pop-up-delete').css('display', 'none');
    })
})