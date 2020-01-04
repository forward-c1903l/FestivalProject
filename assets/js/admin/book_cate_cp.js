$(document).ready(function(){

    //ADD
    $('#submit-add-book-cate').click(function() {
        let valName = $('#name_book_cate').val();

        if(valName === '' ) {
            $('.error').text('');
            $('#error_name').text('Please enter book category name !');
        } else {
            $('.error').text('');

            var form = new FormData();

            form.append('name', valName);
            form.append('action', 'add');// acction = add

            $.ajax({
                url: 'handle_book_cate.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form,
                type: 'post',
                success: function (res) {
                    if(res === 'Success') {
                        toastr.success('You have successfully entered!');

                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                }
            });
        }
    })

    //EDIT 
    let valNameEditDf = $('#name_book_cate_edit').val();
    let valSttEditDf = $('#status_book_cate_edit').val();

    $('#submit-edit-book-cate').click(function() {
        $('.error_edit').text('');
        let valNameEdit = $('#name_book_cate_edit').val();
        let valSttEdit = $('#status_book_cate_edit').val();
        let error = {};

        if(valNameEditDf === valNameEdit && valSttEditDf === valSttEdit) {
        } else {
            //Check Name empty
            if(valNameEdit === '') {
                error['name'] = 'Please enter a name !';
            } 
            if(valSttEdit === '1' || valSttEdit === '0') {
            } else {
                error['stt'] = 'Wrong value!';
            }

            if(jQuery.isEmptyObject(error)) {
                var formEdit = new FormData();

                formEdit.append('name_edit', valNameEdit);
                formEdit.append('stt_edit', valSttEdit);
                formEdit.append('action', 'edit');// acction = edit

                $.ajax({
                    url: 'handle_book_cate.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formEdit,
                    type: 'post',
                    success: function (res) {
                        if(res === 'Success') {
                            toastr.success('You have just changed the book category information successfully!');

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
                error['stt'] && $("#error_stt_edit").text(error['stt']);
            }
        }
    })


    //DELETE
    $('#btn-delete-book-cate').click(function() {
        $('.pop-up-delete').css('display', 'block');
    })
    $('#yes-delete').click(function() {
        $.ajax({
            url: 'handle_book_cate.php',
            data: {action: 'delete'},
            type: 'post',
            success: function (res) {
                if(res === 'Delete') {
                    window.location.href = 'book-category.php';
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