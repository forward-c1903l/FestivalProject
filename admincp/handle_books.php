<?php 
    session_start();
    require('./lib_admin/books_action.php');

    //ADD
    if(isset($_POST['action']) && $_POST['action'] == 'add') {

        $id_category = $_POST['category'];
        //check id category and check folder category
        $resultCate = CheckIdCategory($id_category);
        if($resultCate) {
            //check folder category
            $dir = "./../upload/books/".$id_category;
            if (!is_dir($dir)) {
                mkdir($dir);
            }
        } else {
            die();
        }


        date_default_timezone_set('Asia/Ho_Chi_Minh');// set date Vietnam
        $date = date('Y-m-d H:i:s');// get date current

        //insert data
        $resultAdd = AddBooks(
            $_POST['name'],
            $_POST['category'],
            $_POST['author'],
            $_POST['price'],
            $_POST['des'],
            $_POST['inventory'],
            $_POST['content'],
            $date
        );

        // create folder book
        $dir = "./../upload/books/".$id_category.'/'.$resultAdd;
        if(mkdir($dir)){
            $test = explode('.', $_FILES['file_image']['name']);
            $extension = end($test);    
            $name = $resultAdd.'.'.$extension;
        
            $location = './../upload/books/'.$id_category.'/'.$resultAdd.'/'.$name;
            move_uploaded_file($_FILES['file_image']['tmp_name'], $location);

            // INSERT URL IMAGE
            $resultAddImage = AddImageBooks($extension, $id_category, $resultAdd);

            echo "Success";
        } else {
            echo 'Error';
            die();
        }

    }



    //EDIT
    if(isset($_POST['action']) && $_POST['action'] == 'edit') {

        $id_category = $_POST['category'];

        //check id category and check folder category
        $resultCate = CheckIdCategory($id_category);
        if($resultCate) {
            //check folder category
            $dir = "./../upload/books/".$id_category;
            if (!is_dir($dir)) {
                mkdir($dir);
            }
        } else {
            die();
        }

        $id = $_SESSION['books_current'];

        //Check if the category changes, the file will be moved
        $changeCategory = false;
        $resultCategoryOld = GetCategoryOld($id);
        $row_category_old = mysqli_fetch_assoc($resultCategoryOld);
        if($row_category_old['id_category'] != $id_category) {

            $folder_new = "./../upload/books/".$id_category.'/'.$id;
            $folder_old = "./../upload/books/".$row_category_old['id_category'].'/'.$id;

            if(is_dir($folder_old)) {
                if(!is_dir($folder_new)) {
                    rename($folder_old, $folder_new);
                    $changeCategory = true;
                }
            } else {
                echo 'Error Folder';
                // die();
            }
        }


        //insert data
        $resultEdit = UpdateBooks(
            $id,
            $_POST['name'],
            $_POST['category'],
            $_POST['author'],
            $_POST['price'],
            $_POST['des'],
            $_POST['inventory'],
            $_POST['content'],
            $_POST['status']
        );
        
        $location_img = '';

        if($changeCategory) {
            $test = explode('/', $resultEdit);
            $name = end($test);

            $location_img = './../upload/books/'.$id_category.'/'.$id.'/'.$name;
            $url = 'upload/books/'.$id_category.'/'.$id.'/'.$name;

            //Update category in url image
            $resultUpdateImg = UpdateUrlImg($id, $url);

        } else {
            $location_img = './../'.$resultEdit;
        }

        if(isset($_FILES['file_image'])) {
            $text = explode('.', $_FILES['file_image']['name']);
            $ex = end($text);
            $location_img_new = './../upload/books/'.$id_category.'/'.$id.'/'.$id.'.'.$ex;
            $url_new = 'upload/books/'.$id_category.'/'.$id.'/'.$id.'.'.$ex;
            if(is_file($location_img)) {
                $status_delete = unlink($location_img);
                move_uploaded_file($_FILES['file_image']['tmp_name'], $location_img_new);
            } else {
                move_uploaded_file($_FILES['file_image']['tmp_name'], $location_img_new);
            }

            //Update URL image 
            $resultUpdateImg = UpdateUrlImg($id, $url_new);
        }

        echo 'Success';
    }

    
    // DELETE
    if(isset($_POST['delete']) && $_POST['delete']['action'] == 'delete') {
        $array_del = $_POST['delete']['array_del'];

        //delete 
        $result_del = DeleteBook($array_del);


    }
?>