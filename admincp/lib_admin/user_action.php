<?php 
    require('./../lib/dbConn.php');


    function AllUserStaff() {
        global $conn;
        $sql = "SELECT * FROM role INNER JOIN user ON user.id_role = role.id ORDER BY user.id_role, user.id DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function ChangeRole($id, $role) {
        global $conn;

        //check id
        $sql = "SELECT * FROM user WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0) {
            echo 'Error User';
            die();
        }

        $sql = "UPDATE user SET id_role='$role' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        echo 'Success';
        mysqli_close($conn);
    }

    function ChangeStatusUser($id, $stt) {
        global $conn;
        //check id
        $sql = "SELECT * FROM user WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0) {
            echo 'Error User';
            die();
        }

        $sql = "UPDATE user SET status='$stt' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'Success';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>