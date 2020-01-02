<?php 
    session_start();
    require('./lib_admin/religions_action.php');


    //ADD
    if(isset($_FILES['file']) && isset($_POST['name']) && $_POST['action'] == 'add'){
        $nameReligions = $_POST['name'];

        //first Add Name 
        $resultIdAddFirst = AddNameReligionFirst($nameReligions);

        // create folder
        $dir = "./../upload/religions/".$resultIdAddFirst;
        if(mkdir($dir)){
            $test = explode('.', $_FILES['file']['name']);
            $extension = end($test);    
            $name = $resultIdAddFirst.'.'.$extension;
        
            $location = './../upload/religions/'.$resultIdAddFirst.'/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);

            // INSERT FULL DB Religions
            $resultAdd = AddReligionFullDB($extension, $resultIdAddFirst);

            // INSERT DB category and receive id_cate_religion 
            $resultAddCategory = AddReligionCategoryDB($nameReligions, $resultIdAddFirst);

            //UPDATE id_category_religion
            $resultUpdateId = UpdateIdCateReligion($resultIdAddFirst, $resultAddCategory);
            echo 'Success';
        }
    }
    

    //EDIT
    if($_POST['action'] == 'edit') {
        $name_edit = $_POST['name_edit'];
        $stt_edit = $_POST['stt_edit'];
        $id_reli = $_SESSION['ad_id_religion_edit'];

        //Update Name & STT and receive link avata religion
        $resultEditNS = UpdateNameStt($id_reli, $name_edit, $stt_edit);
        $completed = true;

        if(isset($_FILES['file'])) {
            $status_delete = unlink('./../'.$resultEditNS);

            if($status_delete) {
                $location = './../'.$resultEditNS;
                move_uploaded_file($_FILES['file']['tmp_name'], $location);
            } else {
                $completed = false;
            }
        }

        echo $completed == true ? "Success": "Error";
    }


    //-------------------------DELETE---------------------//
    if($_POST['action'] == 'delete') {
        $id_delete = $_SESSION['ad_id_religion_edit'];

        // check whether this religion has facts
        $result_check = CheckIdReligionInFestival($id_delete);

        if($result_check) {
            $result_del = DeleteReligion($id_delete);
            echo "Delete";
        } else {
            echo "Please remove festivals before deleting religions !";
            die();
        }
    }
?>