<?php 
    require('dbConn.php');

    function CheckIdInvoice() {
        $idUser = $_SESSION['userLogin']['id'];

        if(isset($_GET['id'])) {
            global $conn;
            $id = $_GET['id'];
            $sql = "SELECT * FROM invoice WHERE id='$id' AND id_user_buy = '$idUser'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 0) {
                return 0;
            } else {
                $row = mysqli_fetch_assoc($result);
                $invoice = [
                    'id' => $id,
                    'total' => $row['total']
                ];

                return $invoice;
            }

        } else {
            return 1;
        }
    }

    function ItemsYourInvoice($idOrder) {
        global $conn;

        $sql = "SELECT * FROM 
        invoice_details 
            INNER JOIN books ON invoice_details.id_book = books.id 
        WHERE invoice_details.id_invoice='$idOrder'";

        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function CheckHandleInvoice($idInvoice) {
        global $conn;

        $sql = "SELECT handle FROM invoice WHERE id='$idInvoice'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['handle'];
    }
?>