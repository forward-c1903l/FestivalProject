<?php 
    session_start();
    require('./lib/edit-invoice_action.php');

    // get id invoice session
    $idInvoice = $_SESSION['invoiceCurrent'];
    // get id user login
    $idLogin = $_SESSION['userLogin']['id'];

    // CHANGE QUANTITY ITEM INVOICE
    if(isset($_POST['itemChange'])) {

        $idItem = $_POST['itemChange']['idItem'];
        $valItem = $_POST['itemChange']['valItem'];
        $quantityDefault = $_POST['itemChange']['valDefault'];

        if($valItem == 0) {
            $compEdit = [
                'status' => false,
                'msg' => 'Please enter quantity !'
            ];
            echo json_encode($compEdit);
        } else {
            // Check to see if iditem is in the current invoice
            $resultCheck = CheckIdItemInvoice($idInvoice, $idLogin, $idItem, $valItem, $quantityDefault);

        }
    }

    //DELETE ITEM INVOICE
    if(isset($_POST['delete'])) {
        $idDel = $_POST['delete'];
        $resultCheckDelete= DeleteInvoice($idInvoice, $idLogin, $idDel);
    }
?>