<?php
    session_start();
    require('./lib/about_action.php');

    $result = InformationCompany();
    $row = mysqli_fetch_assoc($result);


    require('./common/top.php');
    require('./common/bottom.php');
    Top('Contact Us', "./assets/css/about.css");

    //save sesstion menu
    $_SESSION['menu'] = 4;
?>
<body>
<?php include('./common/header.php')?>
    <main class='block_main main_about'>
        <section id='about'>
            <div class='container'>
                <div class='about_block'>
                    <div class="title-about">
                        <h5>About Us</h5>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <div class='information-com'>
                                <div class='group-infor'>
                                    <strong>Name Company: </strong>
                                    <span><?php echo $row['name']?></span>
                                </div>
                                <div class='group-infor'>
                                    <strong>Address: </strong>
                                    <span><?php echo $row['address']?></span>
                                </div>
                                <div class='group-infor'>
                                    <strong>Email: </strong>
                                    <span><?php echo $row['email']?></span>
                                </div>
                                <div class='group-infor'>
                                    <strong>Phone: </strong>
                                    <span><?php echo $row['phonenumber']?></span>
                                </div>

                            </div>
                            <div class='gallery-com'>
                                
                            </div>
                        </div>
                        <div class='col-md-4 map-com'>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('./common/footer.php')?>
    <script src="./assets/js/about.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyQG78wKNsrCS3UFXwoBJIwf_i6HxAl84&callback=initMap">
</script>
</body>