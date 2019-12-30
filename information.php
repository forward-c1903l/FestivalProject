<?php 
    session_start();
    require('./lib/infor_action.php');
    require('./common/top.php');
    require('./common/bottom.php');


    Top('Information', "./assets/css/information.css");

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
                                <a href="information.php?page=invoice">
                                    <i class="fas fa-file-invoice-dollar ava-item"
                                        ></i>
                                    <span>Your Invoices</span>
                                </a>
                            </li>

                            <?php 
                                $resultCheckAdmin = CheckAdminAccount();
                                if($resultCheckAdmin) {
                            ?>
                            <li>
                                <a href="admincp/dashboard.php">
                                    <i class="fas fa-users-cog ava-item"></i>
                                    <span>Your Admin Page</span>
                                </a>
                            </li>
                            <?php }?>
                        </div>
                    </div>

                    <?php 
                        if($checkPage == 0) {
                            include('user-infor.php');
                        } else if($checkPage == 1) {
                            include('user-invoice.php');
                        } else if($checkPage == 2) {
                            include('user-inv-detail.php');
                        }
                    ?>

                </div>
            </div>
        </section>
    </main>

    <?php include('./common/footer.php')?>
    <script src="./assets/js/information.js"></script>
    <script src="./assets/js/user-inv-detail.js"></script>
</body>
<?php 
    Bottom();
?>