<?php 
    require('./../lib/dbConn.php');

    function CheckGetUrl(){
        if(isset($_GET['ac'])) {
            $action = $_GET['ac'];
            if($action == 'add') {
                return 1;// Add religions
            }

        } else {
            return 0; //All religions
        }
    }

    function AllReligions() {
        global $conn;
        $sql = "SELECT * FROM religions";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function AddReligionFullDB($extension, $id) {
        global $conn;
        $pathImage ='upload/religions/'.$id.'/'.$id.'.'.$extension;
        //Add Religion
        $sql = "UPDATE religions SET avata_religion = '$pathImage' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
    }

    function AddReligionCategoryDB($name, $id) {
        global $conn;
        $pathLink = 'religions.php?f='.$id;

        $sql = "INSERT INTO category (name_cate, link_cate, id_parent) values ('$name', '$pathLink', 2)";
        $result = mysqli_query($conn, $sql);
    }

    function AddNameReligionFirst($name) {
        global $conn;

        //Add Name Religion
        $sql = "INSERT INTO religions (name_religion) values ('$name')";
        $result = mysqli_query($conn, $sql);

        //return id 
        return mysqli_insert_id($conn);
    }
?>