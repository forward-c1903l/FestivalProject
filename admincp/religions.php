<?php 
    session_start();
    ob_start();
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
    <?php include('common/header.php') ?>
    <?php include('common/menu.php') ?>
    <main class='main_cp'>
        <section class='religion'>
            <?php 
                if($resultGet == 1) {
                    include('add_religions.php');
                } else if($resultGet == 2){
                    require('edit_religions.php');
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
                                <th>Detail</th>
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
                                    <a href="religions.php?ac=edit&id=<?php echo $row_all['id']?>">
                                        <img class="img-fluid" src="../<?php echo $row_all['avata_religion']?>" 
                                        alt="<?php echo $row_all['name_religion']?>">
                                    </a>
                                </td>
                                <td> 
                                    <a href="religions.php?ac=edit&id=<?php echo $row_all['id']?>"><?php echo $row_all['name_religion']?></a>
                                </td>
                                <td>
                                    <span class='stt-religion'>
                                        <?php echo $status?>
                                    </span>    
                                </td>
                                <td>
                                    <a href="religions.php?ac=edit&id=<?php echo $row_all['id']?>"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                                <?php }?>

                        </tbody>
                    </table>
                </section>
            </div>

            <?php }?>
        </section>
    </main>
</body>

<?php 
    Bottom("../assets/js/admin/religions_cp.js");
?>