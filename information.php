<?php 
    session_start();
    require('./lib/infor_action.php');
    require('./common/top.php');
    require('./common/bottom.php');


    Top('Login', "./assets/css/information.css");

    // Check Page
    $checkPage = CheckPageGet();

    // Check User Session
    $userLogin = CheckUserSession();

?>

<body>
    <?php include('./common/header.php')?>

    <main class='block_main' style='background: #F2F2F2; padding-top: 90px'>
        <section class='information'>
            <div class="container">
                <div class="row bigbox">
                    <div class="col-lg-3">
                        <div class="left-header">
                            <div class="user-ava">
                                <i class="far fa-user-circle" style="font-size:
                                    45px;"></i>
                            </div>
                            <div class="user-name">
                                <span>Your Account</span>
                                <h6><?php echo $userLogin?></h6>
                            </div>
                        </div>
                        <div class="item-list">

                            <li class='<?php echo $checkPage == 0 ? 'active': ''?>'>
                                <a href="information.php">
                                    <i class="fas fa-user-alt ava-item"
                                    ></i>
                                    <span>Account infomation</span>
                                </a>
                            </li>
                            <li class='<?php echo $checkPage == 1 ? 'active': ''?>'>
                                <a href="information.php?page=receipt">
                                    <i class="fas fa-file-invoice-dollar ava-item"
                                        ></i>
                                    <span>Receipt</span>
                                </a>
                            </li>
                        </div>
                    </div>

                    <?php 
                        if($checkPage == 0) {
                            include('user-infor.php');
                        } else if($checkPage == 1) {
                            include('user-receipt.php');
                        }
                    ?>

                </div>
            </div>
        </section>
    </main>

    <?php include('./common/footer.php')?>
    <script src="./assets/js/information.js"></script>
</body>
<?php 
    Bottom();
?>