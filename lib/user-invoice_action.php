<?php 
    require('dbConn.php');

    function InvoiceAllByUser() {
        global $conn;

        $idUser = $_SESSION['userLogin']['id'];
        $sql = "SELECT * FROM invoice WHERE id_user_buy='$idUser' ORDER BY UNIX_TIMESTAMP(date) DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
?>