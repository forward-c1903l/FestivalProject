<?php 
    // require('./lib/dbConn.php');
    require('./lib/religions_action.php');
    require('./lib/convertMonth.php');
    require('./common/top.php');
    require('./common/bottom.php');
    Top('Religions', './assets/css/sortfestival.css');

    // check Id Header
    $check = CheckIdFestivalHeader();
?>

<body>
    <?php include('./common/header.php')?>

    <!-- Main Festivals -->
    <main class='block_main'>
        <section class='religions'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="header">
                            <h3 style="color: gray;">Festivals:  
                            <strong class='name_header'>
                                <?php 
                                    $nameFestivalById = GetNameFestivalById();
                                    echo $nameFestivalById;
                                ?>
                            </strong> </h3>
                            <hr>
                        </div>

                        <?php 
                            $festivals = CheckFestivals();
                            while ($row_festivals = mysqli_fetch_array($festivals)) {
                                $dateConvert = convertMonth($row_festivals['date_of_the_festival']);
                        ?>

                        <div class="row fes-suggest">
                            <!-- Phần sự kiện đề xuất -->
                            <div class="col-lg-4">
                                <a href="festival.php?p=<?php echo $row_festivals['id']?>">
                                    <img class="img-fluid" 
                                    src="<?php echo $row_festivals['avata_festival'] ?>">
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <div class="blog-festival">
                                    <h4>
                                        <a href="festival.php?p=<?php echo $row_festivals['id']?>" class="hoverable">
                                            <?php echo $row_festivals['name_festival'] ?>
                                        </a>
                                    </h4>
                                    <span class="time-fetival"><?php echo $dateConvert ?> / <?php echo $row_festivals['place_festival'] ?> </span>
                                    <p class="des-fetival"><?php echo $row_festivals['des_festival'] ?></p>
                                    <a name="button" id="blue-button" class="btn btn-primary btn-festival"
                                        href="festival.php?p=<?php echo $row_festivals['id']?>" role="button">Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <?php }?>

                    </div>
                    <!--phần này là side bar -->
                    <div class="col-lg-3">
                        <h2 class="sidebar-header">
                            FESTIVAL NEWS</h2>
                        <!--gợi ý nhỏ-->

                        <?php 
                            $fesivalNews = ShowFestivalNews();
                            while($row_festivalNew = mysqli_fetch_array($fesivalNews)) {
                                $dateConvert = convertMonth($row_festivalNew['date_of_the_festival']);

                        ?>
                        <div class="row festival-news">
                            <div class="col-4" style='text-align: center'>
                                <a href="festival.php?p=<?php echo $row_festivalNew['id']?>"><img class="img-fluid img-festival-news"
                                    src="<?php echo $row_festivalNew['avata_festival']?>">
                                </a>
                            </div>
                            <div class="col-8">
                                <a href="festival.php?p=<?php echo $row_festivalNew['id']?>" class="sidebar-text">
                                    <?php echo $row_festivalNew['name_festival']?>
                                </a>
                                <div class="author-time">
                                    <ul>
                                        <li class="a-t"><?php echo $dateConvert?></li>
                                        <li class="a-t"><?php echo $row_festivalNew['place_festival']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <?php }?>

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