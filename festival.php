<?php 
    session_start();
    require('./lib/festival_action.php');
    require('./lib/convertMonth.php');
    require('./common/top.php');
    require('./common/bottom.php');
    Top('Festival', './assets/css/festival.css');

    // Check ID
    $checkId = CheckFestivalById();
?>

<body>
    <?php include('./common/header.php')?>

    <?php 
        $festival = Festival();
        $rowFestival = mysqli_fetch_assoc($festival);
        $dateConvert = convertMonth($rowFestival['date_of_the_festival']);
    ?>


    <main class='block_main'>
        <section class='festivals'>
            <div class="container content">
                <div class='festivals-header'>
                    <div class="blog-grid">
                        <h1 class='title-festival'><?php echo $rowFestival['name_festival']?></h1>
                    </div>
                    <div class='blog-grid-info'>
                        <span class='time-date'>
                            <?php echo $dateConvert?> / <?php echo $rowFestival['place_festival']?>
                        </span>
                    </div>
                    <div class="i_img">
                        <img class="iss" 
                            src="<?php echo $rowFestival['avata_festival']?>" 
                            alt="<?php echo $rowFestival['name_festival']?>"
                        >
                    </div>
                </div>

                <!--noi dung-->
                <div class="row">
                    <div class="col-md-8">
                        <div>
                            <?php echo $rowFestival['content_festival']?>
                        </div>
                    </div>

                    <!--chi tiet them-->
                    <div class="col-md-4 similar-festival">
                        <div class="margin-bottom-30">
                            <div class="line">
                                <h5>SIMILAR FESTIVALS</h5>
                            </div>

                            <?php 
                                $resultSimiFes = SimilarFestivals8();
                                while ($row_SimiFes = mysqli_fetch_array($resultSimiFes)) {
                                    $dateConvertSimi = convertMonth($row_SimiFes['date_of_the_festival']);
                            ?>

                                <div class="detail" href="">
                                    <div class='row'>
                                        <a class='col-3 col-md-12 col-lg-3' href="festival.php?p=<?php echo $row_SimiFes['id']?>">
                                            <img 
                                                class="img-detail" 
                                                src="<?php echo $row_SimiFes['avata_festival']?>" 
                                                alt="hinh11"
                                            >
                                        </a>
                                        <div class='col-9 col-md-12 col-lg-9'>
                                            <a href="festival.php?p=<?php echo $row_SimiFes['id']?>" class='name'><?php echo $row_SimiFes['name_festival']?></a>
                                            <p class='a-t'><?php echo $dateConvertSimi ?> / <?php echo $row_SimiFes['place_festival']?></p>
                                        </div>
                                    </div>
                                </div>

                            <?php }?>

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