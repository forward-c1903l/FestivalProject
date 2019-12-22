<?php
    require('./lib/bookstore_action.php');
    require('./common/top.php');
    require('./common/bottom.php');
    Top('Book Store', "./assets/css/bookstore.css");

    // Check Id Book Category
    $check = CheckIdBookHeader();
?>

<body>
    <?php include('./common/header.php')?>

    <main class='block_main'>
        <section class='bookstore'>
            <div class="container">
                <div class="title-book-store d-flex align-items-center">
                    <h3 class='type'>Book Category: 
                        <strong>
                            <?php 
                                $nameBookCategory = GetNameBookCategoryById();
                                echo $nameBookCategory;
                            ?>
                        </strong>
                    </h3>
                </div>
                <div class="row content-book-store">

                    <?php 
                        $books = CheckBooks();
                        while ($row_books = mysqli_fetch_array($books)) {
                    ?>

                    <div class="col-md-3 col-sm-6 item-book-store text-center">
                        <div class="wrap-img">
                            <a href="book.php?id=<?php echo $row_books['id']?>"><img class="mx-auto d-block img-fluid " src="<?php echo $row_books['avata_book']?>" alt="book"></a>
                        </div>
                        <div class="title-content-book"><a href="#"><?php echo $row_books['name_book']?></a></div>
                        <div class="cost-of-book"><?php echo $row_books['price_book']?> VND</div>
                    </div>

                    <?php }?>


                    <div class="pagination col-12 justify-content-center">
                        <div class='item-pagi'>
                            <a href="" class='item-pagi-a'>
                                <
                            </a>
                        </div>
                        <div class='item-pagi'>
                            <a href="" class='item-pagi-a'>
                                1
                            </a>
                        </div>
                        <div class='item-pagi'>
                            <a href="" class='item-pagi-a'>
                                2
                            </a>
                        </div>
                        <div class='item-pagi'>
                            <a href="" class='item-pagi-a'>
                                3
                            </a>
                        </div>
                        <div class='item-pagi'>
                            <a href="" class='item-pagi-a'>
                                >
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </main>

    <?php include('./common/footer.php')?>
</body>

<?php 
    Bottom();
?>