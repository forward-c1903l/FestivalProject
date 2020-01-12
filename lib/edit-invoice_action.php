<?php 
    require('dbConn.php');


    function CheckInventory($inven, $quantity) {
        if($quantity > $inven) {
            return false;
        } else return true;
    }

    function HandleIncreaseInventory($idbook, $quantityDel, $incInOld) {
        global $conn;
        $invenNew = $incInOld + $quantityDel;
        $sql = "UPDATE books SET inventory = '$invenNew' WHERE id='$idbook'";
        $result = mysqli_query($conn, $sql);
    }

    function HandleInven($idI, $inven, $quantity, $quantityDef) {
        global $conn;
        $changeQuantity = abs($quantityDef - $quantity); // tri tuyet doi
        $invenNew = 0;

        // Check if the quantity is bigger at first, the inventory item goes up, and vice versa

        if($quantityDef > $quantity) {
            $invenNew = $inven + $changeQuantity;
        } else {
            $invenNew = $inven - $changeQuantity;
        }
    
        $sql = "UPDATE books SET inventory = '$invenNew' WHERE id='$idI'";
        $result = mysqli_query($conn, $sql);
    }

    function HandleTotal($id) {
        global $conn;
        //recalculate the amount
        $total = 0;
        $sqlTotal = "SELECT * FROM 
                    invoice_details 
                        INNER JOIN books ON invoice_details.id_book = books.id
                    WHERE invoice_details.id_invoice='$id'";
        $resultRecal = mysqli_query($conn, $sqlTotal);
        while($row = mysqli_fetch_array($resultRecal)) {
            $total = $total + ($row['quantity'] * $row['price_book']);
        }

        //update total
        $sqlTotal = "UPDATE invoice SET total = '$total', admin_check = 0 WHERE id='$id'";
        $resultTotal = mysqli_query($conn, $sqlTotal);

        return $total;
    }

    function CheckIdItemInvoice($idinv, $idUs, $idit, $val) {
        global $conn;

        $sql = "SELECT * FROM 
                            invoice_details
                            INNER JOIN invoice ON invoice_details.id_invoice = invoice.id
                            INNER JOIN books ON invoice_details.id_book = books.id
                            WHERE invoice_details.id_invoice='$idinv' 
                                AND id_book = '$idit' 
                                AND id_user_buy = '$idUs'
                                AND handle = 0";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0) {
            $compEdit = [
                'status' => false,
                'error' => 'invoice',
                'msg' => 'Unable to identify the item!'
            ];
            echo json_encode($compEdit);
        } else {
            //check inventory item
            $row_item = mysqli_fetch_assoc($result);
            $resultInven = CheckInventory($row_item['inventory'], $val);

            if($resultInven) {
                //update quantity
                $sql = "UPDATE invoice_details SET quantity = '$val' WHERE id_invoice='$idinv' AND id_book = '$idit'";
                $result = mysqli_query($conn, $sql);

                $handletotal = HandleTotal($idinv);
                $handleinven = HandleInven($idit, $row_item['inventory'], $val, $row_item['quantity']);

                $compEdit = [
                    'status' => true,
                    'msg' => number_format($handletotal,0,",",".")
                ];
                echo json_encode($compEdit);
            } else {
                //tra ve quantity default cho front end
                $sql = "SELECT quantity FROM invoice_details WHERE id_invoice='$idinv' AND id_book = '$idit'";
                $result = mysqli_query($conn, $sql);
                $row_quantity_df = mysqli_fetch_assoc($result);
                $compEdit = [
                    'status' => false,
                    'error' => 'inventory',
                    'name' => $row_item['name_book'],
                    'quantity_default' => $row_quantity_df['quantity']
                ];
                echo json_encode($compEdit);
            }
        }
    }

    function DeleteInvoice($idinv, $idUs, $idI) {
        global $conn;
        $sql = "SELECT * FROM 
                            invoice_details
                            INNER JOIN invoice ON invoice_details.id_invoice = invoice.id
                            INNER JOIN books ON invoice_details.id_book = books.id
                            WHERE invoice_details.id_invoice='$idinv' 
                                AND id_book = '$idI' 
                                AND id_user_buy = '$idUs'
                                AND handle = 0";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0) {
            return false;
            die();
        } else {
            $row_delete = mysqli_fetch_assoc($result);
            //delete item
            $sqlDel = "DELETE FROM invoice_details WHERE id_invoice='$idinv' AND id_book = '$idI'";
            $result = mysqli_query($conn, $sqlDel);
            
            $handle = HandleTotal($idinv);
            $handleInventory = HandleIncreaseInventory($idI, $row_delete['quantity'], $row_delete['inventory']);

            echo "Success";
        }

    }

    function CheckProductInInvoice($id) {
        global $conn;
        $sql = "SELECT * FROM invoice_details WHERE id_invoice= '$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0) {
            //delete invoice
            $sqlDel = "DELETE FROM invoice WHERE id='$id'";
            $result = mysqli_query($conn, $sqlDel);

            return true;
        }
    }
?>