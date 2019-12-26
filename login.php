<?php 
    session_start();
    require('./lib/login_action.php');
    require('./common/top.php');
    require('./common/bottom.php');
    Top('Login', "./assets/css/user.css");

    // Check UserLogin Session. If so, will switch to account information page
    if(isset($_SESSION['userLogin'])) {
        header('location:information.php');
    }

    $startLogin = CheckPostLogin();
    $errorLogin = [
        'username' => '',
        'password' => ''
    ];

    if($startLogin) {
        $usernameLogin = $_POST['username_login'];
        $passwordLogin = $_POST['password_login'];

        $errorLogin = CheckErrorUserLogin($usernameLogin, $passwordLogin);

        if(empty($errorLogin['username']) && empty($errorLogin['password'])) {
            
            $resultUserComp = GetUserLogin($usernameLogin);
            $row_user = mysqli_fetch_assoc($resultUserComp);
            
            // Save User Login to Session
            $_SESSION['userLogin'] = $row_user;

            header('location:index.php');

            unset($_SESSION['usernameErrorLogin']);

        } else {
            $_SESSION['usernameErrorLogin'] = $usernameLogin;
        }
    } else {
        unset($_SESSION['usernameErrorLogin']);

    }
?>

<body>
    <?php include('./common/header.php')?>
    <main class='block_main' >
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                    <h3>Welcome to festival.com</h3>
                    <p>You are free to post your festival in here</p>
                    <br />
                </div>
                <!-- Register -->
                <div class="col-md-9 register-right">

                    <!--Start Login -->
                    <div class="tab-contentL" id="myTabContentL">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab2">
                            <h3 class="login-heading">Login</h3>
                            <form class="row justify-content-center login-form" method='post'>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username *" name='username_login' 
                                            value="<?php echo isset($_SESSION['usernameErrorLogin']) ? $_SESSION['usernameErrorLogin'] : ''?>" 
                                        />
                                        <span class='error'><?php echo $errorLogin['username']?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" name='password_login' value="" />
                                        <span class='error'><?php echo $errorLogin['password']?></span>
                                    </div>
                                    <button type="submit" class="btn_user" name='btn_submit_login'>Login</button>                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('./common/footer.php')?>
</body>
<?php 
    Bottom();
?>