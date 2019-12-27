<?php 
    require('./lib/user-infor_action.php');

    // Check POST
    // If the first time the page will show html
    // Post userchange will perform the task
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $idUSerLogin = $_SESSION['userLogin']['id'];

        if(isset($_POST['oldpassword'])) {
            $checkPassword = CheckOldPassword($idUSerLogin, $_POST['oldpassword']);
            echo $checkPassword;
        }

        if(isset($_POST['userComplete'])) {
            $updateUser = UpdateUserLogin($idUSerLogin, $_POST['userComplete']);
        }

    } else {
        // No need check userlogin because include information
        $idUSerLogin = $_SESSION['userLogin']['id'];

        //Get the user inside the database
        $resultUser  = GetUserLoginDB($idUSerLogin);
        $row_user = mysqli_fetch_assoc($resultUser);
?>  
    <div class="col-lg-9 main-infor">
        <div class='title-main-infor'>
            <h4>Your's infomation</h4>
        </div>
        <form action="user-infor.php" method='post' id='form_change_user'>
            <div class="box-of-info">
                <div class="info-box">
                    <div class="row box1">
                        <div class="col-lg-3">
                            <label class="control-label"
                                for="full_name">Your
                                full name:</label>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="input-warp">
                                    <input
                                        type="text"
                                        name="full_name"
                                        id="full_name"
                                        value='<?php echo $row_user['fullname']?>'
                                        class="form-control"
                                        />
                                </div>
                                <div class='error-form'>
                                    <span id='error_fullname' class='error'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <div class="row box1">
                        <div class="col-lg-3">
                            <label class="control-label"
                                for="email">Your
                                email:</label>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="input-warp">
                                    <input
                                        type="text"
                                        name="email"
                                        id="email"
                                        value='<?php echo $row_user['email']?>'
                                        class="form-control"
                                        disabled
                                        />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <div class="row box1">
                        <div class="col-lg-3">
                            <label class="control-label"
                                for="phonenumber">Phone number:</label>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="input-warp">
                                    <input
                                        type="text"
                                        name="phonenumber"
                                        id="phonenumber"
                                        value='<?php echo $row_user['phonenumber']?>'
                                        class="form-control"
                                        />
                                </div>
                                <div class='error-form'>
                                    <span id='error_phonenumber' class='error'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <div class="row box1">
                        <div class="col-lg-3">
                            <label class="control-label"
                                for="address">Your address:</label>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="input-warp">
                                    <input
                                        type="text"
                                        name="address"
                                        id="address"
                                        value='<?php echo $row_user['address']?>'
                                        class="form-control"
                                        />
                                </div>
                                <div class='error-form'>
                                    <span id='error_address' class='error'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <div class='row'>
                        <div class='col-lg-3'></div>
                        <div class='col-lg-7'>
                        <label class="control-label" for="change_password"></label>
                            <input
                                type="checkbox"
                                name="change_password"
                                id="change_password"
                                value='checked'
                            />
                            <span>Change the password</span>
                        </div>
                    </div>
                </div>
                <div class='group-password' style='display: none'>
                    <div class="info-box">
                        <div class="row box1">
                            <div class="col-lg-3">
                                <label class="control-label"
                                    for="old_password">Old
                                    password:</label>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="input-warp">
                                        <input
                                            type="password"
                                            name="old_password"
                                            id="old_password"
                                            class="form-control"
                                            />
                                    </div>
                                    <div class='error-form'>
                                        <span id='error_oldpassword' class='error'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-box">
                        <div class="row box1">
                            <div class="col-lg-3">
                                <label class="control-label"
                                    for="new_password">New
                                    password:</label>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="input-warp">
                                        <input
                                            type="password"
                                            name="new_password"
                                            id="new_password"
                                            class="form-control"
                                            />
                                    </div>
                                    <div class='error-form'>
                                        <span id='error_newpassword' class='error'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-box">
                        <div class="row box1">
                            <div class="col-lg-3">
                                <label class="control-label"
                                    for="Cnew_password">Confirm new
                                    password:</label>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="input-warp">
                                        <input
                                            type="password"
                                            name="Cnew_password"
                                            id="Cnew_password"
                                            class="form-control"
                                            />
                                    </div>
                                    <div class='error-form'>
                                        <span id='error_Cnewpassword' class='error'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" id='submit_change_user' name='submit_change_user' style="padding: 10px 0;color:
                white;font-size: 16px; margin-top: 20px; width:
                100%;" class="btn btn-warning">Submit</button>
            </div>
        </form>
    </div>

<?php }?>