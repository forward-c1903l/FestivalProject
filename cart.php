<?php 
    session_start();
    require('./lib/cart_action.php');
    require('./common/top.php');
    require('./common/bottom.php');
    Top('Book Store', "./assets/css/cart.css");
?>

<body>
    <?php include('./common/header.php');?>
    
    <?php 
        $check = CheckCartSession();
        if($check) {
    ?>

    <main class='block_main'> 
        <section class='cart'> 
            <div class='container'>
                <div class='cart_main'>
                    <div class='cart_top'>
                        <h4>CART</h4>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th style='text-align: center'>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

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

                            <tr>
                                <td class='image'>
                                    <a href="books.php?b=<?php echo $row_book['id']?>">
                                        <img src="<?php echo $row_book['avata_book'];?>">
                                    </a>
                                </td>
                                <td>
                                    <div class='name'>
                                        <span>
                                            <?php 
                                                echo $row_book['name_book'];
                                            ?>
                                        </span>
                                    </div>
                                </td>
                                <td><?php echo number_format($row_book['price_book'],0,",",".")?> VND</td>
                                <td>
                                    <input type="text" value='<?php echo $quantity?>' name='<?php echo $row_book['id']?>' class='quantity-item'>
                                </td>
                                <td style='text-align: center'>
                                    <button type="button" value='<?php echo $row_book['id']?>' name='delete_item' class='detele_item btn-open-popup'>
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php $i++;}?>

                        </tbody>
                    </table>

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
                                    <?php echo number_format($total,0,",",".")?> VND
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