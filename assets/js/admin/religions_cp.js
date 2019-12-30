$(document).ready(function(){
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
                //khởi tạo đối tượng form data
                var form = new FormData();
                //thêm files vào trong form data
                form.append('file', file);
                form.append('name', valName);

                //sử dụng ajax post
                $.ajax({
                    url: 'handle_reli.php', // gửi đến file upload.php 
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
})