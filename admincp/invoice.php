<?php 
    session_start();
    ob_start();
    require('./lib_admin/invoice_action.php');
    require('./common/top.php');
    require('./common/bottom.php');


    Top('Festivals Administator', "../assets/css/invoice_cp.css");

    //Check Admin User Session
    require('./check_admin.php');

    // Check GET URL
    $resultGet = CheckGetUrl();

?>
<body>
    <?php include('common/menu.php') ?>
    <main class='main_cp'>
        <section id='invoice_ad'>
            <?php 
                if($resultGet == 1) {
                    require('detail_invoice.php');
                } else {
            ?>

            <div class="container">       
                <div class="admin-invoice">
                    <table>
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Date</th>
                                <th>Payment</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>User Buy</th>
                                <th>Detail</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $resultAllHandleNew = AllInvoiceNew();
                                while($row_all_new = mysqli_fetch_array($resultAllHandleNew)) {
                                    $payment = $row_all_new['payment_method'] == 0 ? 'Pay In Cash': 'Visa/Master Cash';
                            ?>
                            <tr class='item-invoice'>
                                <td>
                                    <a href="invoice.php?ac=detail&id=<?php echo $row_all_new['id']?>">
                                        <?php echo $row_all_new['id']?>
                                    </a>
                                </td>
                                <td class='date'> 
                                    <span class='date-invoice'><?php echo $row_all_new['date']?></span>
                                </td>
                                <td> 
                                    <span class='payment'><?php echo $payment?></span>
                                </td>
                                <td> 
                                    <span class='total'><?php echo number_format($row_all_new['total'],0,",",".")?></span>
                                </td>
                                <td class='handle'> 
                                    <span class='handle-process'>Processing...</span>
                                </td>
                                <td>
                                    <span class='user'><?php echo $row_all_new['fullname']?></span>  
                                </td>
                                <td>
                                    <a href="invoice.php?ac=detail&id=<?php echo $row_all_new['id']?>"><i class="far fa-edit"></i></a>
                                </td>
                                
                                <?php if($row_all_new['admin_check'] == 0){?>
                                <td class='check-admin'>
                                    <div class='point'>
                                        
                                    </div>
                                </td>
                                <?php }?>
                            </tr>
                            <?php }?>
                            <?php 
                                $resultAllHandle = AllInvoice();
                                while($row_all = mysqli_fetch_array($resultAllHandle)) {
                                    $payment = $row_all['payment_method'] == 0 ? 'Pay In Cash': 'Visa/Master Cash';
                                    if($row_all['handle'] == 1) {
                                        $class = 'delivery';
                                        $stt = 'Delivery...';
                                    } else if($row_all['handle'] == 2) {
                                        $class = 'success';
                                        $stt = 'Successful delivery';
                                    } else if($row_all['handle'] == 4) {
                                        $class = 'error-deli';
                                        $stt = 'Order Canceled';
                                    } else {
                                        $class = 'error-deli';
                                        $stt = 'Delivery Failed ';
                                    }
                                    
                            ?>
                            <tr class='item-invoice'>
                                <td>
                                    <a href="invoice.php?ac=detail&id=<?php echo $row_all['id']?>">
                                        <?php echo $row_all['id']?>
                                    </a>
                                </td>
                                <td class='date'> 
                                    <span class='date-invoice'><?php echo $row_all['date']?></span>
                                </td>
                                <td> 
                                    <span class='payment'><?php echo $payment?></span>
                                </td>
                                <td> 
                                    <span class='total'><?php echo number_format($row_all['total'],0,",",".")?></span>
                                </td>
                                <td class='handle'> 
                                    <span class='<?php echo $class?>'><?php echo $stt?></span>
                                </td>
                                <td>
                                    <span class='user'><?php echo $row_all['fullname']?></span>  
                                </td>
                                <td>
                                    <a href="invoice.php?ac=detail&id=<?php echo $row_all['id']?>"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                            <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>

            <?php }?>
        </section>
    </main>
</body>
<?php 
    Bottom("../assets/js/admin/invoice_cp.js");
?>