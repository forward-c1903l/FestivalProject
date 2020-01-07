<?php 
    session_start();
    ob_start();
    require('./lib_admin/festivals_action.php');
    require('./common/top.php');
    require('./common/bottom.php');


    Top('Festivals Administator', "../assets/css/festivals_cp.css");

    //Check Admin User Session
    require('./check_admin.php');

    // Check GET URL
    $resultGetFes = CheckGetUrlFes();

?>
<body>
    <?php include('common/header.php') ?>
    <?php include('common/menu.php') ?>
    <main class='main_cp'>
        <section id='festivals_ad'>
        <?php 
            if($resultGetFes == 1) {
                require('add_festivals.php');
            } else if($resultGetFes == 2){
                require('detail_festivals.php');
            } else {
        ?>
        <div class="container">       
            <div class="admin-festivals">
                <table>
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Religions</th>
                            <th>Date</th>
                            <th>Place</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            $resultAllFes = AllFestivals();
                            while($row_all = mysqli_fetch_array($resultAllFes)) {
                                $row_all['status'] == 0 ? $status = 'No Active': $status = 'Active';
                                $row_all['status'] == 0 ? $class = 'no-active': $class = 'active';
                                $resultFesOfReli = FestivalOfReligion($row_all['id_reli']);
                                $row_fes_reli = mysqli_fetch_assoc($resultFesOfReli);
                        ?>
                        <tr class='item-fes'>
                            <td>
                                <input type="checkbox" name='items' value='<?php echo $row_all['id']?>'>
                            </td>
                            <td>
                                <a href="festivals.php?ac=detail&id=<?php echo $row_all['id']?>">
                                    <img class="img-fluid" src="../<?php echo $row_all['avata_festival']?>" 
                                    alt="<?php echo $row_all['name_festival']?>">
                                </a>
                            </td>
                            <td class='name'> 
                                <a href="festivals.php?ac=detail&id=<?php echo $row_all['id']?>" class='name-fes'><?php echo $row_all['name_festival']?></a>
                            </td>
                            <td> 
                                <a href="religions.php?ac=edit&id=<?php echo $row_fes_reli['id']?>" class='name-reli'><?php echo $row_fes_reli['name_religion']?></a>
                            </td>
                            <td> 
                                <span class='date-fes'><?php echo $row_all['date_of_the_festival']?></span>
                            </td>
                            <td class='place'> 
                                <span class='place-fes'><?php echo $row_all['place_festival']?></span>
                            </td>
                            <td>
                                <span class='stt-fes <?php echo $class?>'>
                                    <?php echo $status?>
                                </span>    
                            </td>
                            <td>
                                <a href="festivals.php?ac=detail&id=<?php echo $row_all['id']?>"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                        <?php }?>

                    </tbody>
                </table>
                <div class='action'>
                    <div class='select-all'>
                        <span><i class="fas fa-level-up-alt arrow"></i></span>
                        <input type="checkbox" name='select_all'>
                        <span>Select All</span>
                    </div>
                    <div class='delete'>
                        <button type='button' name='delete_fes'><i class="far fa-trash-alt"></i></button>
                        <span>Delete</span>
                    </div>
                </div>
            </div>
        </div>

        <?php }?>
        </section>
    </main>
</body>
<?php 
    Bottom("../assets/js/admin/festivals_cp.js");
?>