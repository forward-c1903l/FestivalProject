<?php 
    require('./../lib/dbConn.php');

    function AllFeedback() {
        global $conn;
        $sql = "SELECT * FROM feedback ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        return $result;

        mysqli_close($conn);
    }
?>