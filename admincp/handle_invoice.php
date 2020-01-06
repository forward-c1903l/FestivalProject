<?php 
    session_start();
    require('./lib_admin/invoice_action.php');

    if(isset($_POST['action'])) {
        $action = $_POST['action'];
        $id_invoice = $_SESSION['invoice_current'];
        $handle = 0;
        if($action == 'delivery') {
            $handle = 1;
        } else if($action == 'successful') {
            $handle = 2;
        } else if($action == 'fail') {
            $handle = 3;
        }

        $result_handle = ChangeInvoice($id_invoice, $handle);
        echo 'Success';
    }

?>
