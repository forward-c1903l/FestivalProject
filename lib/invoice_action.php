<?php 
    require('dbConn.php');

    function CreateInvoice($payment) {
        global $conn;

        date_default_timezone_set('Asia/Ho_Chi_Minh');// set date Vietnam
        $date = date('Y-m-d H:i:s');// get date current

        $idUser = $_SESSION['userLogin']['id'];// id user shopping

        $numberId = rand(100000,999999);// get id random

        $sql = "INSERT INTO invoice (id, date, payment_method, total, id_user_buy) values ('$numberId', '$date', '$payment', 0, '$idUser')";
        $result = mysqli_query($conn, $sql);


        $total = 0;
        $i = 0;

        while($i < count($_SESSION['cart'])) {
            $idBook = $_SESSION['cart'][$i]['id'];
            $quantity = $_SESSION['cart'][$i]['quantity'];

            // Get the price of the book
            $sqlPrice = "SELECT price_book FROM books WHERE id = '$idBook'";
            $resultPrice = mysqli_query($conn, $sqlPrice);
            $row_price = mysqli_fetch_assoc($resultPrice);

            // Calculate the total amount
            $total = $total + ($quantity * $row_price['price_book']);

            // Add value to invoice_details table
            $sqlInvoiceDetails = "INSERT INTO invoice_details (id_invoice, id_book, quantity) values ('$numberId', '$idBook', '$quantity')";
            $resultInvoiceDetails = mysqli_query($conn, $sqlInvoiceDetails);

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
    }
?>