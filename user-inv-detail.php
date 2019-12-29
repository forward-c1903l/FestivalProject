<?php 
    require('./lib/user-inv-detail_action.php');

    // Check Id invoice get and check id in database
    $checkId = CheckIdInvoice();

?>
<div class="col-lg-9 main-infor">
    <?php 
        if($checkId == 0 || $checkId == 1) {
            // delete session invoice current
            unset($_SESSION['invoiceCurrent']);
    ?>
    <div class='error'>
        <span>You do not have an invoice for this code.</span>
        <a href="information.php?page=invoice">Please check your invoice!</a>
    </div>

    <?php } else {
        // save session invoice current
        $_SESSION['invoiceCurrent'] = $checkId['id'];

        // check handle invoice
        $resultHandle = CheckHandleInvoice($checkId['id']);
        
    ?>

    <div class='title-main-infor'>
        <h4>Code Order: <span>#<?php echo $checkId['id']?></span></h4>
    </div>
    <?php 
        if(!$resultHandle) {
    ?>
    <div class='nofi-no-edit nofi'>
        <h6>Your order is in an editable state!</h6>
    </div>
    <?php } else {?>
        <div class='nofi-edit nofi'>
            <h6>Your order can only edit quantity and delete. Cannot add another product!</h6>
        </div>
    <?php }?>
    <div class='box-invoice'>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <?php 
                    if($resultHandle) {
                    ?>
                    <th style='text-align: center'>Delete</th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>

                <?php 
                    $resultItemsInvoice = ItemsYourInvoice($checkId['id']);
                    while ($row_item_invoice = mysqli_fetch_array($resultItemsInvoice)) {
                ?>

                <tr>
                    <td class='image-inv'>
                        <a href="books.php?b=<?php echo $row_item_invoice['id']?>">
                            <img src="<?php echo $row_item_invoice['avata_book'];?>">
                        </a>
                    </td>
                    <td>
                        <div class='name-inv'>
                            <span>
                                <?php 
                                    echo $row_item_invoice['name_book'];
                                ?>
                            </span>
                        </div>
                    </td>
                    <td><?php echo number_format($row_item_invoice['price_book'],0,",",".")?> VND</td>

                    <?php 
                    if($resultHandle) {
                    ?>

                    <td>
                        <input type="text" value='<?php echo $row_item_invoice['quantity']?>' name='<?php echo $row_item_invoice['id']?>' class='ip-quantity'>
                    </td>
                    <td style='text-align: center'>
                        <button type="button" value='<?php echo $row_item_invoice['id']?>' class='detele_item btn-open-popup'>
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </td>

                    <?php } else {?>
                        <td><?php echo $row_item_invoice['quantity']?></td>
                    <?php }?>

                </tr>
                <?php }?>

            </tbody>
        </table>
        <div class='total'>
            <span>Total:</span>
            <span id='total-invoice'><?php echo number_format($checkId['total'],0,",",".")?> VND</span>
        </div>
    </div>
</div>
<div class='pop-up-delete' id='show-popup'>
    <div class='title-popup'>
        <h6>Are you sure you want to delete this item!</h6>
    </div>
    <div class='nav-popup'>
        <div class='row'>
            <div class='col-6'>
                <button class='btn-popup' type='button' id='yes-delete'>Yes</button>
            </div>
            <div class='col-6'>
                <button class='btn-close-popup btn-popup' id='btn-close-popup' value='1'>
                    No
                </button>
            </div>
        </div>
    </div>
</div>  
    <?php }?>

