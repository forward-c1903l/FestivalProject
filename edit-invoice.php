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

        // Check to see if iditem is in the current invoice
        $resultCheck = CheckIdItemInvoice($idInvoice, $idLogin, $idItem, $valItem);
    }

    //DELETE ITEM INVOICE
    if(isset($_POST['delete'])) {
        $idDel = $_POST['delete'];
        $resultCheckDelete= DeleteInvoice($idInvoice, $idLogin, $idDel);

        $checkProductInvoice = CheckProductInInvoice($idInvoice);
    }
?>