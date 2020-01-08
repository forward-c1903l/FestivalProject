<?php
    session_start();
    require('./lib/contact_action.php');
    
    if(isset($_POST['contact'])) {
        $resultMail = SendMailContact($_POST['contact']);
        die();
    }

    require('./common/top.php');
    require('./common/bottom.php');
    Top('Contact Us', "./assets/css/contact.css");

    //save sesstion menu
    $_SESSION['menu'] = 5;
?>
<body>
    <?php include('./common/header.php')?>
    <main class='block_main main_contact'>
        <section id='contact'> 
            <div class="container contact">
                <div class="row form-contact">
                    <div class="col-lg-9">
                        <div class="title-contact">Contact Us
                            <hr>
                        </div>
                        <form>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="fullname">Full Name:</label>
                                    <input type="text" id="fullname">
                                    <span class='error' id='error_fullname'></span>
                                </div>
                                <div class="form-group col-lg-5">
                                    <label for="email">Email Adress:</label>
                                    <input type="text" id="email">
                                    <span class='error' id='error_email'></span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" id="phone">
                                    <span class='error' id='error_phone'></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" id="subject">
                                <span class='error' id='error_subject'></span>
                            </div>
                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea id="message" class="form-control" rows = "4"></textarea>
                                <span class='error' id='error_message'></span>
                            </div>
                                <button type='submit' id='submit-contact' class="btn btn-primary btn-md btn-block">Send Message</button>
                        </form>  
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('./common/footer.php')?>
    <script src="./assets/js/contact.js"></script>
</body>
<?php 
    Bottom();
?>