<?php 
    session_start();
    require('./lib_admin/religions_action.php');
    require('./common/top.php');
    require('./common/bottom.php');

    Top('Religions Administator', "../assets/css/religions_cp.css");

    //Check Admin User Session
    require('./check_admin.php');

    // Check GET URL
    $resultGet = CheckGetUrl();

?>
<body>
    <?php include('common/menu.php') ?>
    <main class='main_cp'>
        <section class='religion'>
            <?php 
                if($resultGet == 1) {
                    include('add_religions.php');
                } else {

            ?>

            <div class="container">       
                <section class="admin-all-religions">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $resultAllReli = AllReligions();
                                while($row_all = mysqli_fetch_array($resultAllReli)) {
                                    $row_all['status'] == 0 ? $status = 'No Active': $status = 'Active';
                            ?>
                            <tr>
                                <td>
                                    <a href="#">
                                        <img class="img-fluid" src="../<?php echo $row_all['avata_religion']?>" 
                                        alt="<?php echo $row_all['name_religion']?>">
                                    </a>
                                </td>
                                <td> 
                                    <a href="#"><?php echo $row_all['name_religion']?></a>
                                </td>
                                <td>
                                    <span>
                                        <?php echo $status?>
                                    </span>    
                                </td>
                                <td>
                                    <a href="religions.php?ac=edit&id=<?php echo $row_all['id']?>"><i class="far fa-edit"></i></a>
                                </td>
                                <td>
                                    <button type='button' value='<?php echo $row_all['id']?>'><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                                <?php }?>

                        </tbody>
                    </table>
                    <div class="alert-delete-form">
                        <div class="alert-name">Are you sure delete religions?</div>
                        <div class="alert-ifo">
                            Deleting a religion will cause you to lose data about that religion. You cannot restore it.
                        </div>
                        <div class="wrap-btn">
                            <button class="btn btn-primary"> <a href="#">Yes, I'm sure</a></button>
                            <button class="btn btn-primary">No, Thank you</button>
                        </div>
                    </div>
                </section>
            </div>

            <?php }?>
        </section>
    </main>
</body>

<?php 
    Bottom("../assets/js/admin/religions_cp.js");
?>