    <!-- Action Page Cart -->

<?php 
    require('dbConn.php');

    function CheckCartSession() {
        if(isset($_SESSION['cart'])) {
            if(count($_SESSION['cart']) == 0) {
                return false;
            } else {
                return true;
            }

        } else {
            return false;
        }
    }

    function CheckIdBookCartIntoDB($id) {
        global $conn;
        $sql = "SELECT * FROM books WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
?>