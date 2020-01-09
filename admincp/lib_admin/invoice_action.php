<?php 
    require('./../lib/dbConn.php');

    function CheckGetUrl(){
        if(isset($_GET['ac'])) {
            $action = $_GET['ac'];
            if($action == 'detail') {
                return 1;// Add Invoice
            }
        } else {
            return 0; //All Invoice
        }
    }

    function AllInvoiceNew() {
        global $conn;
        $sql = "SELECT payment_method.*, user.*, invoice.* FROM user 
                                INNER JOIN invoice ON invoice.id_user_buy = user.id 
                                INNER JOIN payment_method ON payment_method.id = invoice.id_payment_method
                                WHERE handle = 0 ORDER BY date DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function AllInvoice() {
        global $conn;
        $sql = "SELECT payment_method.*, user.*, invoice.* FROM user 
                                INNER JOIN invoice ON invoice.id_user_buy = user.id 
                                INNER JOIN payment_method ON payment_method.id = invoice.id_payment_method
                                WHERE handle != 0 ORDER BY handle ASC, date DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function CheckIdInvoiceGet() {
        if(isset($_GET['ac']) && $_GET['ac'] == 'detail' && isset($_GET['id'])) {
            global $conn;
            $sql = "SELECT * FROM invoice WHERE id={$_GET['id']}";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 0) {
                return false;
            } else {
                // change check_admin invoice
                $sql_check = "UPDATE invoice SET admin_check = 1 WHERE id={$_GET['id']}";
                $result_check = mysqli_query($conn, $sql_check);

                return $result;
            }
        } else {
            return false;
        }
    }

    function UserBuyInvoice($id) {
        global $conn;
        $sql = "SELECT * FROM user WHERE id= '$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function ProductInvoice($id) {
        global $conn;
        $sql = "SELECT * FROM invoice_details INNER JOIN invoice ON invoice.id = invoice_details.id_invoice INNER JOIN books ON books.id = invoice_details.id_book WHERE invoice_details.id_invoice = '$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function ChangeInvoice($id, $handle) {
        global $conn;
        $sql = "UPDATE invoice SET handle = '$handle' WHERE id='$id'";
        $return = mysqli_query($conn, $sql);

        if($handle == 2 || $handle == 3) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');

            $sql = "UPDATE invoice SET time_delivery = '$date' WHERE id='$id'";
            $return = mysqli_query($conn, $sql);
        }
        mysqli_close($conn);
    }
?>    