<?php
    session_start();
    require('./../assets/php/fpdf/fpdf.php');
    require('./lib_admin/book_cate_action.php');

    //ADD
    if(isset($_POST['name']) && $_POST['action'] == 'add'){
        $name_book_cate = $_POST['name'];

        $resultId = AddBookCate($name_book_cate);

        // create folder
        $dir = "./../upload/books/".$resultId;
        if(mkdir($dir)){
            // INSERT DB category and receive id_cate_religion 
            $resultIdAddCategory = AddBookCategoryDB($name_book_cate, $resultId);

            //UPDATE id_category_religion
            $resultUpdateId = UpdateIdCateBook($resultId, $resultIdAddCategory);
            echo 'Success';
        }
    }

    //EDIT
    if($_POST['action'] == 'edit') {
        $name_edit = $_POST['name_edit'];
        $stt_edit = $_POST['stt_edit'];
        $id_book_cate = $_SESSION['ad_id_book_cate_edit'];

        //Update Name & STT 
        $resultEditNS = UpdateNameStt($id_book_cate, $name_edit, $stt_edit);

        echo "Success";
    }

    //DELETE
    if($_POST['action'] == 'delete') {
        $id_delete = $_SESSION['ad_id_book_cate_edit'];

        // check whether this religion has facts
        $result_check = CheckIdBookCateInBook($id_delete);

        if($result_check) {
            $result_del = DeleteBookCategory($id_delete);
            echo "Delete";
        } else {
            echo "Please remove books before deleting book category !";
            die();
        }
    }
?>