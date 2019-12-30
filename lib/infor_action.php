<?php 
    require('dbConn.php');

    function CheckAdminAccount() {
        global $conn;
        $idUser = $_SESSION['userLogin']['id'];
        $sql = "SELECT id_role FROM user WHERE id = '$idUser'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        if($row['id_role'] == 1 || $row['id_role'] == 2){
            return true;
        } else {
            return false;
        }
    }

    function CheckPageGet() {
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = '';
        }

        switch($page) {
            case 'invoice': 
                return 1;
                break;
            case 'inv-detail': 
                return 2;
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