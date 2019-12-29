<?php 
    require('dbConn.php');

    function CheckInventory() {
        global $conn;
        $errorInven = array();
        $i = 0;
        while($i < count($_SESSION['cart'])) {
            $idBook = $_SESSION['cart'][$i]['id'];
            $quantity = $_SESSION['cart'][$i]['quantity'];

            $sql = "SELECT * FROM books WHERE id = '$idBook'";
            $result = mysqli_query($conn, $sql);
            $row_inven = mysqli_fetch_assoc($result);

            if($quantity > $row_inven['inventory']){
                $error = [
                    'id' => $idBook,
                    'name' => $row_inven['name_book']
                ];
                array_push($errorInven, $error);
            }

            $i++;
        }
        return $errorInven;
    }

    function CreateInvoice($payment) {
        global $conn;

        $resultInven = CheckInventory();

        if(empty($resultInven)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');// set date Vietnam
            $date = date('Y-m-d H:i:s');// get date current

            $idUser = $_SESSION['userLogin']['id'];// id user shopping

            $numberId = rand(100000,9999999);// get id random

            $sql = "INSERT INTO invoice (id, date, payment_method, total, id_user_buy) values ('$numberId', '$date', '$payment', 0, '$idUser')";
            $result = mysqli_query($conn, $sql);


            $total = 0;
            $i = 0;

            while($i < count($_SESSION['cart'])) {
                $idBook = $_SESSION['cart'][$i]['id'];
                $quantity = $_SESSION['cart'][$i]['quantity'];


                // Get item of the book
                $sqlItem = "SELECT price_book, inventory FROM books WHERE id = '$idBook'";
                $resultItem = mysqli_query($conn, $sqlItem);
                $row_item = mysqli_fetch_assoc($resultItem);

                // Calculate the total amount
                $total = $total + ($quantity * $row_item['price_book']);

                // Add value to invoice_details table
                $sqlInvoiceDetails = "INSERT INTO invoice_details (id_invoice, id_book, quantity) values ('$numberId', '$idBook', '$quantity')";
                $resultInvoiceDetails = mysqli_query($conn, $sqlInvoiceDetails);

                // reduce inventory item
                
                $invenNew = $row_item['inventory'] - $quantity;
                $sqlReduceInven = "UPDATE books SET inventory= '$invenNew' WHERE id = '$idBook'" ;
                $resultReduceInven = mysqli_query($conn, $sqlReduceInven);

                $i++;
            }

            // Update the price of invoice
            $sqlUpdateTotal = "UPDATE invoice SET total='$total' WHERE id='$numberId'";
            $result = mysqli_query($conn, $sqlUpdateTotal);
            

            //remove item cart session
            $_SESSION['cart'] = array();

            $completed = [
                'status' => true,
                'error' => '',
                'idinvoice' => $numberId
            ];
            return json_encode($completed);
        } else {
            $completed = [
                'status' => false,
                'error' => 'inventory',
                'inObj' => json_encode($resultInven)
            ];
            return json_encode($completed);
        }

        
    }
?>