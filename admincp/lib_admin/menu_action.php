<?php 
require('./../lib/dbConn.php');
function CheckTotalInvoiceAdminCheck() {
    global $conn;
    $sql ="SELECT * FROM invoice WHERE admin_check = 0";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result);
}
?>