<?php 
    session_start();
    require('./lib/infor_action.php');
    require('./common/top.php');
    require('./common/bottom.php');


    Top('Login', "./assets/css/information.css");

    // Check Page
    $checkPage = CheckPageGet();

    // Check User Session
    $checkUser = CheckUserSession();

?>

<body>
    <?php include('./common/header.php')?>

    <main class='block_main' style='background: #F2F2F2'>
        <section class='information'>
            <div class="container">
                <div class="row bigbox">
                    <div class="col-lg-3">
                        <div class="left-header">
                            <div class="user-ava">
                                <i class="far fa-user-circle" style="font-size:
                                    45px; color: deepskyblue;"></i>
                            </div>
                            <div class="user-name">
                                <h4>Your Account</h4>
                            </div>
                        </div>
                        <div class="item-list">

                            <li>
                                <a href="#">
                                    <i class="fas fa-user-alt ava-item"
                                        style="font-size:
                                        25px; color: deepskyblue; padding: 10px;"></i>
                                    <span>Account infomation</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-file-invoice-dollar ava-item"
                                        style="font-size:
                                        25px; color: deepskyblue; padding: 10px;"></i>
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