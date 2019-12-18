<!-- Action Header -->


<?php 
    require('dbConn.php');

    function Category() {
        global $conn;

        $sql = "SELECT * FROM category WHERE id_parent = 0";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function GetCategoryChildren($id) {
        global $conn;
        
        $sql = "SELECT * FROM category WHERE id_parent = '$id'";
        $result = mysqli_query($conn, $sql);
        $rowCheck = mysqli_num_rows($result);
        if($rowCheck == 0) {
            return 0;
        } else {
            return $result;
        }
        
    }


?>