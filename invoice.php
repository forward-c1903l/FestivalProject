<?php 
    session_start();
    require('./lib/invoice_action.php');

    if(isset($_POST['proceed'])) {
        $pamethod = $_POST['proceed']['payment'];
        $status = true;

        $errorUser = false;
        $errorCart = false;

        if(!isset($_SESSION['userLogin'])) {
            $errorUser = true;
        }
        if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0 ) {
            $errorCart = true;
        }

        if($errorUser && $errorCart) {
            $status = false;
            $completed = [
                'status' => false,
                'duplicate' => true,
                'error1' => 'cart',
                'error2' => 'user',
                'msg1' => 'No products in the cart.',
                'msg2' => 'Please register or login before payment.'
            ];
        } else if($errorUser) {
            $status = false;
            $completed = [
                'status' => false,
                'duplicate' => false,
                'error' => 'user',
                'msg' => 'Please register or login before payment.'
            ];
        } else if($errorCart) {
            $status = false;
            $completed = [
                'status' => false,
                'duplicate' => false,
                'error' => 'cart',
                'msg' => 'No products in the cart.'
            ];
        }
        
        if(isset($completed)) echo json_encode($completed);

        if($status) {
            $result = CreateInvoice($pamethod);
            echo $result;
        }
    }

?>