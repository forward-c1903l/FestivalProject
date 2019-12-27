<?php 
    require('dbConn.php');

    function CheckPageGet() {
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = '';
        }

        switch($page) {
            case 'receipt': 
                return 1;
                break;
            default: 
                return 0;
        }
    }

    function CheckUserSession() {
        if(!isset($_SESSION['userLogin'])) {
            header('location:login.php');
        } else {
            return $_SESSION['userLogin']['fullname'];
        }
    }
?>