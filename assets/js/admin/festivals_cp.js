$(document).ready(function(){
    //config ckeditor
    config = {};
    config.language = 'en';
    config.entities_latin = false;
    CKEDITOR.replace('content_festival', config);


    $('#submit-add-fes').click(function() {
        let errorFestival = {};
        //get value
        let name = $('#name_festival').val();
        let reli = $('#name_reli').val();
        let day = $('#day').val();
        let month = $('#month').val();
        let year = $('#year').val();
        let place = $('#place_festival').val();
        let des = $('#des_festival').val();
        let dataContent = CKEDITOR.instances.content_festival.getData();
        let hightlight = $('#hightlight_fes').val();
        let best = $('#best_fes').val();
        let fileImg = $('#img_fes').prop('files')[0];

        if(name === '') {
            errorFestival['name'] = 'Please Enter Name Festival';
        }
        if(day === '' || month === ''|| year === '') {
            errorFestival['date'] = 'Please Enter Date';
        }
        if(place === '') {
            errorFestival['place'] = 'Please Enter Place';
        }
        if(des === '') {
            errorFestival['des'] = 'Please Enter Describle';
        }
        if(dataContent === '') {
            errorFestival['content'] = 'Please Enter Content';
        }
        if(typeof(fileImg) === 'undefined') {
            errorFestival['image'] = 'Please Enter Image';
        } else {
            let type = fileImg.type;
            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

            if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
            } else {
                errorFestival['image'] = 'Please enter the image format !';
            }
        }

        if(jQuery.isEmptyObject(errorFestival)) {
            $('.error').text('');
            let  formFestival = new FormData();
            //conver day month year
            let date = `${year}-${month}-${day}`;


            formFestival.append('name', name);
            formFestival.append('reli', reli);
            formFestival.append('date', date);
            formFestival.append('place', place);
            formFestival.append('des', des);
            formFestival.append('content', dataContent);
            formFestival.append('hightlight', hightlight);
            formFestival.append('best', best);
            formFestival.append('file_image', fileImg);
            formFestival.append('file_pdf', doc);
            formFestival.append('action', 'add');// acction = add

            $.ajax({
                url: 'handle_festival.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formFestival,
                type: 'post',
                success: function (res) {
                    // if(res === 'Success') {
                    //     toastr.success('You have successfully added the article!');

                    //     setTimeout(() => {
                    //         location.reload();
                    //     }, 2000);
                    // } else {
                    //     toastr.error('Error!');
                    // }
                    console.log(res);
                }
            });

        } else {
            errorFestival['name'] ? $("#error_name").text(errorFestival['name']) : $("#error_name").text('');
            errorFestival['date'] ? $("#error_date").text(errorFestival['date']) : $("#error_date").text('');
            errorFestival['place'] ? $("#error_place").text(errorFestival['place']) : $("#error_date").text('');
            errorFestival['des'] ? $("#error_des").text(errorFestival['des']) : $("#error_date").text('');
            errorFestival['content'] ? $("#error_content").text(errorFestival['content']) : $("#error_date").text('');
            errorFestival['image'] ? $("#error_image").text(errorFestival['image']) : $("#error_date").text('');
        }
    })
})