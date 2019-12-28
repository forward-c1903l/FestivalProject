<?php 
    session_start();
    require('./lib/edit-invoice_action.php');

    // get id invoice session
    $idInvoice = $_SESSION['invoiceCurrent'];

    if(isset($_POST['itemChange'])) {

        $idItem = $_POST['itemChange']['idItem'];
        $valItem = $_POST['itemChange']['valItem'];

        if($valItem == 0) {
            $compEdit = [
                'status' => false,
                'msg' => 'Please enter quantity !'
            ];
            echo json_encode($compEdit);
        } else {
            // Check to see if iditem is in the current invoice
            $resultCheck = CheckIdItemInvoice($idInvoice, $idItem, $valItem);

        }
    }

    // DELETE ITEM
    if(isset($_GET['ac']) && isset($_GET['id'])) {
        if($_GET['ac'] == 'delete') {
            $idDel = $_GET['id'];
        }

        $resultCheckDelete= DeleteInvoice($idInvoice, $idDel);
    }
?>