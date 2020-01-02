<!DOCTYPE html>
<html lang="en">

<?php 
    function Top($title = 'Administator', $linkCss) {   
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <!-- Font Goggle -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,600,700,900&display=swap" rel="stylesheet">
        <!-- Font-Anwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

        <!-- Toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        <!-- CKEDITOR -->
        <script src="./../assets/js/ckeditor/ckeditor.js"></script>
        <script src="./../assets/js/ckfinder/ckfinder.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="./../assets/css/main_cp.css">
        <link rel="stylesheet" href="./../assets/css/header_cp.css">
        <link rel="stylesheet" href="./../assets/css/menu_cp.css">

        <link rel="stylesheet" href="<?php echo $linkCss ?>">
        <link rel="stylesheet" href="./../assets/css/swiper.min.css">

        <title><?php echo $title?></title>

    </head>
<?php  
    } 
?>