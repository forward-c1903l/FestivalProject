<?php 
    //Check ID Invoice
    $result = CheckIdInvoiceGet();

    if($result == false) {
        header('location:invoice.php');
        die();
    }

    $row = mysqli_fetch_assoc($result);

    // SAVE SESSION Invoice CURRENT
    $_SESSION['invoice_current'] = $row['id'];
?>
<div class="container">       
    <div class="admin-invoice detail-invoice">
        <div class='title'>
            <h6>Invoice</h6>
        </div>
        <div class='invoice_main'>
            <div class='row'>
                <div class='col-md-6 group'>
                    <div class='title-block'>
                        <h6>Detail Invoice</h6>
                    </div>
                    <div class='detail_invoice'>
                        <?php 
                            //Payment method
                            $payment = $row['id'] == 0 ? 'Pay In Cash': 'Visa/Master' ;

                            $handle = '';
                            $class = '';
                            //Handle
                            if($row['handle'] == 0) {
                                $handle = 'Processing';
                                $class = 'pro';
                            } else if($row['handle'] == 1) {
                                $handle = 'Delivery';
                                $class = 'deli';
                            } else if($row['handle'] == 2) {
                                $handle = 'Successful Delivery	';
                                $class = 'succ';
                            } else if($row['handle'] == 4) {
                                $handle = 'Order Canceled';
                                $class = 'can';
                            } else {
                                $handle = 'Delivery Failed';
                                $class = 'fail';
                            }
                        ?>
                        <div class='group-detail'>
                            <span class='first'>Code: </span>
                            <span id='code'>#<?php echo $row['id']?></span>
                        </div>
                        <div class='group-detail'>
                            <span class='first'>Date: </span>
                            <span id='date'><?php echo $row['date']?></span>
                        </div>
                        <div class='group-detail'>
                            <span class='first'>Payment Method: </span>
                            <span><?php echo $payment?></span>
                        </div>
                        <div class='group-detail'>
                            <span class='first'>Total: </span>
                            <span id='total'><?php echo number_format($row['total'],0,",",".")?> VND</span>
                        </div>
                        <div class='group-detail'>
                            <span class='first'>Status: </span>
                            <span class='handle <?php echo $class?>'><?php echo $handle?></span>
                        </div>
                    </div>
                </div>
                <div class='col-md-6 group'>
                    <?php 
                        $resultUser = UserBuyInvoice($row['id_user_buy']);
                        $row_user = mysqli_fetch_assoc($resultUser);
                    ?>
                    <div class='title-block'>
                        <h6>To</h6>
                    </div>
                    <div class='user_invoice'>
                        <div class='group-user'>
                            <strong><?php echo $row_user['fullname']?></strong>
                        </div>
                        <div class='group-user'>
                            <span><?php echo $row_user['email']?></span>
                        </div>
                        <div class='group-user'>
                            <span><?php echo $row_user['phonenumber']?></span>
                        </div>
                        <div class='group-user'>
                            <span><?php echo $row_user['address']?></span>
                        </div>
                    </div>
                </div>
                <div class='col-md-7 group'>
                    <?php 
                        $resultUser = UserBuyInvoice($row['id_user_buy']);
                        $row_user = mysqli_fetch_assoc($resultUser);
                    ?>
                    <div class='user_invoice'>
                        <table>
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Image</td>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $resultProduct = ProductInvoice($row['id']);
                                    while($row_product = mysqli_fetch_array($resultProduct)) {
                                ?>
                                    <tr>
                                        <td>
                                            <a href="books.php?ac=detail&id=<?php echo $row_product['id']?>"><?php echo $row_product['id']?></a>
                                        </td>
                                        <td>
                                            <a href="books.php?ac=detail&id=<?php echo $row_product['id']?>">
                                                <img src="./../<?php echo $row_product['avata_book']?>">
                                            </a>
                                        </td>
                                        <td class='name'>
                                            <div class='name-book'>
                                                <a href="books.php?ac=detail&id=<?php echo $row_product['id']?>"><?php echo $row_product['name_book']?></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span><?php echo number_format($row_product['price_book'],0,",",".")?> VND</span>
                                        </td>
                                        <td>
                                            <span><?php echo $row_product['quantity']?></span>
                                        </td>
                                    </tr>
                                    <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class='col-md-5 group'>
                    <div class='action'>
                        <?php 
                            if($row['handle'] == 0) {
                        ?>
                        <h6 class='hd'>This order has just been created, delivery confirmation has been processed!</h6>
                        <button type='button' id='processing' class='btn-handle btn-pro'>Confirm Delivery</button>
                        
                        <?php } else if($row['handle'] == 1) {?>
                        <h6 class='hd'>This order has been delivered, please click below if the delivery was successful!</h6>
                        <button type='button' id='successful' class='btn-handle btn-deli-succ'>Successful Delivery</button>
                        
                        <h6 class='hd'>If delivery failed, click below to proceed to the failed delivery status</h6>
                        <button type='button' id='failed' class='btn-handle btn-deli-fail'>Delivery Failed</button>
                        
                        <?php } else if($row['handle'] == 2) {?>
                        <h6 class='hd'>This order was successfully delivered at <strong class='succ'><?php echo $row['time_delivery']?></strong></h6>
                        
                        <?php } else if($row['handle'] == 3) {?>
                        <h6 class='hd'>This order has confirmed delivery failed at <strong class='fail'><?php echo $row['time_delivery']?></strong></h6>
                        
                        <?php } else if($row['handle'] == 4) {?>
                        <h6 class='hd'>This order has been canceled</h6>
                        
                        <?php } else {?>
                        <h6 class='hd'>Unable to identify order information!</h6>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>