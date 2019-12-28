<?php 
    require('dbConn.php');

    function CheckIdItemInvoice($idinv, $idit, $val) {
        global $conn;

        $sql = "SELECT * FROM invoice_details WHERE id_invoice='$idinv' AND id_book = '$idit'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0) {
            return false;
        } else {

            //update quantity
            $sql = "UPDATE invoice_details SET quantity = '$val' WHERE id_invoice='$idinv' AND id_book = '$idit'";
            $result = mysqli_query($conn, $sql);

            //recalculate the amount
            $total = 0;
            $sqlTotal = "SELECT * FROM 
                        invoice_details 
                            INNER JOIN books ON invoice_details.id_book = books.id
                        WHERE invoice_details.id_invoice='$idinv'";
            $resultRecal = mysqli_query($conn, $sqlTotal);
            while($row = mysqli_fetch_array($resultRecal)) {
                $total = $total + ($row['quantity'] * $row['price_book']);
            }

            //update total
            $sqlTotal = "UPDATE invoice SET total = '$total' WHERE id='$idinv'";
            $resultTotal = mysqli_query($conn, $sqlTotal);

            $compEdit = [
                'status' => true,
                'msg' => number_format($total,0,",",".")
            ];
            echo json_encode($compEdit);
        }
    }

    function DeleteInvoice($idinv, $idI) {
        global $conn;
        $sql = "SELECT * FROM invoice_details WHERE id_invoice='$idinv' AND id_book = '$idI'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0) {
            return false;
        } else {
            $sqlDel = "DELETE FROM invoice_details WHERE id_invoice='$idinv' AND id_book = '$idI'";
            $result = mysqli_query($conn, $sqlDel);
            
            //recalculate the amount
            $total = 0;
            $sqlTotal = "SELECT * FROM 
                        invoice_details 
                            INNER JOIN books ON invoice_details.id_book = books.id
                        WHERE invoice_details.id_invoice='$idinv'";
            $resultRecal = mysqli_query($conn, $sqlTotal);
            while($row = mysqli_fetch_array($resultRecal)) {
                $total = $total + ($row['quantity'] * $row['price_book']);
            }

            //update total
            $sqlTotal = "UPDATE invoice SET total = '$total' WHERE id='$idinv'";
            $resultTotal = mysqli_query($conn, $sqlTotal);
            header('location:information.php?page=inv-detail&id='.$idinv);
        }
    }
?>