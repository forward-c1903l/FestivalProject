<?php
    require('./lib/register_action.php');
    require('./common/top.php');
    require('./common/bottom.php');
    Top('Register', "./assets/css/user.css");

    session_start();

    $userDefault = [
        'username',
        'password',
        'Cpassword',
        'fullname',
        'email',
        'phonenumber',
        'address'
        ];
    
    $error = [
        'username' => '',
        'password' => '',
        'Cpassword' => '',
        'fullname' => '',
        'email' => '',
        'phonenumber' => '',
        'address' => ''
    ];

    $start = CheckPostRegister();

    if($start) {
        $user = $_POST['user'];
        $userComplete = ActionUser($userDefault, $user);
        $error = CheckValueUser($userComplete);
        $complelte = CheckError($error);
        
        if($complelte) {
            // No more errors. Delete sesstion userError
            unset($_SESSION['userError']);
            session_destroy();

            // Call the server to update the new user
            $insUser = AddUser($userComplete);

        } else {
            $_SESSION['userError'] = $userComplete;
        }
    } else {
        // check the first login. Delete sesstion userError
        unset($_SESSION['userError']);
        session_destroy();
    }
?>

<body>
    <?php include('./common/header.php')?>
    <main class='block_main'>
        <section>
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
                        <!--Start Register -->
                        <div class="tab-contentR" id="myTabContentR">
                            <div class="tab-pane fade show active" id="home">
                                <h3 class="register-heading">Register</h3>
                                <form class="row register-form" method='post'>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name='user[]' placeholder="Username *" 
                                                value="<?php echo isset($_SESSION['userError']) ? $_SESSION['userError']['username'] : '' ?>" 
                                            />
                                            <span class='error'><?php echo $error['username']?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name='user[]' placeholder="Password *" value="" />
                                            <span class='error'><?php echo $error['password']?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name='user[]'placeholder="Confirm Password *" value="" />
                                            <span class='error'><?php echo $error['Cpassword']?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name='user[]' placeholder="Full name *" 
                                                value="<?php echo isset($_SESSION['userError']) ? $_SESSION['userError']['fullname'] : '' ?>" 
                                            />
                                            <span class='error'><?php echo $error['fullname']?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name='user[]' placeholder="Your Email *" 
                                                value="<?php echo isset($_SESSION['userError']) ? $_SESSION['userError']['email'] : '' ?>"
                                            />
                                            <span class='error'><?php echo $error['email']?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name='user[]' placeholder="Your Phone *" 
                                                value="<?php echo isset($_SESSION['userError']) ? $_SESSION['userError']['phonenumber'] : '' ?>" 
                                            />
                                            <span class='error'><?php echo $error['phonenumber']?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name='user[]' placeholder="Address *" 
                                                value="<?php echo isset($_SESSION['userError']) ? $_SESSION['userError']['address'] : '' ?>" 
                                            />
                                            <span class='error'><?php echo $error['address']?></span>
                                        </div>
                                        <div>
                                            <!--Register button-->
                                            <button type="submit" class="btn_user" name='btn-submit-register'>Register</button>
                                        </div>
                                    </div>
                                </form>
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