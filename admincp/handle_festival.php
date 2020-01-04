<?php 
    session_start();
    require('./../assets/php/fpdf/fpdf.php');
    require('./lib_admin/festivals_action.php');

    //ADD
    if(isset($_POST['action']) && $_POST['action'] == 'add') {

        $id_reli = $_POST['reli'];
        //check id reli and check folder reli
        $resultReli = CheckIdReligion($id_reli);
        if($resultReli) {
            //check folder religion
            $dir = "./../upload/religions/".$_POST['reli'];
            if(!file_exists($dir)){
                echo "Error Religion";
                die();
            }
        }

        //insert data
        $resultAdd = AddFestivals(
            $_POST['name'],
            $_POST['reli'],
            $_POST['date'],
            $_POST['place'],
            $_POST['des'],
            $_POST['content'],
            $_POST['hightlight'],
            $_POST['best']
        );

        //check folder religion.if not there will create a new folder religion
        $dir = "./../upload/religions/".$id_reli;
        if (!is_dir($dir)) {
            mkdir($dir);
        }

        // create folder
        $dir = "./../upload/religions/".$id_reli.'/'.$resultAdd;
        if(mkdir($dir)){
            $test = explode('.', $_FILES['file_image']['name']);
            $extension = end($test);    
            $name = $resultAdd.'.'.$extension;
        
            $location = './../upload/religions/'.$id_reli.'/'.$resultAdd.'/'.$name;
            move_uploaded_file($_FILES['file_image']['tmp_name'], $location);

            // INSERT URL IMAGE
            $resultAddImage = AddImageFestival($extension, $id_reli, $resultAdd);


            // $str = utf8_decode($_POST['name']);
            //Create PDF
            $pdf = new FPDF();
            $pdf->AddPage('A4');
            $pdf->Image($location,25,10,250,180);
            $pdf->Ln(190);

            $pdf->SetFont('Arial','B',24);
            $pdf->SetTextColor(0,0,0);
            $pdf->MultiCell(270,11,$_POST['name'],0,1);
            $pdf->Ln(1);

            $pdf->SetFont('Arial','',11);
            $pdf->SetTextColor(105,105,105);
            $pdf->MultiCell(270,11,$_POST['date'].' / '.$_POST['place'],0,1);
            $pdf->Ln(2);

            $pdf->SetFont('Arial','B',15);
            $pdf->SetTextColor(51,51,51);
            $pdf->MultiCell(270,8,$_POST['des'],0,1);
            $pdf->Ln(3);

            $pdf->SetFont('Arial','',10);
            $pdf->SetTextColor(51,51,51);
            $str = strip_tags($_POST['content']);
            $pdf->Write(5, $str);
            $pdf->Output('F', './../upload/religions/'.$id_reli.'/'.$resultAdd.'/'.$resultAdd.'.pdf');

            echo "Success";
        } else {
            echo 'Error';
            die();
        }

    }


    //EDIT
    if(isset($_POST['action']) && $_POST['action'] == 'edit') {

        $id_reli = $_POST['reli'];
        //check id reli and check folder reli
        $resultReli = CheckIdReligion($id_reli);
        if($resultReli) {
            //check folder religion
            $dir = "./../upload/religions/".$_POST['reli'];
            if(!file_exists($dir)){
                echo "Error Religion";
                die();
            }
        }

        $id = $_SESSION['festival_current'];

        //Check if the religion changes, the file will be moved
        $changeReligion = false;
        $resultFesOld = GetFestivalOld($id);
        $row_fes_old = mysqli_fetch_assoc($resultFesOld);
        if($row_fes_old['id_reli'] != $id_reli) {
            $folder_new = "./../upload/religions/".$id_reli.'/'.$id;
            $folder_old = "./../upload/religions/".$row_fes_old['id_reli'].'/'.$id;

            if(is_dir($folder_old)) {
                if(!is_dir($folder_new)) {
                    rename($folder_old, $folder_new);
                    $changeReligion = true;
                }
            } else {
                echo 'Error Folder';
                die();
            }
        }


        //insert data
        $resultEdit = UpdateFestivals(
            $id,
            $_POST['name'],
            $_POST['reli'],
            $_POST['date'],
            $_POST['place'],
            $_POST['des'],
            $_POST['content'],
            $_POST['hightlight'],
            $_POST['best'],
            $_POST['status']
        );
        
        $location_img = '';

        if($changeReligion) {
            $test = explode('/', $resultEdit);
            $name = end($test);

            $location_img = './../upload/religions/'.$id_reli.'/'.$id.'/'.$name;
            $url = 'upload/religions/'.$id_reli.'/'.$id.'/'.$name;

            //Update religion in url image
            $resultUpdateImg = UpdateUrlImg($id, $url);

        } else {
            $location_img = './../'.$resultEdit;
        }

        $change_img = false;

        if(isset($_FILES['file_image'])) {
            $change_img = true;
            $text = explode('.', $_FILES['file_image']['name']);
            $ex = end($text);
            $location_img_new = './../upload/religions/'.$id_reli.'/'.$id.'/'.$id.'.'.$ex;
            $url_new = 'upload/religions/'.$id_reli.'/'.$id.'/'.$id.'.'.$ex;
            if(is_file($location_img)) {
                $status_delete = unlink($location_img);
                move_uploaded_file($_FILES['file_image']['tmp_name'], $location_img_new);
            } else {
                move_uploaded_file($_FILES['file_image']['tmp_name'], $location_img_new);
            }

            //Update URL image 
            $resultUpdateImg = UpdateUrlImg($id, $url_new);
        }


        //check change content
        if($row_fes_old['content_festival'] != $_POST['content']) {
            //check file pdf
            $location_pdf = './../upload/religions/'.$id_reli.'/'.$id.'/'.$id.'.pdf';
            if(is_file($location_pdf)) {
                $status_delete = unlink($location_pdf);
            }
            $pdf = new FPDF();
            $pdf->AddPage('A4');
            $change_img == true ? $pdf->Image($location_img_new,25,10,250,180) : $pdf->Image($location_img,25,10,250,180);
            $pdf->Ln(190);
            
            $pdf->SetFont('Arial','B',24);
            $pdf->SetTextColor(0,0,0);
            $pdf->MultiCell(270,11,$_POST['name'],0,1);
            $pdf->Ln(1);

            $pdf->SetFont('Arial','',11);
            $pdf->SetTextColor(105,105,105);
            $pdf->MultiCell(270,11,$_POST['date'].' / '.$_POST['place'],0,1);
            $pdf->Ln(2);
            
            $pdf->SetFont('Arial','B',15);
            $pdf->SetTextColor(51,51,51);
            $pdf->MultiCell(270,8,$_POST['des'],0,1);
            $pdf->Ln(3);

            $pdf->SetFont('Arial','',10);
            $pdf->SetTextColor(51,51,51);
            $str = strip_tags($_POST['content']);
            $pdf->Write(5, $str);
            $pdf->Output('F', $location_pdf);
        }

        echo 'Success';
    }


    // DELETE
    if(isset($_POST['delete']) && $_POST['delete']['action'] == 'delete') {
        $array_del = $_POST['delete']['array_del'];

        //delete 
        $result_del = DeleteFestival($array_del);


    }

?>