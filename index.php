<?php
    session_start();
    require('./lib/index_action.php');
    require('./lib/convertMonth.php');
    require('./common/top.php');
    require('./common/bottom.php');
    Top('Trang Chu', "./assets/css/home.css");

    //save sesstion menu
    $_SESSION['menu'] = 1;
?>


<body>
    <?php include('./common/header.php')?>
    <main class='block_main block_main_index'>
        <section>
            <div class="container-fluid slide-home-page ">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        <?php 
                            $resultSlider = SliderReligion();
                            while($row_slider = mysqli_fetch_array($resultSlider)) {
                        ?>

                        <div class="swiper-slide">
                            <div class="wrap-img-ifo">
                                <img src="<?php echo $row_slider['avata_religion']?>" alt="slide home page">
                            </div>
                        </div>

                        <?php }?>

                    </div>
                    <!-- Add Arrows -->
                    <!-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> -->
                </div>
            </div>
            <div class="container content-home-page">
                <div class="row justify-content-center">
                    <div class="col-11 ifo-festivals">
                        <div class="intro-title-home-page">
                            <h5 href="#">MOST POPULAR FESTIVALS</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 main-content-home-page">
                                <?php 
                                    $festivalsMost4 = ShowFestivalsMost4();
                                    while($row_festivalsMost4 = mysqli_fetch_array($festivalsMost4)) {
                                        $dateConvert = convertMonth($row_festivalsMost4['date_of_the_festival']);
                                ?>    

                                <div class='items'>
                                    <a href="festival.php?p=<?php echo $row_festivalsMost4['id']?>" class='items_dec'><img class="img-fluid" src="<?php echo $row_festivalsMost4['avata_festival']?>"></a>
                                    <div class="title-main-content">
                                        <a href="festival.php?p=<?php echo $row_festivalsMost4['id']?>"><?php echo $row_festivalsMost4['name_festival']?></a>
                                    </div>
                                    <div class="time-author">
                                        <?php echo $dateConvert?>
                                    </div>
                                    <p><?php echo $row_festivalsMost4['des_festival']?></p>
                                    <a href="festival.php?p=<?php echo $row_festivalsMost4['id']?>">Read more...</a>
                                </div>

                                <?php }?>

                            </div>
                            <div class="col-lg-5 suggestion-list">

                                <?php 
                                    $festivalsMost8 = ShowFestivalsMost8();
                                    while($row_festivalsMost8 = mysqli_fetch_array($festivalsMost8)) {
                                        $dateConvert = convertMonth($row_festivalsMost8['date_of_the_festival']);
                                ?> 

                                <div class="row row-suggestion-list">
                                    <div class="col-5 img-wrap">
                                        <a href="festival.php?p=<?php echo $row_festivalsMost8['id']?>">
                                            <img class="img-fluid" src="<?php echo $row_festivalsMost8['avata_festival']?>">
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="festival.php?p=<?php echo $row_festivalsMost8['id']?>" class="title-suggestion-list">
                                            <?php echo $row_festivalsMost8['name_festival']?>
                                        </a>
                                        <div class="time-author">
                                            <?php echo $dateConvert?>
                                        </div>
                                        <div class="place">
                                            <?php echo $row_festivalsMost8['place_festival']?>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php }?>

                            </div>
                        </div>
                        <!-- the best festival -->
                        <div class="row intro-title-home-page">
                            <h5 href="#">THE BEST FESTIVALS</h5>
                            <hr/>
                        </div>
                        <div class="row the-best-festivals">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                    <?php 
                                        $festivalsBest6 = ShowFestivalsBest6();
                                        while($row_festivalsBest6 = mysqli_fetch_array($festivalsBest6)) {
                                            $dateConvert = convertMonth($row_festivalsBest6['date_of_the_festival']);
                                    ?>

                                    <div class="swiper-slide">
                                        <div class="col-lg-4">
                                            <a href="/festival.php?id=<?php echo $row_festivalsBest6['id']?>">
                                                <img class="img-fluid" src="<?php echo $row_festivalsBest6['avata_festival']?>" alt="slide img">
                                            </a>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="title-the-best-festivals title-main-content">
                                                <a href="/festival.php?id=<?php echo $row_festivalsBest6['id']?>">
                                                    <?php echo $row_festivalsBest6['name_festival']?>
                                                </a>
                                            </div>
                                            <div class="time-author">
                                                <span><?php echo $dateConvert ?></span>
                                                <span><?php echo $row_festivalsBest6['place_festival'] ?></span>
                                            </div>
                                            <p>
                                                <?php echo $row_festivalsBest6['des_festival'] ?>   
                                            </p>
                                            <a href="/festival.php?id=<?php echo $row_festivalsBest6['id']?>">Read more...</a>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>

                                    <?php }?>
                                    
                                </div>
                                <!-- Add Pagination -->
                                <!-- <div class="swiper-pagination"></div> -->
                            </div>
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
