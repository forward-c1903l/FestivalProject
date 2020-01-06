<?php 
    session_start();
    require('./lib/checkout_action.php');
    require('./common/top.php');
    require('./common/bottom.php');
    Top('Check Out', "./assets/css/checkout.css");

    // Check User Login
    $resultUserLogin = CheckUserLogin();
    // Check Cart session
    $resultCheckCart = CheckCartSession();
?>

<body>
    <?php include('./common/header.php');?>
    <main class='block_main'>
        <section class='checkout'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-6'>
                        <div id='information' class='block-checkout'>
                            <div class='title'>
                                <span>
                                    Information
                                </span>
                            </div>

                            <?php 
                                if(!$resultUserLogin) {
                            ?>

                                <div class='no-login' id='no_login'>
                                    <h6> Don't have an account yet? <a href="register.php">Please register before checkout!</a></h6>
                                </div>

                            <?php 
                                } else {
                                    $resultUserLogin = GetInforUser($_SESSION['userLogin']['id']);
                                    $row_userlogin = mysqli_fetch_assoc($resultUserLogin);
                            ?>
                            
                                <div class='login-infor main-checkout' id='infor_login'>
                                    <form action="">
                                        <div class='row group-info'>
                                            <div class='col-12 wrap-info'>
                                                <input type="text" value='<?php echo $row_userlogin['fullname']?>' disabled class='ip-infor'>
                                            </div>
                                        </div>
                                        <div class='row group-info'>
                                            <div class='col-12 wrap-info'>
                                                <input type="text" value='<?php echo $row_userlogin['address']?>' disabled class='ip-infor'>
                                            </div>
                                        </div>
                                        <div class='row group-info'>
                                            <div class='col-lg-6 wrap-info'>
                                                <input type="text" value='<?php echo $row_userlogin['email']?>' disabled class='ip-infor'>
                                            </div>
                                            <div class='col-lg-6 wrap-info'>
                                                <input type="text" value='<?php echo $row_userlogin['phonenumber']?>' disabled class='ip-infor'>
                                            </div>
                                        </div>
                                    </form>
                                    <div class='nofi-info'>
                                        <span class='des'>If you want to change information, <a href="information.php">please click here !</a></span>
                                    </div>
                                </div>

                            <?php }?>
                        </div>
                        <div id='payment' class='block-checkout'>
                            <div class='title'>
                                <span>Payment Method</span>
                            </div>
                            <div class='payment-main'>
                                <div class='title-payment'>
                                    <span class='des'>Please select the type of payment method</span>
                                </div>
                                <form action="">
                                    <div class='payment-group'>
                                        <input type="radio" name='payment' id='pic' value='0' checked/>
                                        <span class='des-payment'>Pay In Cash </span>
                                    </div>
                                    <div class='payment-group'>
                                        <input type="radio" name='payment' id='vm' value='1'/>
                                        <span class='des-payment'>Visa/MasterCard</span>
                                    </div>
                                </form>
                            </div> 
                        </div>
                    </div>
                    <div class='col-lg-6'>
                        <div id='order' class='block-checkout'>
                            <div class='title'>
                                <span>Order</span>
                            </div>
                            <div class='order-main'>
                                <ul>

                                    <?php 
                                        $total = 0;

                                        foreach($_SESSION['cart'] as $key => $value) {
                                            $resultBookOder = GetBookById($_SESSION['cart'][$key]['id']);
                                            $row_book_oder = mysqli_fetch_assoc($resultBookOder);

                                            $total = $total + ($_SESSION['cart'][$key]['quantity'] * $row_book_oder['price_book']);

                                    ?>
                                        <li>
                                            <div class='order-item'>
                                                <div class='image-item'>
                                                    <img src="<?php echo $row_book_oder['avata_book']?>" alt="">
                                                </div>
                                                <div class='content-item'>
                                                    <div class='row'>
                                                        <div class='col-6'>
                                                            <div class='name'>
                                                                <a href="books.php?b=<?php echo $_SESSION['cart'][$key]['id']?>"><?php echo $row_book_oder['name_book']?></a>
                                                            </div>
                                                            <div class='price'>
                                                                <span><?php  echo number_format($row_book_oder['price_book'],0,",",".")?> VND</span>
                                                            </div>
                                                        </div>
                                                        <div class='col-2 fill'>
                                                            
                                                        </div>
                                                        <div class='col-4 quantity'>
                                                            <span>Quantity: <strong><?php echo $_SESSION['cart'][$key]['quantity'] ?></strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }?>

                                </ul>
                                <div class='total-checkout'>
                                    <span>Total:</span>
                                    <span class='price-total'><?php echo number_format($total,0,",",".")?> VND</span>
                                </div>
                                <div class='error-payment'>
                                    <span id='error-1'></span>
                                    <span id='error-2'></span>
                                    
                                </div>
                                <div class='navi-checkout'>
                                    <div class='item-navi'>
                                        <a href="cart.php">
                                            <button type='button' class='btn-navi btn-edit'>
                                                Edit Order
                                            </button>
                                        </a>
                                    </div>
                                    <div class='item-navi'>
                                        <button type='button' id='btn_payment' name='btn_payment' class='btn-navi btn-payment'>
                                            Payment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class='pop-up-completed-payment'>
            <div class='close-popup'>
                <button class='btn-close-popup'>
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class='title-popup'>
                <h6>Thank you for your purchase. Your order code: <a id='id_invoice' href="#"></a> is being processed.</h6>
            </div>
            <div class='nav-popup'>
                <a id='link_invoice' href="#">View Orders</a>
            </div>
        </div>
    </main>
    <?php include('./common/footer.php');?>
    <script src="./assets/js/create_invoice.js"></script>
</body>
<?php 
    Bottom();
?>