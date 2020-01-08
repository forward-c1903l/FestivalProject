<?php 
    require('dbConn.php');

    function InformationCompany() {
        global $conn;
        $sql = "SELECT * FROM company WHERE id=1";
        $result = mysqli_query($conn, $sql);
        return $result;
        mysqli_close($conn);
    }
?>