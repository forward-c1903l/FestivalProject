<?php 
    require('./../lib/dbConn.php');
    
    function InformationCompany() {
        global $conn;
        $sql = "SELECT * FROM company WHERE id=1";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function UpdateAboutUs($about) {
        global $conn;
        $sql = "UPDATE company SET 
                                name='{$about['name']}',
                                address='{$about['address']}',
                                email='{$about['email']}',
                                phonenumber='{$about['phonenumber']}'
                                WHERE id=1";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Success";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    function AllPaymentMethod() {
        global $conn;
        $sql = "SELECT * FROM payment_method";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function UpdatePaymentMethod($id) {
        global $conn;

        //Check id
        $sql = "SELECT * FROM payment_method WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $stt = $row['status'] == 0 ? 1 : 0;
            $sql = "UPDATE payment_method SET 
                                status='$stt'
                                WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "Success";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo 'Error Payment Method';
        }

        mysqli_close($conn);
    }

    function AddPaymentMethod($name) {
        global $conn;
        //check name 
        $sql = "SELECT * FROM payment_method WHERE name_payment='$name'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo 'The payment method name already exists!';
        } else {
            $sql = "INSERT INTO payment_method (name_payment) values('$name')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "Success";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
    }

    function AllGallery() {
        global $conn;
        $sql = "SELECT * FROM gallery";
        $result = mysqli_query($conn, $sql);
        return $result;
        mysqli_close($conn);
    }

    function AddGalleryFirst() {
        global $conn;
        $sql = "INSERT INTO gallery (img) values(' ')";
        $result = mysqli_query($conn, $sql);
        return mysqli_insert_id($conn);
    }


    function AddUrlImageGallery($id, $name) {
        global $conn;
        $location = 'upload/gallery/'.$name;
        $sql = "UPDATE gallery SET 
                                img='$location'
                                WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Success";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    function DeleteItemGallery($id) {
        global $conn;
        $img = '';
        $sql = "SELECT img FROM gallery WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $img = $row['img'];

            //delete 
            $sql = "DELETE FROM gallery WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "Success";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error Gallery";
            die();
        }
        return './../'.$img;
        mysqli_close($conn);
    }
?>