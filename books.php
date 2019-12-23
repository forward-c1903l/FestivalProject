<?php
    require('./lib/books_action.php');
    require('./lib/convertContent.php');
    require('./common/top.php');
    require('./common/bottom.php');
    Top('Book Store', "./assets/css/books.css");
    // Check Id Book 
    $check = CheckIdBookHeader();
?>

<body>
    <?php include('./common/header.php')?>
    <?php 
        $book = Books();
        $row_book = mysqli_fetch_assoc($book);
        $desConvert = ConvertDesBook($row_book['des_book']);

    ?>
    <main class='block_main main_books'>
        <section class='books'>
            <div class="container">
                <form action="add-to-cart.php?id=<?php echo $row_book['id']?>" method='post'>
                    <div class="row book-block">
                        <div class="col-lg-3 text-center picture">
                                <img class="img-fluid" src="<?php echo $row_book['avata_book']?>" >
                        </div>  
                        <div class="col-lg-6 book-main">
                            <div class="name-of-book">
                                <h3><?php echo $row_book['name_book']?></h3>
                            </div>
                            <div class="author-of-book">
                                <span>Author: <a href="#">Travel Planet Public</a></span>
                            </div>
                            <div class="price-of-book">
                                <span class='price'><?php echo $row_book['price_book']?> VND</span>
                            </div>
                            <div class='add-to-cart'>
                                <label for="i-cart">Quantity: </label>
                                <input type="text" name='quantity' value='1' id='i-cart' class='quantity-cart'/>
                                <button type='submit' name='add-to-cart' class='btn-add-cart'><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                <div class='error-add-to-cart'>
                                    <span class='error'>
                                        <?php 
                                            // Check GET error SESSION
                                            $status = CheckStatusGet();
                                            echo $status == true ? $_SESSION['error-add-to-cart']: '' ;
                                        ?>
                                    </span>
                                </div>
                            </div>
                        
                            <div class="des-book-detail">
                                <h5 class='title-des'>Book Description</h5>
                                <span class='des-content'><?php echo $desConvert?></span>
                                <a href="#content">See more</a>                         
                            </div>
                        </div>
                        <div class='col-lg-3 pur-infor'>
                            <div class='purchase-top'>
                                <h5 class='title-pur'>Purchase Information</h5>
                            </div>
                            <div class='purchase-main'>
                                <ul>
                                    <li><i class="fas fa-truck"></i>  Express Delivery</li>
                                    <li><i class="fas fa-calendar-day"></i>  Estimated Time Of Delivery: 3-5 days</li>
                                    <li><i class="fas fa-undo-alt"></i>  Free Return</li>
                                    <li><i class="fas fa-phone"></i>  Hotline: 0904667082</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row content-review book-block" id='content'>
                    <div class='title-content'>
                        <h4 class='title'>Content Of The Book</h4>
                    </div>
                    <?php echo $row_book['content_book']?>
                </div>
            </div>
        </section>
        <?php 
            $showPopup = CheckSuccessAddToCart();
            if($showPopup) {
        ?>
            <div class='popup-add'>
                <div class='title-popup'>
                    <h6 class='title'>The product has been added to cart</h6>
                </div>
                <div class='image-popup'>
                    <a href="books.php?b=<?php echo $row_book['id']?>">
                        <img src="<?php echo $row_book['avata_book']?>" >
                    </a>
                </div>
                <div class='name-popup'>
                    <a href="books.php?b=<?php echo $row_book['id']?>">
                        <?php echo $row_book['name_book']?>
                    </a>
                </div>
                <div class='navigation'>
                    <a href="" class='navi-link'>Check Out</a>
                    <a href="" class='navi-link'>Cart</a>
                </div>
            </div>
            
        <?php }
            unset($_SESSION['success-add-to-cart']);
        ?>
    </main>

    <?php include('./common/footer.php')?>
</body>


<?php 
    Bottom();
?>