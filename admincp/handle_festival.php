<?php 
    session_start();
    require('./lib_admin/festivals_action.php');
    require('./../assets/php/fpdf/fpdf.php');

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

            // //Create PDF
            // $pdf = new FPDF();
            // $pdf->AddPage();
            // $pdf->SetFont('Arial','B',16);
            // $pdf->Cell(40,10,$_POST['name'],1);
            // $pdf->Output();
            // var_dump($_FILES);
            // file_pdf

        } else {
            echo 'Error';
            die();
        }

    }

?>