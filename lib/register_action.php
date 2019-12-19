<?php 
    require('dbConn.php');

    function CheckError($error) {
        foreach ($error as $key => $value) {
            if (!empty($value)) {
                return false;
                break;
            }
        }
        return true;
    }


    function CheckPhoneNumber($phonenumber) {
        $filteredPhone = "/((09|03|07|08|05)+([0-9]{8})\b)/";
        if (preg_match($filteredPhone, $phonenumber)) {
            return '';
        } else {
            return 'Please enter the correct phone number format !';
        }
    }

    function CheckEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        } else {
            return '';
        }
    }

    function CheckPassword($password, $Cpassword) {
        if($password == $Cpassword) {
            return '';
        } else {
            return 'The password is not the same';
        }
    }

    function CheckUsername($username) {
        global $conn;

        // Check if the username already exists or not
        $sqlCheckUsername = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $sqlCheckUsername);
        $numRows = mysqli_num_rows($result);
        if($numRows == 0) {
            return '';
        } else {
            return 'Username already exists !';
        }
    }

    function CheckValueUser($user) {
        $error = array();

        foreach ($user as $key => $value) {
            if($value == '') {
                $uFirst = ucfirst($key);
                $error[$key] = "{$uFirst} must not be empty.";
            } else {
                $error[$key] = "";
            }
        }

        if(empty($error['username'])) {
            $error['username'] = CheckUsername($user['username']);
        }

        if(empty($error['password']) && empty($error['Cpassword'])) {
            $error['Cpassword'] = CheckPassword($user['password'], $user['Cpassword']);
        }

        if(empty($error['email'])) {
            $error['email'] = CheckEmail($user['email']);
        }

        if(empty($error['phonenumber'])) {
            $error['phonenumber'] = CheckPhoneNumber($user['phonenumber']);
        }

        return $error;
    }

    function ActionUser($userDefault, $user) {
        $userCurrent = array();

        for( $i = 0; $i < count($userDefault); $i++ ) {
            $key = $userDefault[$i];
            $value = $user[$i]; 
            $userCurrent[$key] = $value;
        }
        
        return $userCurrent;
    }   

    function CheckPostRegister() {
        if(isset($_POST['btn-submit-register'])) {
            return true;
        } else {
            return false;
        }
    }

    function AddUser($user) {
        global $conn;

        $username = $user['username'];
        $passwordMD5 = md5($user['password']);
        $fullname = $user['fullname'];
        $email = $user['email'];
        $phonenumber = $user['phonenumber'];
        $address = $user['address'];


        $sql = "INSERT INTO user (username, password, fullname, email, phonenumber, address) values ('$username', '$passwordMD5', '$fullname', '$email', '$phonenumber', '$address')";

        $result = mysqli_query($conn, $sql);
        header('location:index.php');

    }
?>