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
            
            $pdf->SetFont('Arial','B',18);
            $pdf->SetDrawColor(0,80,180);
            $pdf->MultiCell(270,8,$_POST['name'],0,1);
            $pdf->Ln(1);
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(90,10,$_POST['date'].' / '.$_POST['place'],0,1);
            $pdf->Ln(5);
            $pdf->SetFont('Arial','',13);
            $pdf->Cell(80,10,$_POST['des'],0,0);
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->Write(5, $_POST['content_text']);
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

        if(isset($_FILES['file_image'])) {
            $status_delete = unlink('./../'.$resultEdit);

            if($status_delete) {
                $location = './../'.$resultEdit;
                move_uploaded_file($_FILES['file_image']['tmp_name'], $location);
            } else {
                echo "Error Image";
                die();
            }
        }

        $delete_pdf_old = unlink('./../upload/religions/'.$id_reli.'/'.$id.'/'.$id.'.pdf');
        if($delete_pdf_old) {
            // Create PDF
            $pdf = new FPDF();
            $pdf->AddPage('A4');
            
            $pdf->SetFont('Arial','B',18);
            $pdf->SetDrawColor(0,80,180);
            $pdf->MultiCell(270,8,$_POST['name'],0,1);
            $pdf->Ln(1);
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(90,10,$_POST['date'].' / '.$_POST['place'],0,1);
            $pdf->Ln(5);
            $pdf->SetFont('Arial','',13);
            $pdf->Cell(80,10,$_POST['des'],0,0);
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',10);
            $pdf->Write(5, $_POST['content_text']);
            $pdf->Output('F', './../upload/religions/'.$id_reli.'/'.$id.'/'.$id.'.pdf');
        } else {
            echo "Error PDF File";
            die();
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