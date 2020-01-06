<?php 
    require('./lib/user-invoice_action.php');

?>
<div class="col-lg-9 main-infor">
    <div class='title-main-infor'>
        <h4>Your's Invoice</h4>
    </div>
    <div class='box-invoice'>
        <table>
            <thead>
                <tr>
                    <th>Code Orders</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Order Status</th>
                    <th style='text-align: center'>Order Detail</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    $resultInovice = InvoiceAllByUser();
                    while ($row_invoice = mysqli_fetch_array($resultInovice)) {
                ?>
                <tr>
                    <td>
                        <a
                            href="information.php?page=inv-detail&id=<?php echo $row_invoice['id']?>">
                            <?php echo $row_invoice['id']?>
                        </a>
                    </td>
                    <td>
                        <?php 
                            $dt = strtotime($row_invoice['date']);
                            echo date("d/m/Y", $dt); 
                        ?>
                    </td>
                    <td><?php echo number_format($row_invoice['total'],0,",",".")?> VND</td>
                    <td>
                        <?php 
                            $class = '';
                            $stt = '';
                            if($row_invoice['handle'] == 0){
                                $class = 'process';
                                $stt  = "Processing...";
                            } else if($row_invoice['handle'] == 1) {
                                $class = 'deli';
                                $stt  = "Delivery...";
                            } else if($row_invoice['handle'] == 2) {
                                $class = 'succ';
                                $stt  = "Successful delivery";
                            } else if($row_invoice['handle'] == 3) {
                                $class = 'failed';
                                $stt  = "Delivery Failed";
                            } else if($row_invoice['handle'] == 4) {
                                $class = 'cancel';
                                $stt  = "Invoice Canceled";
                            }
                        ?>
                        <span class='<?php echo $class?>'>
                            <?php echo $stt?>
                        </span>
                    </td>
                    <td style='text-align: center'>
                        <a href="information.php?page=inv-detail&id=<?php echo $row_invoice['id']?>"><i class="fas fa-receipt"></i>
                        </a>
                    </td>
                </tr>

                <?php }?>

            </tbody>
        </table>
    </div>
</div>       