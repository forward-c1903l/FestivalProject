<?php 
    require('dbConn.php');

    function CheckUserLogin() {
        if(isset($_SESSION['userLogin'])) {
            return true;
        } else return false;
    }

    function CheckCartSession() {
        if(isset($_SESSION['cart'])) {
            return true;
        } else {
            header('location:cart.php');
        }
    }
    function GetBookById($id) {
        global $conn;
        $sql = "SELECT * FROM books WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    function GetInforUser($id) {
        global $conn;
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
?>