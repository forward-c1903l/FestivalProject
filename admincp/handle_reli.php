<?php 
    session_start();
    require('./lib_admin/religions_action.php');

    if($_FILES['file']['name'] != '' && $_POST['name'] != ''){
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

            // INSERT DB category
            $resultAddCategory = AddReligionCategoryDB($nameReligions, $resultIdAddFirst);
            echo 'Success';
        }

    }
    
?>