<?php 
    require('dbConn.php');


    function CheckQuantity($id, $quantity) {
        global $conn;

        $sql = "SELECT id, inventory FROM books WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $inventoryInt = (int)$row['inventory'];

        if($quantity < (int)$row['inventory']) {
            return '';
        } else {
            return 'Quantity not allowed !';
        }
        
    }
?>