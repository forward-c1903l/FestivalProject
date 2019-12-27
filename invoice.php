<?php 
    session_start();
    require('./lib/invoice_action.php');

    if(isset($_POST['proceed'])) {
        $pamethod = $_POST['proceed']['payment'];
        $status = true;

        if(!isset($_SESSION['userLogin'])) {
            $status = false;
            echo '213';
        } 
        
        if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
            $status = false;
            echo '123';
        } 

        if($status) {
            $result = CreateInvoice($pamethod);
            echo $result;
        }
    }

?>