<?php 
    session_start();
    require('./lib_admin/general_action.php');

    if(isset($_POST['company']) && $_POST['company']['action'] == 'about') {
        //update about company
        $result = UpdateAboutUs($_POST['company']['about']);

    }

    //edit status payment method
    if(isset($_POST['company']) && $_POST['company']['action'] == 'payment_method') {
        //update status payment method

        $result = UpdatePaymentMethod($_POST['company']['id']);

    }

    //add payment method
    if(isset($_POST['company']) && $_POST['company']['action'] == 'add_payment') {
        //update status payment method

        $result = AddPaymentMethod($_POST['company']['value']);

    }


    //add gallery
    if(isset($_POST['action']) && $_POST['action'] == 'add_gallery') {
        //add first
        $resultId = AddGalleryFirst();

        $test = explode('.', $_FILES['file_image']['name']);
        $extension = end($test);    
        $name = $resultId.'.'.$extension;

        $location = './../upload/gallery/'.$name;
        if(is_file($location)) {
            unlink($location);
        }
        move_uploaded_file($_FILES['file_image']['tmp_name'], $location);

        // INSERT Full
        $resultAddFull = AddUrlImageGallery($resultId, $name);
    }

    //delete
    if(isset($_POST['company']) && $_POST['company']['action'] == 'del_item_gallery') {

        $result = DeleteItemGallery($_POST['company']['id']);

        if(is_file($result)) {
            unlink($result);
        }

    }

?>