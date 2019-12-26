<?php 
    require('dbConn.php');

    function GetUserLoginDB($id) {
        global $conn;
        $sql = "SELECT fullname, email, phonenumber, address FROM user WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function CheckOldPassword($id, $oldpass) {
        global $conn;
        $oldpassMD5 = md5($oldpass);

        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['password'] == $oldpassMD5) {
            return '';
        } else return 'Password is wrong';

    } 

    function UpdateUserLogin($id, $user) {
        global $conn;
        foreach($user as $key => $value) {
            if($key == 'oldpassword' || $key == 'Cnewpassword') {

            } else if($key == 'newpassword') {
                $new_passwordMD5 = md5($value);
                $sql = "UPDATE user SET password = '$new_passwordMD5' WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
            } else {
                $sql = "UPDATE user SET $key = '$value' WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
            }
        }

        echo 'Success';

    }
?>