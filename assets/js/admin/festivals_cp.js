$(document).ready(function(){
    //config ckeditor
    config = {};
    config.language = 'en';
    config.entities_latin = false;
    CKEDITOR.replace('content_festival', config);

    let festivalDefault = {
        name: $('#name_festival').val(),
        reli: $('#name_reli').val(),
        day: $('#day').val(),
        month: $('#month').val(),
        year: $('#year').val(),
        place: $('#place_festival').val(),
        des: $('#des_festival').val(),
        dataContent: $.trim($('#content_festival').val()),
        hightlight: $('#hightlight_fes').val(),
        best: $('#best_fes').val()
    };

    let statusDefault = $('#stt_fes').val();
    
    function CheckValueChangeFirst(fesFir, fesCurr, fileImage, stt) {
        if(JSON.stringify(fesFir) === JSON.stringify(fesCurr) && typeof(fileImage) === 'undefined' && statusDefault === stt) {
            return false;
        } else return true;
    }

    function CheckErrorValue() {
        let errorFestival = {};

        let festival = {
            name: $('#name_festival').val(),
            reli: $('#name_reli').val(),
            day: $('#day').val(),
            month: $('#month').val(),
            year: $('#year').val(),
            place: $('#place_festival').val(),
            des: $('#des_festival').val(),
            dataContent: $.trim(CKEDITOR.instances.content_festival.getData()),
            hightlight: $('#hightlight_fes').val(),
            best: $('#best_fes').val()
        };

        if(festival.name === '') {
            errorFestival['name'] = 'Please Enter Name Festival';
        }
        if(festival.day === '' || festival.month === ''|| festival.year === '') {
            errorFestival['date'] = 'Please Enter Date';
        }
        if(festival.place === '') {
            errorFestival['place'] = 'Please Enter Place';
        }
        if(festival.des === '') {
            errorFestival['des'] = 'Please Enter Describle';
        }
        if(festival.dataContent === '') {
            errorFestival['content'] = 'Please Enter Content';
        }

        let result = {
            festival,
            errorFestival
        };

        return result;
    }

    // ADD FESTIVALS
    $('#submit-add-fes').click(function() {
        let result = CheckErrorValue();

        let fileImg = $('#img_fes').prop('files')[0];
        //check image
        if(typeof(fileImg) === 'undefined') {
            result['errorFestival']['image'] = 'Please Enter Image';
        } else {
            let type = fileImg.type;
            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

            if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
            } else {
                result['errorFestival']['image'] = 'Please enter the image format !';
            }
        }

        if(jQuery.isEmptyObject(result['errorFestival'])) {
            $('.error').text('');
            let  formFestival = new FormData();
            
            let {
                name,
                reli,
                day,
                month,
                year,
                place,
                des,
                dataContent,
                hightlight,
                best
            } = result.festival;

            let dataText = CKEDITOR.instances.content_festival.document.getBody().getText();
            //conver day month year
            let date = `${year}-${month}-${day}`;

            formFestival.append('name', name);
            formFestival.append('reli', reli);
            formFestival.append('date', date);
            formFestival.append('place', place);
            formFestival.append('des', des);
            formFestival.append('content', dataContent);
            formFestival.append('content_text', dataText);
            formFestival.append('hightlight', hightlight);
            formFestival.append('best', best);
            formFestival.append('file_image', fileImg);
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
                    if(res === 'Success') {
                        toastr.success('You have successfully added the article!');

                        setTimeout(() => {
                            location.reload();
                            window.scrollTo({top: 0});
                        }, 1300);
                    } else {
                        toastr.error('Error!');
                    }
                }
            });

        } else {
            result['errorFestival']['name'] ? $("#error_name").text(result['errorFestival']['name']) : $("#error_name").text('');
            result['errorFestival']['date'] ? $("#error_date").text(result['errorFestival']['date']) : $("#error_date").text('');
            result['errorFestival']['place'] ? $("#error_place").text(result['errorFestival']['place']) : $("#error_date").text('');
            result['errorFestival']['des'] ? $("#error_des").text(result['errorFestival']['des']) : $("#error_date").text('');
            result['errorFestival']['content'] ? $("#error_content").text(result['errorFestival']['content']) : $("#error_date").text('');
            result['errorFestival']['image'] ? $("#error_image").text(result['errorFestival']['image']) : $("#error_date").text('');
        }
    })



    //-------------------EDIT---------------------//
    $("#submit-edit-fes").click(function() {
        
        // Check Value 
        let result = CheckErrorValue();
        
        // Get FILE IMG
        let fileImg = $('#img_fes').prop('files')[0];
        //check image
        if(typeof(fileImg) === 'undefined') {
        } else {
            let type = fileImg.type;
            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

            if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
            } else {
                result['errorFestival']['image'] = 'Please enter the image format !';
            }
        }

        let stattus = $('#stt_fes').val(); //value stt current

        if(jQuery.isEmptyObject(result['errorFestival'])) {
            $('.error').text('');

            let resultCheckChange = CheckValueChangeFirst(festivalDefault, result.festival, fileImg, stattus);

            if(resultCheckChange) {
                let  formFestival = new FormData();

                let {
                    name,
                    reli,
                    day,
                    month,
                    year,
                    place,
                    des,
                    dataContent,
                    hightlight,
                    best
                } = result.festival;

                let dataText = CKEDITOR.instances.content_festival.document.getBody().getText();

                //conver day month year
                let date = `${year}-${month}-${day}`;
                
                if(typeof(fileImg) === 'undefined') {
                    
                } else {
                    formFestival.append('file_image', fileImg);
                }

                formFestival.append('name', name);
                formFestival.append('reli', reli);
                formFestival.append('date', date);
                formFestival.append('place', place);
                formFestival.append('des', des);
                formFestival.append('content', dataContent);
                formFestival.append('content_text', dataText);
                formFestival.append('hightlight', hightlight);
                formFestival.append('best', best);
                formFestival.append('status', $('#stt_fes').val());
                formFestival.append('action', 'edit');// acction = edit

                $.ajax({
                    url: 'handle_festival.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formFestival,
                    type: 'post',
                    success: function (res) {
                        if(res === 'Success') {
                            toastr.success('You have successfully updated !');
    
                            setTimeout(() => {
                                location.reload();
                                window.scrollTo({top: 0});
                            }, 1300);
                        } else {
                            toastr.error(res);
                        }
                    }
                });
            }

        } else {
            result['errorFestival']['name'] ? $("#error_name").text(result['errorFestival']['name']) : $("#error_name").text('');
            result['errorFestival']['date'] ? $("#error_date").text(result['errorFestival']['date']) : $("#error_date").text('');
            result['errorFestival']['place'] ? $("#error_place").text(result['errorFestival']['place']) : $("#error_date").text('');
            result['errorFestival']['des'] ? $("#error_des").text(result['errorFestival']['des']) : $("#error_date").text('');
            result['errorFestival']['content'] ? $("#error_content").text(result['errorFestival']['content']) : $("#error_date").text('');
            result['errorFestival']['image'] ? $("#error_image").text(result['errorFestival']['image']) : $("#error_date").text('');
        }

    })




    //---------------------DELETE FESTIVALS--------------------//
    $('input:checkbox[name=select_all]').change(function(){
        if($(this).is(':checked')) {
            $('input:checkbox[name=items]').attr('checked', 'checked');
        } else {
            $('input:checkbox[name=items]').attr('checked', false);
        }
    })
    $('button[name=delete_fes]').click(function() {
        let arrayDel = [];
        $("input:checkbox[name=items]:checked").each(function(){
            arrayDel.push($(this).val());
        });
        
        if(arrayDel.length > 0) {
            $.ajax({
                url: 'handle_festival.php',
                data: {delete: {action: 'delete', array_del: arrayDel}},
                type: 'post',
                success: function (res) {
                    if(res = 'Success Delete') {
                        toastr.success('You have successfully deleted!');

                        setTimeout(() => {
                            location.reload();
                            window.scrollTo({top: 0 });
                        }, 1300);
                    } else {
                        toastr.error(res);
                    }
                }
            });
        }
    })
})