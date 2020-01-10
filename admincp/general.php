<?php 
    session_start();
    ob_start();
    require('./lib_admin/general_action.php');
    require('./common/top.php');
    require('./common/bottom.php');

    Top('General Administator', "../assets/css/general_cp.css");

    //Check Admin User Session
    require('./check_admin.php');

?>
<body>
    <?php include('common/header.php') ?>
    <?php include('common/menu.php') ?>
    <main class='main_cp'>
        <section id='general'>
            <div class='container'>
                <div class='general_main'>
                    <div class='row'>
                        <div class='col-md-7'>
                            <div class='about_us block_general'>
                                <div class='title'>
                                    <h5>About Us</h5>
                                </div>
                                <form action="">
                                    <?php 
                                        $result = InformationCompany();
                                        $row_company = mysqli_fetch_assoc($result);
                                    ?>
                                    <div class='group'>
                                        <label for="name">Name: </label>
                                        <input type="text" id='name' name='company' class='ip-ab' value='<?php echo $row_company['name']?>'>
                                        <span class='error' id='error_name'></span>
                                    </div>
                                    <div class='group'>
                                        <label for="address">Address: </label>
                                        <input type="text" id='address' name='company' class='ip-ab' value='<?php echo $row_company['address']?>'>
                                        <span class='error' id='error_address'></span>
                                    </div>
                                    <div class='group'>
                                        <label for="email">Email: </label>
                                        <input type="text" id='email' name='company' class='ip-ab' value='<?php echo $row_company['email']?>'>
                                        <span class='error' id='error_email'></span>
                                    </div>
                                    <div class='group'>
                                        <label for="phonenumber">Phone Number: </label>
                                        <input type="text" id='phonenumber' name='company' class='ip-ab' value='<?php echo $row_company['phonenumber']?>'>
                                        <span class='error' id='error_phonenumber'></span>
                                    </div>
                                    <button type='submit' id='edit-company' class='btn-admin'>Edit About Us</button>
                                </form>
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <div class='payment_method block_general'>
                                <div class='title'>
                                    <h5>Payment Method</h5>
                                </div>
                                <form action="">
                                    <div class='group'>
                                        <?php 
                                            $result_payment = AllPaymentMethod();
                                            while($row_payment = mysqli_fetch_array($result_payment)) {
                                        ?>
                                            <div class='group'>
                                                <?php if($row_payment['status'] == 1) {?>
                                                    <input type="checkbox" value='<?php echo $row_payment['id']?>' checked> <?php echo $row_payment['name_payment']?>
                                                <?php } else {?>
                                                    <input type="checkbox" value='<?php echo $row_payment['id']?>'> <?php echo $row_payment['name_payment']?>
                                                <?php }?>
                                            </div>
                                            <?php }?>
                                    </div>
                                </form>
                                <div class='add_payment_method'>
                                    <form action="">
                                        <div class='group'>
                                            <label for="name_payment">Name Payment Method: </label>
                                            <input type="text" name='name_payment' id='name_payment' class='ip-ab'>
                                            <span class='error_payment' id='error_name_payment'></span>
                                        </div>
                                        <button type='submit' id='add_payment' class='btn-admin'>Add Payment Method</button>
                                    </form>
                                </div>
                            </div>
                            <div class='add_gallery block_general'>
                                <div class='title'>
                                    <h5>ADD GALLERY</h5>
                                </div>
                                <div class='add_gallery_main'>
                                    <form action="">
                                        <div class='group'>
                                            <input type="file" name='img_gallery' id='img_gallery' class='ip_file'>
                                            <label for="img_gallery" class='lb_file'><i class="fas fa-cloud-upload-alt"></i> Upload Your Image...</label>
                                            <span class='error_img' id='error_img_gallery'></span>
                                        </div>
                                        <button type='button' class='btn-admin' id='add_gallery'>Add Gallery</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='gallery_block' id='gallery'>
                        <div class='title title-big'>
                            <h5>Gallery Company</h5>
                        </div>
                        <div class='gallery'>
                            <?php 
                                $result_gallery = AllGallery();
                                while($row_gallery = mysqli_fetch_array($result_gallery)) {
                            ?>
                            <div class='galerry-item'>
                                <img src="./../<?php echo $row_gallery['img']?>">
                                <div class='del-hover'>
                                    <button class='btn-del' name='btn-delete-gallery' data-id-gallery='<?php echo $row_gallery['id']?>'><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


</body>

<?php 
    Bottom("../assets/js/admin/general_cp.js");
?>