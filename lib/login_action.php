<?php 
    require('dbConn.php');

    function GetUserLogin($username) {
        global $conn;
        $sql = "SELECT id, username, fullname FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function CheckErrorUserLogin($username, $password) {
        global $conn;
        $error = array();
        $complete = true;

        if (empty($username)) {
            $error['username'] = 'Please Enter Username !';
        } else {
            // The username is valid
            $sqlCheckUserLogin = "SELECT username, password FROM user WHERE username = '$username'";
            $result = mysqli_query($conn, $sqlCheckUserLogin);

            if(mysqli_num_rows($result) == 0) {
                // If the username does not exist in the database
                $error['username'] = 'The username does not exist !';
            } else {
                // The username exists, so the error username is empty
                $error['username'] = '';

                //check status = 1
                $sqlCheckUserStt = "SELECT username, password FROM user WHERE username = '$username' AND status = 1";
                $result_stt = mysqli_query($conn, $sqlCheckUserStt);
                if(mysqli_num_rows($result_stt) == 0) {
                    $error['username'] = 'Your account has been locked !';
                } else {
                    $error['username'] = '';

                    // Check when the username and password
                    if(!empty($password)) {
                        $rowUser = mysqli_fetch_assoc($result);
                        $passwordMD5 = md5($password);

                        if($rowUser['password'] == $passwordMD5) {
                            $error['password'] = '';
                        } else {
                            $error['password'] = 'Password is wrong !';
                            $complete = false;
                        }
                    }
                }
        
            }
        }

        if (empty($password)) {
            $error['password'] = 'Please Enter Password !';
        } else if($complete){
            $error['password'] = '';
        }

        return $error;
    }

    function CheckPostLogin() {
        if(isset($_POST['btn_submit_login'])) {
            return true;
        } else return false;
    }

?>