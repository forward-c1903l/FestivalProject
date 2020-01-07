<?php 
    session_start();
    ob_start();
    require('./lib_admin/user_action.php');
    require('./common/top.php');
    require('./common/bottom.php');

    Top('User & Staff Administator', "../assets/css/user_cp.css");

    //Check Admin User Session
    require('./check_admin.php');

?>
<body>
    <?php include('common/header.php') ?>
    <?php include('common/menu.php') ?>
    <?php 
        //$check_admin o ngay tai menu
        if(!$check_admin) {
            header('location:dashboard.php');
            die();
        }
    ?>
    <main class='block_main'>
        <section id='user_admin'>
            <div class='container'>
                <div class='user_admin'>
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Set Role</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $resultStaff = AllUserStaff();
                                while($row_all_staff = mysqli_fetch_array($resultStaff)) {
                                    $class = '';
                                    if($row_all_staff['id_role'] == 1) $class='ad';
                                    else if($row_all_staff['id_role'] == 2) $class='st';
                            ?>
                            <tr>
                                <td>
                                    <span><?php echo $row_all_staff['id']?></span>
                                </td>
                                <td> 
                                <span><?php echo $row_all_staff['username']?></span>
                                </td>
                                <td> 
                                <span><?php echo $row_all_staff['fullname']?></span>
                                </td>
                                <td> 
                                <span><?php echo $row_all_staff['email']?></span>
                                </td>
                                <td> 
                                <span><?php echo $row_all_staff['phonenumber']?></span>
                                </td>
                                <td> 
                                <span><?php echo $row_all_staff['address']?></span>
                                </td>
                                <td> 
                                <span class='<?php echo $class?>'><?php echo $row_all_staff['name_role']?></span>
                                </td>
                                <td>
                                    <select name="stt-user" class="status-user" data-id='<?php echo $row_all_staff['id']?>'>
                                        <?php if($row_all_staff['status'] == 0) {?>
                                            <option value="0">No Active</option>
                                            <option value="1">Active</option>
                                        <?php } else {?>
                                            <option value="1">Active</option>
                                            <option value="0">No Active</option>
                                        <?php }?>
                                    </select>  
                                </td>
                                <?php 
                                    if($row_all_staff['id_role'] == 2) {
                                ?>
                                    <td>
                                        <button type='button' name='btn-staff-manager'class='btn-user' value='<?php echo $row_all_staff['id']?>'>Customer</button>
                                    </td>
                                    <?php } else if($row_all_staff['id_role'] == 3){?>
                                    <td>
                                        <button type='button' name='btn-user-manager'class='btn-user btn-staff' value='<?php echo $row_all_staff['id']?>'>Staff</button>
                                    </td>
                                    <?php } else {?>
                                    <td>
                                        <span>No</span>
                                    </td>
                                    <?php }?>
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
    Bottom("../assets/js/admin/user_cp.js");
?>