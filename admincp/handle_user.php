<?php 
    session_start();
    require('./lib_admin/user_action.php');

    if(isset($_POST['role'])) {
        $id = $_POST['role']['id'];
        if($_POST['role']['name'] == 'staff') {
            $result = ChangeRole($id, 3);
        } else if($_POST['role']['name'] == 'customer') {
            $result = ChangeRole($id, 2);
        }
    }

    if(isset($_POST['status'])){
        $id = $_POST['status']['id'];
        $stt = $_POST['status']['stt'];

        $resultChangeStt = ChangeStatusUser($id, $stt);
    }
?>