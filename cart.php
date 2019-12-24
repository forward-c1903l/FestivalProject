<?php 
    require('./lib/cart_action.php');
    require('./common/top.php');
    require('./common/bottom.php');
    Top('Book Store', "./assets/css/cart.css");
?>

<body>
    <?php include('./common/header.php');?>
    
    <?php 
        var_dump($_SESSION['cart']);
        // unset($_SESSION['cart']);
        $check = CheckCartSession();
        var_dump($check);
        if($check) {
    ?>

    <main class='block_main'> 
        <section class='cart'> 
            <div class='container'>
                <div class='cart_main'>
                    <div class='cart_top'>
                        <h4>CART</h4>
                    </div>
                    <div class='cart_title'>
                        <div class='row flex align-items-center text-center'>
                            <div class='col-2'><h4>Image</h4></div>
                            <div class='col-3'><h4>Name</h4></div>
                            <div class='col-2'><h4>Quantity</h4></div>
                            <div class='col-3'><h4>Price</h4></div>
                            <div class='col-2'><h4>Delete</h4></div>
                        </div>
                    </div>

                    <?php 
                        $i = 0;
                        $total = 0;// Total

                        while($i < count($_SESSION['cart'])) {
                                
                            $id = $_SESSION['cart'][$i]['id'];
                            $quantity = $_SESSION['cart'][$i]['quantity'];

                            $resultBook = CheckIdBookCartIntoDB($id);
                            $row_book = mysqli_fetch_assoc($resultBook);

                            $total = $total + ($quantity * $row_book['price_book']);
                    ?>

                    <form action='edit-to-cart.php?id=<?php echo $id?>' class='cart_item'>
                        <div class='row flex align-items-center text-center'>
                            <div class='col-2 cart_item_image'>
                                <a href="books.php?b=<?php echo $id?>">
                                    <img src="<?php echo $row_book['avata_book']?>" alt="<?php echo $row_book['name_book']?>" />
                                </a>
                            </div>
                            <div class='col-3'>
                                <a href="books.php?b=<?php echo $id?>" class='cart_item_name'><?php echo $row_book['name_book']?></a>
                            </div>
                            <div class='col-2'>
                                <input type="text" value='<?php echo $quantity?>' class='ip-quantity' name='<?php echo $quantity?>'/>
                            </div>
                            <div class='col-3'>
                                <span class='cart_item_price'><?php echo $row_book['price_book']?> VND</span>
                            </div>
                            <div class='col-2'>
                                <a href="edit-to-cart.php?id=<?php echo $row_book['id']?>&<?php echo 'action=delete'?>"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </form>
                    
                    <?php $i++;}?>
                    <div class='cart_total'>
                        <div class='row flex align-items-center text-center'>
                            <div class='col-2 value'>
                                <span class='name_total'>
                                    Total:
                                </span>
                            </div>
                            <div class='col-3 fill'></div>
                            <div class='col-2 fill'></div>
                            <div class='col-3 value'>
                                <span class='price_total'>
                                    <?php echo $total?> VND
                                </span>
                            </div>
                            <div class='col-2 fill'></div>
                        </div>
                    </div>
                    <div class='cart_navi'>
                        <div class='row'>
                            <div class='col-12 col-md-6'>
                                <a href="bookstore.php" class='cart_navi_link'>CONTINUE SHOPPING</a>
                            </div>
                            <div class='col-12 col-md-6'>
                                <a href="checkout.php" class='cart_navi_link'>CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php } else {?>
    
    <main class='block_main'> 
        <section class='cart'> 
            <div class='container'>
                <div class='cart_main'>
                    <div class='cart_noitem'>
                        <h3>No Item</h3>
                        <h6>Please return to the store to select the product you like</h6>
                        <a href="bookstore.php">BACK TO PRODUCT PAGE</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php }?>

    <?php include('./common/footer.php')?>
    <script src="./assets/js/edit-to-cart.js"></script>
</body>
<?php 
    Bottom();
    
?>