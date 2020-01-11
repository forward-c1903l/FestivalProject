$(document).ready(function(){
    //config ckeditor
    config = {};
    config.language = 'en';
    config.entities_latin = false;
    CKEDITOR.replace('content_books', config);

    let booksDefault = {
        name: $('#name_books').val(),
        category: $('#name_category').val(),
        author: $('#author').val(),
        price: $('#price').val(),
        des: $('#describle').val(),
        inventory: $('#inventory').val(),
        dataContent: $.trim($('#content_books').val())
    };

    let statusDefault = $('#stt_book').val();

    function CheckValueChangeFirst(bookFir, bookCurr, fileImage, stt) {
        if(JSON.stringify(bookFir) === JSON.stringify(bookCurr) && typeof(fileImage) === 'undefined' && statusDefault === stt) {
            return false;
        } else return true;
    }

    function CheckErrorValue() {
        let errorBooks = {};

        let books = {
            name: $('#name_books').val(),
            category: $('#name_category').val(),
            author: $('#author').val(),
            price: $('#price').val(),
            des: $('#describle').val(),
            inventory: $('#inventory').val(),
            dataContent: $.trim(CKEDITOR.instances.content_books.getData())
        };

        if(books.name === '') {
            errorBooks['name'] = 'Please Enter Name Book';
        }
        if(books.author === '') {
            errorBooks['author'] = 'Please Enter Author Book';
        }
        if(books.price === '') {
            errorBooks['price'] = 'Please Enter Price Book';
        } else {
            let regex=/^[0-9]+$/;
            if(!regex.test(books.price)) {
                errorBooks['price'] = 'Please enter number !';
            }
        }
        if(books.des === '') {
            errorBooks['des'] = 'Please Enter Describle Book';
        }
        if(books.dataContent === '') {
            errorBooks['content'] = 'Please Enter Content';
        }
        if(books.inventory === '') {
            errorBooks['inventory'] = 'Please Enter Inventory Book';
        } else {
            let regex=/^[0-9]+$/;
            if(!regex.test(books.inventory)) {
                errorBooks['inventory'] = 'Please enter number !';
            }
        }

        let result = {
            books,
            errorBooks
        };

        return result;
    }

    // ADD BOOKS
    $('#submit-add-books').click(function() {
        $('.error').text('');
        let result = CheckErrorValue();

        let fileImg = $('#img_books').prop('files')[0];
        //check image
        if(typeof(fileImg) === 'undefined') {
            result['errorBooks']['image'] = 'Please Enter Image';
        } else {
            let type = fileImg.type;
            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

            if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
            } else {
                result['errorBooks']['image'] = 'Please enter the image format !';
            }
        }

        if(jQuery.isEmptyObject(result['errorBooks'])) {
            $('.error').text('');
            let  formBooks = new FormData();

            let {
                name,
                category,
                author,
                price,
                des,
                inventory,
                dataContent,
            } = result.books;

            let dataText = CKEDITOR.instances.content_books.document.getBody().getText();

            formBooks.append('name', name);
            formBooks.append('category', category);
            formBooks.append('author', author);
            formBooks.append('price', price);
            formBooks.append('des', des);
            formBooks.append('inventory', inventory);
            formBooks.append('content', dataContent);
            formBooks.append('content_text', dataText);
            formBooks.append('file_image', fileImg);
            formBooks.append('action', 'add');// acction = add

            $.ajax({
                url: 'handle_books.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formBooks,
                type: 'post',
                success: function (res) {
                    if(res === 'Success') {
                        toastr.success('You have successfully added the book!');

                        setTimeout(() => {
                            location.reload();
                            window.scrollTo({top: 0});
                        }, 1500);
                    } else {
                        toastr.error(res);
                    }
                }
            });
        } else {
            for(let key in result['errorBooks']) {
                $(`#error_${key}`).text(result['errorBooks'][key]);
            }
            window.scrollTo({top: 100});
        }
    })

    //-------------------EDIT---------------------//
    $("#submit-edit-books").click(function() {
        $('.error').text('');
        // Check Value 
        let result = CheckErrorValue();
        
        // Get FILE IMG
        let fileImg = $('#img_books').prop('files')[0];
        //check image
        if(typeof(fileImg) === 'undefined') {
        } else {
            let type = fileImg.type;
            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

            if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
            } else {
                result['errorBooks']['image'] = 'Please enter the image format !';
            }
        }

        let status = $('#stt_book').val(); //value stt current

        if(jQuery.isEmptyObject(result['errorBooks'])) {

            let resultCheckChange = CheckValueChangeFirst(booksDefault, result.books, fileImg, status);

            if(resultCheckChange) {
                let  formBooks = new FormData();

                let {
                    name,
                    category,
                    author,
                    price,
                    des,
                    inventory,
                    dataContent,
                } = result.books;

                let dataText = CKEDITOR.instances.content_books.document.getBody().getText();
                
                if(typeof(fileImg) === 'undefined') {
                    
                } else {
                    formBooks.append('file_image', fileImg);
                }

                formBooks.append('name', name);
                formBooks.append('category', category);
                formBooks.append('author', author);
                formBooks.append('price', price);
                formBooks.append('des', des);
                formBooks.append('inventory', inventory);
                formBooks.append('content', dataContent);
                formBooks.append('content_text', dataText);
                formBooks.append('file_image', fileImg);
                formBooks.append('status', status);
                formBooks.append('action', 'edit');// acction = edit

                $.ajax({
                    url: 'handle_books.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formBooks,
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
            for(let key in result['errorBooks']) {
                $(`#error_${key}`).text(result['errorBooks'][key]);
            }
            window.scrollTo({top: 100});
        }

    })


    //---------------------DELETE--------------------//
    $('input:checkbox[name=select_all]').change(function(){
        if($(this).is(':checked')) {
            $('input:checkbox[name=items]').attr('checked', 'checked');
        } else {
            $('input:checkbox[name=items]').attr('checked', false);
        }
    })
    $('button[name=delete_books]').click(function() {
        let arrayDel = [];
        $("input:checkbox[name=items]:checked").each(function(){
            arrayDel.push($(this).val());
        });
        
        if(arrayDel.length > 0) {
            $.ajax({
                url: 'handle_books.php',
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