<?php 
    require('dbConn.php');

    function UpdateTotal($id) {
        global $conn;

        $sql = "SELECT * FROM books WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
?>