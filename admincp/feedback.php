<?php 
    session_start();
    ob_start();
    require('./lib_admin/feedback_action.php');
    require('./common/top.php');
    require('./common/bottom.php');


    Top('Festivals Administator', "../assets/css/feedback_cp.css");

    //Check Admin User Session
    require('./check_admin.php');

?>
<body>
    <?php include('common/header.php') ?>
    <?php include('common/menu.php') ?>
    <main class='main_cp'>
        <section id='feedback'>
            <div class='container'>
                <div class='feedback_main'>
                    <table>
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $resultAllFeed = AllFeedback();
                                while($row_all = mysqli_fetch_array($resultAllFeed)) {
                            ?>
                            <tr class='item-fes'>
                                <td>
                                    <span><?php echo $row_all['fullname']?></span>
                                </td>
                                <td>
                                    <span><?php echo $row_all['email']?></span>
                                </td>
                                <td> 
                                <span><?php echo $row_all['phonenumber']?></span>
                                </td>
                                <td> 
                                <span><?php echo $row_all['subject']?></span>
                                </td>
                                <td> 
                                <span><?php echo $row_all['message']?></span>
                                </td>
                                <td class='place'> 
                                <span><?php echo $row_all['date']?></span>
                                </td>
                            </tr>
                            <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
<?php 
    Bottom();
?>